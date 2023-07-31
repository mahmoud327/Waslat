<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\City;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    //
    public function index($city_id,$type=null)
    {

        $real_estates = RealEstate::query()
            ->latest()
            ->where('purpose',$type)
            ->with('city')->whereCityId($city_id)
            ->paginate(10);

        return view('website.realEstates.index', get_defined_vars());
    }
    //
    public function show($id)
    {
        $auction = RealEstate::with(['city', 'user'])->find($id);
        $real_estates = RealEstate::where('id', '!=', $auction->id)->latest()->get();
        return view('website.realEstates.show', compact('auction', 'real_estates'));
    }
}
