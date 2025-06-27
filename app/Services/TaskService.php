<?php

namespace App\Services;

use App\Events\TaskCreated;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Task Service implementing Service Pattern
 * Handles business logic for task management
 */
class TaskService
{
    /**
     * Get all tasks for authenticated user
     */
    public function getUserTasks(User $user, ?string $status = null): Collection
    {
        $query = $user->tasks();
        
        if ($status) {
            $query->where('status', $status);
        }
        
        return $query->orderBy('created_at', 'desc')->get();
    }

    /**
     * Create a new task and broadcast event
     */
    public function createTask(User $user, array $data): Task
    {
        DB::beginTransaction();
        
        try {
            $task = $user->tasks()->create([
                'title' => $data['title'],
                'description' => $data['description'] ?? null,
                'status' => $data['status'] ?? 'pending',
                'priority' => $data['priority'] ?? 'medium',
                'due_date' => $data['due_date'] ?? null,
            ]);
            
            // Broadcast task created event if event exists
            if (class_exists('App\Events\TaskCreated')) {
                event(new TaskCreated($task));
            }
            
            DB::commit();
            
            return $task->fresh();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Task creation failed in service', [
                'user_id' => $user->id,
                'data' => $data,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Get a specific task for user
     */
    public function getUserTask(User $user, int $taskId): ?Task
    {
        return $user->tasks()->where('id', $taskId)->first();
    }

    /**
     * Update a task
     */
    public function updateTask(Task $task, array $data): Task
    {
        DB::beginTransaction();
        
        try {
            $task->update([
                'title' => $data['title'] ?? $task->title,
                'description' => $data['description'] ?? $task->description,
                'status' => $data['status'] ?? $task->status,
                'priority' => $data['priority'] ?? $task->priority,
                'due_date' => $data['due_date'] ?? $task->due_date,
            ]);
            
            DB::commit();
            
            return $task->fresh();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Task update failed in service', [
                'task_id' => $task->id,
                'data' => $data,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Delete a task
     */
    public function deleteTask(Task $task): bool
    {
        DB::beginTransaction();
        
        try {
            $result = $task->delete();
            DB::commit();
            
            return $result;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Task deletion failed in service', [
                'task_id' => $task->id,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Toggle task completion status
     */
    public function toggleTaskStatus(Task $task): Task
    {
        $newStatus = $task->status === 'completed' ? 'pending' : 'completed';
        
        return $this->updateTask($task, ['status' => $newStatus]);
    }

    /**
     * Bulk delete tasks for user
     */
    public function bulkDeleteTasks(User $user, array $taskIds): int
    {
        DB::beginTransaction();
        
        try {
            $deletedCount = $user->tasks()
                ->whereIn('id', $taskIds)
                ->delete();
            
            DB::commit();
            
            return $deletedCount;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Bulk task deletion failed in service', [
                'user_id' => $user->id,
                'task_ids' => $taskIds,
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }

    /**
     * Get task statistics for user
     */
    public function getTaskStats(User $user): array
    {
        $tasks = $user->tasks;
        
        return [
            'total' => $tasks->count(),
            'completed' => $tasks->where('status', 'completed')->count(),
            'pending' => $tasks->where('status', 'pending')->count(),
            'in_progress' => $tasks->where('status', 'in_progress')->count(),
        ];
    }
}