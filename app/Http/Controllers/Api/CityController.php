<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CityController extends Controller
{

    public function index()
    {
        return responseSuccess( CityResource::collection(City::latest()->get()));
    }
    public function states()
    {
        return responseSuccess( CityResource::collection(State::latest()->get()));
    }

}
