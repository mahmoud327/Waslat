<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRealEstateRequest;
use App\Http\Resources\RealestateResource;
use App\Http\Resources\RequestRealestateResource;
use App\Models\BookingRealEstate;
use App\Models\NotifyRealEstate;
use App\Models\RealEstate;
use App\Models\RequestRealEstate;
use Illuminate\Http\Request;

class RequestRealEstateController extends Controller
{
    public function index(Request $request)
    {
        $real_estates = RequestRealEstate::query()
            ->whereUserId(auth()->id())
            ->latest()
            ->with(['city', 'category','state'])
            ->filter($request->all())
            ->paginate($request->paginate);

        $real_estates = RequestRealestateResource::collection($real_estates)->response()->getData(true);
        $success['real_estate_requests'] = $real_estates['data'];
        $success['meta'] = $real_estates['meta'];
        return responseSuccess($success);

    }

    public function store(Request $request){
        $request['user_id']=auth()->id();
      $realEstate_request=  RequestRealEstate::create($request->all());
      $request['code']=$realEstate_request->id.rand(1000, 9999);
        $realEstate_request->features()->attach($request->features);

        return responseSuccess([], 'Real estate request successfully');
    }
    public function destroy($id){
       RequestRealEstate::findorfail($id)->delete();

        return responseSuccess([], 'Real estate request successfully');
    }
}
