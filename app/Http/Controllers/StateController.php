<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    public function index()
    {
        $states = State::latest()->with('city')->get();
        $cites=City::latest()->get();

        return view('states.index', compact('cites','states'));
    }

    public function store(Request $request)
    {

        $banner = new State();
        $banner->setTranslation('name', 'en', $request->name_en)
        ->setTranslation('name', 'ar', $request->name_ar);
        $banner->city_id=$request->city_id;
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = State::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)

    {
        $banner = State::findOrFail($id);
        $banner->setTranslation('name', 'en', $request->name_en)
        ->setTranslation('name', 'ar', $request->name_ar);
       $banner->city_id=$request->city_id;
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
