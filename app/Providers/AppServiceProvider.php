<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
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
        $navs = Category::query()->where('level', 0)->orderBy('sort', 'asc')
            ->select('id', 'name','url', 'is_category')->get();
        foreach ($navs as &$nav) {
            $children = $nav->children()->get();
            $nav['children'] = $children;
        }
        $pages = Page::query()->orderBy('sort','asc')->select('id','title','url')->get();
        View::share('navs', $navs);
        View::share('pages', $pages);
    }
}
