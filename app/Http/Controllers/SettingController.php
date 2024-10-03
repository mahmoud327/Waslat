<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Term;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first();
        return view('settings.edit', compact('setting')); // Pass the term data to the view
    }

    public function update(Request $request)
    {
        $terms = Setting::first();
        $terms->update($request->except(['about_us_en','about_us_ar']));
        $terms->setTranslation('about_us', 'en', $request->input('about_us_en'));
        $terms->setTranslation('about_us', 'ar', $request->input('about_us_ar'));
        $terms->save();
        return back()->with('message',__('lang.data_saved'));

    }


}
