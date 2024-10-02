<?php

namespace App\Policies;

use App\Models\Country;
use App\Models\Feature;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeaturePolicy
{
    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     //

    //     //
    //     if ($user->hasPermissionTo('عرض المميزات')) {
    //         return true;
    //     }
    //     return false;
    //     //
    // }

    // /**
    //  * Determine whether the user can view the model.
    //  */
    // public function view(User $user, Feature $feature): bool
    // {
    //     //
    //     //
    //     if ($user->hasPermissionTo('عرض المميزات')) {
    //         return true;
    //     }
    //     return false;
    //     //
    // }

    // /**
    //  * Determine whether the user can create models.
    //  */
    // public function create(User $user): bool
    // {
    //     //
    //     //
    //     if ($user->hasPermissionTo('انشاء ميزة')) {
    //         return true;
    //     }
    //     return false;
    //     //
    // }

    // /**
    //  * Determine whether the user can update the model.
    //  */
    // public function update(User $user, Feature $feature): bool
    // {
    //     //
    //     //
    //     if ($user->hasPermissionTo('تعديل ميزة')) {
    //         return true;
    //     }
    //     return false;
    //     //
    // }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    // public function delete(User $user, Feature $feature): bool
    // {
    //     //
    //     //
    //     if ($user->hasPermissionTo('عرض المميزات')) {
    //         return true;
    //     }
    //     return false;
    //     //
    // }
}
