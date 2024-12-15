<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Partner;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $banners = Certificate::latest()->get();
        return view('certificates.index', compact('banners'));
    }

    public function store(Request $request)
    {

        $banner = new Certificate();
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar);
        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('certificates');
            $banner->addMedia($request->file('image'))->toMediaCollection('certificates');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = Certificate::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = Certificate::findOrFail($id);
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar);
        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('certificates');
            $banner->addMedia($request->file('image'))->toMediaCollection('certificates');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
