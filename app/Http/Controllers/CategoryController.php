<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $items = Category::latest()->get();
        return view('categories.index', compact('items'));
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);
        if ($request->hasFile('image')) {
            $category->clearMediaCollection('categories');
            $category->addMedia($request->file('image'))->toMediaCollection('categories');
        }
        $category->save();


        return back()->with('message', __('lang.data_saved'));
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id)->delete();
        return back()->with('message', __('lang.data_deleted'));
    }
    public function update(Request $request, $id)
    {

        $category = Category::findOrFail($id);
        $category->setTranslation('title', 'en', $request->title_en)
        ->setTranslation('title', 'ar', $request->title_ar)
        ->setTranslation('description', 'en', $request->description_en)
        ->setTranslation('description', 'ar', $request->description_ar);

        if ($request->hasFile('image')) {
            $category->clearMediaCollection('categories');
            $category->addMedia($request->file('image'))->toMediaCollection('categories');
        }

        $category->save();

        return back()->with('message', __('lang.data_saved'));
    }

}
