<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TaskGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, TaskGroup $taskGroup)
    {
        return $user->id === $taskGroup->writer_id;
    }
}
