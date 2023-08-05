<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $banners = Banner::latest()
            ->get();

        $categories = Category::latest()
            ->active()
            ->with(['realEstates','realEstates.city'])
            ->get();
        return view('website.home', get_defined_vars());
    }
}
