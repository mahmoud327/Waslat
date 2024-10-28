<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\BookingRealEstate ;
use App\Models\Category;
use App\Models\City;
use App\Models\NotifyRealEstate;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationRealEstateController extends Controller
{
    //
    public function index(){
        $bookings=NotifyRealEstate::latest()->with(['user','realEstate'])->get();
        return view('notifications.index',compact('bookings'));
    }

    public function destroy($id){
        $real_estate=NotifyRealEstate::with(['user','realEstate'])->delete($id);
        return back()->with('success', 'Auction status updated successfully!');
    }
}
