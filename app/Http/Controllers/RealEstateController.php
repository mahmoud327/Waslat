<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealEstateRequest;
use App\Http\Resources\RealestateResource;
use App\Models\Auction;
use App\Models\City;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function index(Request $request)
    {
        $real_estates = RealEstate::query()
            ->whereUserId(auth()->id())
            ->latest()
            ->with(['city','category'])
            ->filter($request->all())
            ->paginate($request->paginate);

            $real_estates = RealestateResource::collection($real_estates)->response()->getData(true);
            $success['real_estates'] = $real_estates['data'];
            $success['meta'] = $real_estates['meta'];
            return responseSuccess($success);

    }
    public function homeRealEstates(Request $filters)
    {
        $real_estates = RealEstate::query()
            ->when($filters['type'] ,function($query)use($filters) {
                $query->where('type', $filters['type'] );
            })
            ->when(($filters['price_from'] ?? null) &&
             ($filters['price_to'] ?? null), function ($query) use ($filters) {
                $query->whereBetween('price', [$filters['price_from'], $filters['price_to']]);
            })
            ->when($filters['phone'] ?? null, function ($query, $phone) {
                $query->where('phone', 'like', '%' . $phone . '%');
            })
            ->when($filters['number_of_rooms'] ?? null, function ($query, $rooms) {
                $query->where('number_of_rooms', $rooms);
            })
            ->when($filters['bathrooms_of_rooms'] ?? null, function ($query, $bathrooms) {
                $query->where('bathrooms_of_rooms', $bathrooms);
            })
            ->when($filters['hall_number'] ?? null, function ($query, $hall) {
                $query->where('hall_number', $hall);
            })
            ->when($filters['number_of_council_rooms'] ?? null, function ($query, $councilRooms) {
                $query->where('number_of_council_rooms', $councilRooms);
            })
            ->when($filters['land_area'] ?? null, function ($query, $landArea) {
                $query->where('land_area', 'like', '%' . $landArea . '%');
            })
            ->when($filters['street'] ?? null, function ($query, $street) {
                $query->where('street', 'like', '%' . $street . '%');
            })
            ->when($filters['number_of_streets'] ?? null, function ($query, $streets) {
                $query->where('number_of_streets', $streets);
            })
            ->when($filters['street_area'] ?? null, function ($query, $streetArea) {
                $query->where('street_area', $streetArea);
            })
            ->when($filters['street_facing'] ?? null, function ($query, $streetFacing) {
                $query->where('street_facing', 'like', '%' . $streetFacing . '%');
            })
            ->when($filters['electricity'] ?? null, function ($query, $electricity) {
                $query->where('electricity', $electricity);
            })
            ->when($filters['water'] ?? null, function ($query, $water) {
                $query->where('water', $water);
            })
            ->when($filters['Depth'] ?? null, function ($query, $depth) {
                $query->where('Depth', 'like', '%' . $depth . '%');
            })
            ->when($filters['features_facilities'] ?? null, function ($query, $features) {
                $query->where('features_facilities', 'like', '%' . $features . '%');
            })

            ->when($filters['whatsup'] ?? null, function ($query, $whatsup) {
                $query->where('whatsup', 'like', '%' . $whatsup . '%');
            })
            ->when($filters['email'] ?? null, function ($query, $email) {
                $query->where('email', 'like', '%' . $email . '%');
            })
            ->when($filters['marketer_name'] ?? null, function ($query, $marketerName) {
                $query->where('marketer_name', 'like', '%' . $marketerName . '%');
            })
            ->when($filters['license_number'] ?? null, function ($query, $licenseNumber) {
                $query->where('license_number', 'like', '%' . $licenseNumber . '%');
            })
            ->when($filters['city_id'] ?? null, function ($query, $cityId) {
                $query->where('city_id', $cityId);
            })
            ->when($filters['category_id'] ?? null, function ($query, $categoryId) {
                $query->where('category_id', $categoryId);
            })
            ->when($filters['user_id'] ?? null, function ($query, $userId) {
                $query->where('user_id', $userId);
            })
            ->paginate($filters->paginate);
            $real_estates = RealestateResource::collection($real_estates)->response()->getData(true);
            $success['real_estates'] = $real_estates['data'];
            $success['meta'] = $real_estates['meta'];
            return responseSuccess($success);

    }
    public function show($id)
    {
        $real_estate = RealEstate::query()
            ->whereUserId(auth()->id())
            ->latest()
            ->with(['city','category'])
            ->find($id);


            return responseSuccess(RealestateResource::make($real_estate));
    }

    public function store(StoreRealEstateRequest $request)
    {
        $data = $request->validated();
        $data['user_id']=auth()->id();
        $realEstate = RealEstate::create($data);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $realEstate->addMedia($image)->toMediaCollection('images');
            }
        }
        if ($request->hasFile('plan')) {
                $realEstate->addMedia($request->plan)->toMediaCollection('plans');
        }
        if ($request->hasFile('videos')) {
            foreach ($request->file('videos') as $video) {
                $realEstate->addMedia($video)->toMediaCollection('videos');
            }
        }
       return  responseSuccess([],'Real estate created successfully');
    }

}
