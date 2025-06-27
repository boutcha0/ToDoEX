<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

/**
 * Task Controller
 * Handles CRUD operations for tasks
 */
class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {
        // Remove auth middleware if using JWT, add it in routes instead
    }

    /**
     * Get all tasks for authenticated user
     */
    public function index(Request $request): JsonResponse
    {
        try {
            $tasks = $this->taskService->getUserTasks(Auth::user());
            
            return response()->json([
                'success' => true,
                'data' => $tasks
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to fetch tasks', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error fetching tasks'
            ], 500);
        }
    }

    /**
     * Create a new task
     */
    public function store(TaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskService->createTask(Auth::user(), $request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Task created successfully',
                'data' => $task
            ], 201);
        } catch (\Exception $e) {
            Log::error('Task creation failed', [
                'user_id' => Auth::id(),
                'data' => $request->validated(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error creating task'
            ], 500);
        }
    }

    /**
     * Get a specific task
     */
    public function show(int $id): JsonResponse
    {
        try {
            $task = $this->taskService->getUserTask(Auth::user(), $id);
            
            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Task not found'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'data' => $task
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to fetch task', [
                'user_id' => Auth::id(),
                'task_id' => $id,
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error fetching task'
            ], 500);
        }
    }

    /**
     * Update a task
     */
    public function update(TaskRequest $request, int $id): JsonResponse
    {
        try {
            $task = $this->taskService->getUserTask(Auth::user(), $id);
            
            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Task not found'
                ], 404);
            }
            
            $updatedTask = $this->taskService->updateTask($task, $request->validated());
            
            return response()->json([
                'success' => true,
                'message' => 'Task updated successfully',
                'data' => $updatedTask
            ]);
        } catch (\Exception $e) {
            Log::error('Task update failed', [
                'task_id' => $id,
                'user_id' => Auth::id(),
                'data' => $request->validated(),
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error updating task'
            ], 500);
        }
    }

    /**
     * Delete a task
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            $task = $this->taskService->getUserTask(Auth::user(), $id);
            
            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Task not found'
                ], 404);
            }
            
            $this->taskService->deleteTask($task);
            
            return response()->json([
                'success' => true,
                'message' => 'Task deleted successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Task deletion failed', [
                'task_id' => $id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error deleting task'
            ], 500);
        }
    }

    /**
     * Toggle task completion status
     */
    public function toggleStatus(int $id): JsonResponse
    {
        try {
            $task = $this->taskService->getUserTask(Auth::user(), $id);
            
            if (!$task) {
                return response()->json([
                    'success' => false,
                    'message' => 'Task not found'
                ], 404);
            }
            
            $updatedTask = $this->taskService->toggleTaskStatus($task);
            
            return response()->json([
                'success' => true,
                'message' => 'Task status updated',
                'data' => $updatedTask
            ]);
        } catch (\Exception $e) {
            Log::error('Task status toggle failed', [
                'task_id' => $id,
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Error updating task status'
            ], 500);
        }
    }
}