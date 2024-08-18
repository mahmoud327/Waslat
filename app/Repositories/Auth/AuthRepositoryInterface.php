<?php

namespace App\Repositories\Auth;


use App\Http\Requests\Api\Auth\CustomerRegisterRequest;
use App\Http\Requests\Api\Auth\LoginByDeviceIdRequest;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use Illuminate\Http\Request;

interface AuthRepositoryInterface
{
    public function login(Request $request);
    public function logout();
    public function register(RegisterRequest $request);
}
