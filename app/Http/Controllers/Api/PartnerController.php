<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PartnerReource;
use App\Models\Category;
use App\Models\Certificate;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{

    public function index()
    {
        return responseSuccess( PartnerReource::collection(Partner::latest()->get()));
    }
    public function certificates()
    {
        return responseSuccess( PartnerReource::collection(Certificate::latest()->get()));
    }

}
