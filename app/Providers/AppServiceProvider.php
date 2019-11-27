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
        //获取导航
        $navs = Category::query()->where('level', 0)->orderBy('sort', 'asc')
            ->select('id', 'name', 'url', 'is_category')->get();
        foreach ($navs as &$nav) {
            $children = $nav->children()->get();
            $nav['children'] = $children;
        }
        //获取单页
        $pages = Page::query()->orderBy('sort', 'asc')->select('id', 'title', 'url')->get();
        View::share('navs', $navs);
        View::share('pages', $pages);

        \View::composer(['layouts._notice'], \App\Http\ViewComposers\NoticeComposer::class);
        \View::composer(['layouts._ranking'], \App\Http\ViewComposers\RankingComposer::class);
    }
}
