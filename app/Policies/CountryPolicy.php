<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CountryPolicy
{

    // CREATE ROLES
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
        //
        if ($user->hasPermissionTo('عرض الدول')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Country $country): bool
    {
        //
        //
        if ($user->hasPermissionTo('عرض الدول')) {
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
        if ($user->hasPermissionTo('انشاء الدولة')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Country $country): bool
    {
        //
        //
        if ($user->hasPermissionTo('تعديل الدولة')) {
            return true;
        }
        return false;
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Country $country): bool
    {
        //
        //
        if ($user->hasPermissionTo('حذف الدولة')) {
            return true;
        }
        return false;
        //
    }
}
