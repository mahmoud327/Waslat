<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRealEstateRequest;
use App\Http\Resources\RealestateResource;
use App\Models\RealEstate;
use Illuminate\Http\Request;

class RealEstateController extends Controller
{
    public function index(Request $request)
    {
        $real_estates = RealEstate::query()
            ->whereUserId(auth()->id())
            ->latest()
            ->with(['city', 'category'])
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
            ->active()
            ->with(['city', 'category','city.state'])
            ->filter($request->all())
            ->paginate($request->paginate);
        $real_estates = RealestateResource::collection($real_estates)->response()->getData(true);
        $success['real_estates'] = $real_estates['data'];
        $success['meta'] = $real_estates['meta'];
        return responseSuccess($success);

    }
    public function show($id)
    {
        $real_estate = RealEstate::query()
            ->latest()
            ->with(['city', 'category','city.state'])
            ->find($id);

        return responseSuccess(RealestateResource::make($real_estate));
    }

    public function store(StoreRealEstateRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
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
        return responseSuccess([], 'Real estate created successfully');
    }

    public function update(StoreRealEstateRequest $request, RealEstate $realEstate)
    {
        $data = $request->validated();

        $realEstate->update($data);

        // Handle updating images
        if ($request->hasFile('images')) {
            // Optional: Clear existing images (if necessary)
            $realEstate->clearMediaCollection('images');
            // Add the new images
            foreach ($request->file('images') as $image) {
                $realEstate->addMedia($image)->toMediaCollection('images');
            }
        }

        // Handle updating plans
        if ($request->hasFile('plan')) {
            // Optional: Clear existing plan (if necessary)
            $realEstate->clearMediaCollection('plans');
            // Add the new plan
            $realEstate->addMedia($request->plan)->toMediaCollection('plans');
        }

        // Handle updating videos
        if ($request->hasFile('videos')) {
            // Optional: Clear existing videos (if necessary)
            $realEstate->clearMediaCollection('videos');
            // Add the new videos
            foreach ($request->file('videos') as $video) {
                $realEstate->addMedia($video)->toMediaCollection('videos');
            }
        }
        return responseSuccess([], 'Real estate updated successfully');
    }
    public function destroy(RealEstate $realEstate)
    {
        $realEstate->clearMediaCollection('images');
        $realEstate->clearMediaCollection('plans');
        $realEstate->clearMediaCollection('videos');

        $realEstate->delete();

        return responseSuccess([], 'Real estate deleted successfully');
    }

}
