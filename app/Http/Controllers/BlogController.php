<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $banners = Blog::latest()->get();
        return view('blogs.index', compact('banners'));
    }

    public function store(Request $request)
    {

        $banner = new Blog();
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->videos=$request->videos;
        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('blogs');
            $banner->addMedia($request->file('image'))->toMediaCollection('blogs');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $banner = Blog::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {
        $banner = Blog::findOrFail($id);
        $banner->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        $banner->videos=$request->videos;

        // $banner->active=$request->active;
        if ($request->hasFile('image')) {
            $banner->clearMediaCollection('blogs');
            $banner->addMedia($request->file('image'))->toMediaCollection('blogs');
        }
        $banner->save();
        return back()->with('message', __('lang.data_saved'));
    }

}
