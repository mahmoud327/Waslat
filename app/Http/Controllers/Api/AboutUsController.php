<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutUsResource;
use App\Http\Resources\BannerResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AboutUsController extends Controller
{

    public function index(Request $request)
    {
        $about_us=AboutUs::when($request->place,function($q)use($request){
          $q->where('place',$request->place);
        })->latest()->get();
        return responseSuccess( AboutUsResource::collection($about_us));
    }

}
