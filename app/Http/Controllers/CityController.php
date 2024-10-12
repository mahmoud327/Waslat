<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cites = City::latest()->get();
        return view('cities.index', compact('cites'));
    }

    public function store(Request $request)
    {


        $banner = new City();
        $banner->setTranslation('name', 'en', $request->name_en)
        ->setTranslation('name', 'ar', $request->name_ar);
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = City::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = City::findOrFail($id);
        $banner->setTranslation('name', 'en', $request->name_en)
        ->setTranslation('name', 'ar', $request->name_ar);
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
