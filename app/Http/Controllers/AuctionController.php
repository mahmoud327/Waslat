<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    //
    public function index(){
        $auctions=Auction::latest()->with('city')->get();
        return view('website.auctions.index',compact('auctions'));
    }
}
