<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    //
    public function index(){
        $auctions=RealEstate::latest()->with('city')->get();
        return view('auctions.index',compact('auctions'));
    }
    //
    public function show($id){
        $auction=Auction::with(['city','user'])->find($id);
                return view('auctions.show',compact('auction'));
    }
}
