<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{

    public function store(Request $request)
    {
       ContactUs::create($request->all());
       return responseSuccess([],'data saves sucefully');
    }


}
