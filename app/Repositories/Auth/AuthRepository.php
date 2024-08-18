<?php
namespace App\Repositories\Auth;

use App\Exceptions\UnexpectedException;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthRepository implements AuthRepositoryInterface
{
    public function __construct(public User $model) {}

    public function register(RegisterRequest $request)
    {
        try {
            return $this->model::create($request->validated());

        } catch (\Exception $e) {
            Log::warning($e);
            throw new UnexpectedException($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }

    public function login($request)
    {
        DB::beginTransaction();
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $authUser = Auth::user();
                if (!$authUser->is_active) {
                    DB::rollback();
                    return response()->json([
                        'status' => false,
                        'message' => 'User account is not active.',
                    ], Response::HTTP_FORBIDDEN);
                }
                $success['token'] = $authUser->createToken('sanctumAuth')->plainTextToken;
                $success['user'] = new UserResource($authUser);
                DB::commit();
                return $success;
            } else {
                DB::rollback();
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials.',
                ], Response::HTTP_UNAUTHORIZED);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::warning($e);
            throw new UnexpectedException($e->getMessage());
        }
    }

    public function logout()
    {
        $user = request()->user();

        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully',
        ], Response::HTTP_OK);
    }
}
