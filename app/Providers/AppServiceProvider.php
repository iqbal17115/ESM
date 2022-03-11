<?php

namespace App\Providers;

use App\Models\Backend\Setting\Currency;
use App\Models\Backend\Product\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            $view->with('currencySymbol', Currency::whereIsActive(1)->first());
            $view->with('categories', Category::orderBy('id', 'desc')->get());
        });
    }
}
