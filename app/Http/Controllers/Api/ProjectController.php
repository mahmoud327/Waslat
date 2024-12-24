<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BannerResource;
use App\Http\Resources\BlogResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\StateResource;
use App\Http\Resources\UserResource;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BookingProject;
use App\Models\City;
use App\Models\Project;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{

    public function index(Request $request)
    {
        $projects = Project::query()
            ->latest()
            ->paginate($request->paginate);

        $projects = ProjectResource::collection($projects)->response()->getData(true);
        $success['projects'] = $projects['data'];
        $success['tile'] = Setting::first()->title;
        $success['description'] = Setting::first()->description;
        $success['meta'] = $projects['meta'];
        return responseSuccess($success);
    }

    public function show($id)
    {
        return responseSuccess( ProjectResource::make(Project::latest()->find($id)));
    }
    public function bookingProject(Request $request){
        BookingProject::create($request->all());
        return responseSuccess([],'data saves sucefully');

    }

}
