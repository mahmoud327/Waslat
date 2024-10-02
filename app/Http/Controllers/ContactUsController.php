<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\ContactUs;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    //
    public function index(){
        $contacts=ContactUs::latest()->get();
        return view('contactUs.index',compact('contacts'));
    }
    //
    public function destroy($id)
    {
        ContactUs::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }

}
