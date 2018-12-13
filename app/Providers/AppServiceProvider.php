<?php

namespace App\Providers;

use App\BlogCategory;
use App\Product;
use App\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.layouts.categories_tags',function ($view){

            $view->with('tags',Tag::has('posts')->get());
            $view->with('categories',BlogCategory::has('posts')->get());

        });

        view()->composer('frontend.layouts.interests',function ($view){

            $view->with('interests',Product::where('status',1)->get()->random(3));


        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
