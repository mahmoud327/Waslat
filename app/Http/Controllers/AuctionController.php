<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Category;
use App\Models\City;
use App\Models\RealEstate;
use App\Models\User;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    //
    public function index(){
        $auctions=RealEstate::latest()->with('city')->get();
        return view('auctions.index',compact('auctions'));
    }
    //
    public function edit($id)
    {
        $real_estate = RealEstate::with(['city', 'user'])->findOrFail($id);
        $categories = Category::all();
        $users = User::all();
        $cities = City::all();

        return view('auctions.edit', compact('real_estate', 'categories', 'users', 'cities'));
    }


    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'type' => 'required|string',
        'price' => 'required|numeric',
        'phone' => 'nullable|string',
        'number_of_rooms' => 'nullable|integer',
        'bathrooms_of_rooms' => 'nullable|integer',
        'hall_number' => 'nullable|integer',
        'number_of_council_rooms' => 'nullable|integer',
        'land_area' => 'nullable|numeric',
        'street' => 'nullable|string',
        'number_of_streets' => 'nullable|integer',
        'street_area' => 'nullable|numeric',
        'street_facing' => 'nullable|string',
        'electricity' => 'nullable|string',
        'water' => 'nullable|string',
        'description' => 'nullable|string',
        'city_id' => 'required|exists:cities,id',
    ]);

    $realEstate = RealEstate::findOrFail($id);
    $realEstate->update($validated);

    if ($request->hasFile('images')) {
        $realEstate->clearMediaCollection('images'); // Clear old images
        foreach ($request->file('images') as $image) {
            $realEstate->addMedia($image)->toMediaCollection('images');
        }
    }

    // Handle videos upload with Spatie Media Library
    if ($request->hasFile('videos')) {
        $realEstate->clearMediaCollection('videos'); // Clear old videos
        foreach ($request->file('videos') as $video) {
            $realEstate->addMedia($video)->toMediaCollection('videos');
        }
    }
    if ($request->hasFile('plans')) {
        $realEstate->clearMediaCollection('plans'); // Clear old videos
        foreach ($request->file('plans') as $video) {
            $realEstate->addMedia($video)->toMediaCollection('plans');
        }
    }

    return redirect()->route('auctions.index')->with('success', 'Real estate updated successfully!');
}

public function toggleStatus($id)
{
    $auction = RealEstate::findOrFail($id);
    $auction->is_active = !$auction->is_active; // Toggle the status
    $auction->save();
    return redirect()->route('auctions.index')->with('success', 'Auction status updated successfully!');
}

    public function show($id){
        $real_estate=RealEstate::with(['city','user'])->find($id);
                return view('auctions.show',compact('real_estate'));
    }
    public function destroy($id){
        $real_estate=RealEstate::with(['city','user'])->delete($id);
        return back()->with('success', 'Auction status updated successfully!');
    }
}
