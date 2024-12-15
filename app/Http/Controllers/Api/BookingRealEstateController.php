<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealEstateRequest;
use App\Http\Resources\BookingRealestateResource;
use App\Http\Resources\RealestateResource;
use App\Http\Resources\RequestRealestateResource;
use App\Models\BookingRealEstate;
use App\Models\NotifyRealEstate;
use App\Models\RealEstate;
use App\Models\RequestRealEstate;
use Illuminate\Http\Request;

class BookingRealEstateController extends Controller
{
    public function index(Request $request)
    {
        $real_estates = BookingRealEstate::query()
            ->whereUserId(auth()->id())
            ->with("realEstate")
            ->latest()
            ->paginate($request->paginate);

        $real_estates = BookingRealestateResource::collection($real_estates)->response()->getData(true);
        $success['real_estate_bookings'] = $real_estates['data'];
        $success['meta'] = $real_estates['meta'];
        return responseSuccess($success);

    }

    public function store(Request $request){
        $request['user_id']=auth()->id();
       $realEstate= BookingRealEstate::create($request->all());
        $request['code']=$realEstate->id.rand(1000, 9999);

        return responseSuccess([], 'Real estate successfully');
    }
    public function destroy($id){
        BookingRealEstate::findorfail($id)->delete();

        return responseSuccess([], 'Real estate request successfully');
    }
}
