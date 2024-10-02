<?php

namespace App\Policies;

use App\Models\Core\Country;
use App\Models\FeatureList as Feature;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FeatureListPolicy
{
            // ADMINS

    // /**
    //  * Determine whether the user can view any models.
    //  */
    // public function viewAny(User $user): bool
    // {
    //     //

    //     //
    //     if ($user->hasPermissionTo('عرض ليست المميزات')) {
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
    //     if ($user->hasPermissionTo('عرض ليست المميزات')) {
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
    //     if ($user->hasPermissionTo('انشاء ليست المميزات')) {
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
    //     if ($user->hasPermissionTo('تعديل ليست المميزات')) {
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
    //     if ($user->hasPermissionTo('حذف ليست المميزات')) {
    //         return true;
    //     }
    //     return false;
    //     //
    // }
}
