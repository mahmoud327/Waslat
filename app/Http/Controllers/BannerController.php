<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('banners.index', compact('banners'));
    }

    public function store(Request $request)
    {


        $banner = new Banner();
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('banners');
            $banner->addMedia($request->file('image'))->toMediaCollection('banners');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('banners');
            $banner->addMedia($request->file('image'))->toMediaCollection('banners');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
