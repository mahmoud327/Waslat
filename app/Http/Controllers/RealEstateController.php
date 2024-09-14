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
    public function homeRealEstates(Request $request)
    {
        $real_estates = RealEstate::query()
            ->latest()
            ->with(['city','category'])
            ->paginate($request->paginate);
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
