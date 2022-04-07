<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Supercategory;

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
        //
        /*view()->composer('master', function($view){
            $view->with('supercategories', Supercategory::getCategories());
        });*/
    }
}
