<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\BookingRealEstate ;
use App\Models\Category;
use App\Models\City;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class BookingRealEstateController extends Controller
{
    //
    public function index(){
        $bookings=BookingRealEstate::latest()->with(['user','realEstate'])->get();
        return view('bookings.index',compact('bookings'));
    }

    public function destroy($id){
        $real_estate=BookingRealEstate::with(['user','realEstate'])->delete($id);
        return back()->with('success', 'Auction status updated successfully!');
    }
}
