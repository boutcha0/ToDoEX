<?php

namespace App\Repositories\Contracts;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    public function getUserTasks(User $user): Collection;
    public function create(User $user, array $data): Task;
    public function findUserTask(User $user, int $taskId): ?Task;
    public function update(Task $task, array $data): Task;
    public function delete(Task $task): bool;
}
