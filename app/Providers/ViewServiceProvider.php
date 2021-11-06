<?php

namespace App\Providers;

use App\Http\View\Composers\MenuComposer;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('guest.layouts.menu', MenuComposer::class);

//        View::composer('guest.layouts.menu', function ($view) {
//
//            // following code will create $posts variable which we can use
//            // in our post.list view you can also create more variables if needed
//            //$view->with('categories',  Category::where(['isDelete' => 0, 'active' => 1, 'type' => 0]));
//        });
    }
}
