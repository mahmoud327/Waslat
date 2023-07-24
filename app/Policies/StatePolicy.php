<?php

namespace App\Policies;

use App\Models\State;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StatePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        if ($user->hasPermissionTo('عرض المحافظة')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, State $state): bool
    {
        //
        //
        if ($user->hasPermissionTo('عرض المحافظة')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
        //
        if ($user->hasPermissionTo('انشاء المحافظة')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, State $state): bool
    {
        //
        //
        if ($user->hasPermissionTo('تعديل المحافظة')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, State $state): bool
    {
        //
        if ($user->hasPermissionTo('حذف المحافظة')) {
            return true;
        }
        return false;
        //
        //
    }
}
