<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\BookingRealEstate ;
use App\Models\Category;
use App\Models\City;
use App\Models\RealEstate;
use App\Models\RequestRealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class RequestRealEstateController extends Controller
{
    //
    public function index(){
        $bookings=RequestRealEstate::latest()->with(['user','category','state','city'])->get();
        return view('requests.index',compact('bookings'));
    }

    public function destroy($id){
        $real_estate=RequestRealEstate::find($id)->delete();
        return back()->with('success', 'Auction status updated successfully!');
    }
}
