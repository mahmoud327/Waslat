<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BlogController extends Controller
{

    public function index()
    {
        return responseSuccess( BlogResource::collection(Blog::latest()->get()));
    }

    public function show($id)
    {
        return responseSuccess( BlogResource::collection(Blog::latest()->get()));
    }

}
