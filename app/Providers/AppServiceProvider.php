<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y H:i'); ?>";
        });

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

        //网站通知
        \View::composer(['layouts._notice'], \App\Http\ViewComposers\NoticeComposer::class);
        //点击排行榜
        \View::composer(['layouts._ranking'], \App\Http\ViewComposers\RankingComposer::class);
        //站长推荐
        \View::composer(['layouts._recommend'], \App\Http\ViewComposers\RecommendComposer::class);
        //标签云
        \View::composer(['layouts._tags'], \App\Http\ViewComposers\TagsComposers::class);
        //猜你喜欢
        \View::composer(['layouts._likes'], \App\Http\ViewComposers\LikesComposers::class);

        //统计文章数量
        $article_count = Article::where('status','0')->count();
        //统计文章评论数量,不包含下架的文章
        $article_comments = Article::query()->sum('comments');
        View::share('article_count', $article_count);
        View::share('article_comments', $article_comments);
    }
}
