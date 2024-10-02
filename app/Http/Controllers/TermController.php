<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    public function edit()
    {
        $term = Term::first();
        return view('terms.edit', compact('term')); // Pass the term data to the view
    }

    public function update(Request $request)
    {
        $terms = Term::first();
        $terms->setTranslation('description', 'en', $request->input('description_en'));
        $terms->setTranslation('description', 'ar', $request->input('description_ar'));
        $terms->save();
        return back()->with('message',__('lang.data_saved'));

    }


}
