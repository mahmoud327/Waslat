<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index()
    {
        $banners = AboutUs::latest()->get();
        return view('about-us.index', compact('banners'));
    }
    public function store(Request $request)
    {
        $banner = new AboutUs();
        $banner->place=$request->place;
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('about-us');
            $banner->addMedia($request->file('image'))->toMediaCollection('about-us');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = AboutUs::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = AboutUs::findOrFail($id);
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->place=$request->place;

        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('about-us');
            $banner->addMedia($request->file('image'))->toMediaCollection('about-us');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
