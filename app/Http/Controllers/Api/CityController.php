<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Http\Resources\StateResource;
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
    public function index(Request $request)
    {
        $states=City::latest()
          ->with('state')
        ->when($request->state_id,function($q) use($request){
            $q->where('state_id',$request->state_id);
        })->get();
        return responseSuccess( CityResource::collection($states));
    }
    public function states(Request $request)
    {
        $states=State::latest()
        ->when($request->city_id,function($q) use($request){
            $q->where('city_id',$request->city_id);
        })->get();
        return responseSuccess( StateResource::collection($states));
    }

}
