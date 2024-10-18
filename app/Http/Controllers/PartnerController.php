<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index()
    {
        $banners = Partner::latest()->get();
        return view('partners.index', compact('banners'));
    }

    public function store(Request $request)
    {


        $banner = new Partner();
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar);
        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('partners');
            $banner->addMedia($request->file('image'))->toMediaCollection('partners');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = Partner::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = Partner::findOrFail($id);
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar);
        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('partners');
            $banner->addMedia($request->file('image'))->toMediaCollection('partners');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
