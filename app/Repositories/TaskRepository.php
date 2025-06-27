<?php

namespace App\Repositories;

use App\Models\Task;
use App\Models\User;
use App\Repositories\Contracts\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Task Repository implementing Repository Pattern
 * Handles all database operations for Task model
 */
class TaskRepository implements TaskRepositoryInterface
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    /**
     * Get all tasks for a specific user
     */
    public function getUserTasks(User $user): Collection
    {
        return $user->tasks()->orderBy('created_at', 'desc')->get();
    }

    /**
     * Create a new task for a user
     */
    public function create(User $user, array $data): Task
    {
        return $user->tasks()->create($data);
    }

    /**
     * Find a task by ID that belongs to a user
     */
    public function findUserTask(User $user, int $taskId): ?Task
    {
        return $user->tasks()->find($taskId);
    }

    /**
     * Update a task
     */
    public function update(Task $task, array $data): Task
    {
        $task->update($data);
        return $task->fresh();
    }

    /**
     * Delete a task
     */
    public function delete(Task $task): bool
    {
        return $task->delete();
    }
}