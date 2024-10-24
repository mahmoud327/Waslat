<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Feature;
use App\Models\State;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    public function index()
    {
        $items = Feature::latest()->get();
        return view('features.index', compact('items'));
    }

    public function store(Request $request)
    {
        $category = new Feature();
        $category->setTranslation('name', 'en', $request->name_en)
        ->setTranslation('name', 'ar', $request->name_ar);
        // ->setTranslation('description', 'en', $request->description_en)
        // ->setTranslation('description', 'ar', $request->description_ar);
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('features');
            $category->addMedia($request->file('image'))->toMediaCollection('features');
        }
        $category->save();


        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $category = Feature::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {

        $category = Feature::findOrFail($id);
        $category->setTranslation('name', 'en', $request->name_en)
        ->setTranslation('name', 'ar', $request->name_ar);
        // ->setTranslation('description', 'en', $request->description_en)
        // ->setTranslation('description', 'ar', $request->description_ar);
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('features');
            $category->addMedia($request->file('image'))->toMediaCollection('features');
        }
        $category->save();

        return back()->with('message', __('lang.data_saved'));
    }

}
