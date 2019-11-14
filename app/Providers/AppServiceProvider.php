<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        $navs = Category::query()->where('level', 0)->orderBy('sort', 'asc')->select('id', 'name', 'is_category')->get();
        foreach ($navs as &$nav) {
            $children = $nav->children()->get();
            $nav['children'] = $children;
        }
        View::share('navs', $navs);
    }
}
