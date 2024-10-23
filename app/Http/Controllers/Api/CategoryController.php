<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\FeatureReource;
use App\Models\Category;
use App\Models\Feature;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return responseSuccess( CategoryResource::collection(Category::latest()->get()));
    }

    public function getFeatures()
    {
        return responseSuccess( FeatureReource::collection(Feature::latest()->get()));
    }

}
