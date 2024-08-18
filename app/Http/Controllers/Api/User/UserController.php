<?php

namespace App\Http\Controllers\Api\User;

use App\Enums\UserTypesEnum;
use App\Exceptions\PasswordInvaild;
use App\Exceptions\UnexpectedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PersonalData\ChangePasswordRequest;
use App\Http\Requests\Api\PersonalData\CustomerProfileRequest;
use App\Http\Requests\Api\PersonalData\ProfileRequest;
use App\Http\Requests\Api\PersonalData\SellerProfileRequest;
use App\Http\Resources\UserDetailsResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function profileInfo()
    {
        $user = Auth::user();
        return responseSuccess(new UserResource($user));
    }

}
