<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\UnexpectedException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\Auth\AuthRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct(public AuthRepositoryInterface $authRepository)
    {
    }
    public function register(RegisterRequest $request)
    {
        try {
            $user = $this->authRepository->register($request);
            return responseSuccess([
                'code' => '1111',
            ], __('lang.users.Registered'));
        } catch (UnexpectedException $ex) {
            return responseError($ex->getMessage(), 402);
        }
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();
            return responseSuccess([
                'code' => '1111',
            ], __('lang.users.Registered'));

            $success['token'] = $authUser->createToken('authToken')->plainTextToken;
            $success['user'] = new UserResource($authUser);
            return responseSuccess($success, __('lang.users.login'));
        } else {
            return responseError(__('lang.users.incorrect data'), 401);
        }
    }

    public function sendOtp( Request $request)
    {
        $user=User::where('email',$request->email)->firstorfail();
            return responseSuccess([
                'code'=>"1111"
            ], __('lang.users.valid code'));
    }
    public function verifyOtp( Request $request)
    {
        $user=User::where('email',$request->email)->firstorfail();
        if ($request->code=='1111') {
            $user->update(['is_verify'=>1]);
            $success['token'] = $user->createToken('authToken')->plainTextToken;
            $success['user'] = new UserResource($user);

            return responseSuccess($success, __('lang.users.valid code'));

        }
        return responseSuccess([], __('lang.users.invalid code'));
    }

}
