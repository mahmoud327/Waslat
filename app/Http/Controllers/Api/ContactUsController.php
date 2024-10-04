<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SettingResource;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{

    public function store(Request $request)
    {
       ContactUs::create($request->all());
       return responseSuccess([],'data saves sucefully');
    }
    public function getSetting(Request $request)
    {

             return responseSuccess(SettingResource::make( Setting::first()),'data saves sucefully');
    }


}
