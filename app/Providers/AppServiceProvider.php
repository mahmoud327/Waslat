<?php

namespace App\Providers;

use App\Models\Banner;
use App\Models\City;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //  $cities = City::latest()
        //     ->get();




        // View::share(['cities' => $cities]);
    }
}
