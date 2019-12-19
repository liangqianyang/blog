<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use Elasticsearch\ClientBuilder as ESClientBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Laravel\Horizon\Horizon;

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

        // 注册一个名为 es 的单例
        $this->app->singleton('es', function () {
            // 从配置文件读取 Elasticsearch 服务器列表
            $builder = ESClientBuilder::create()->setHosts(config('database.elasticsearch.hosts'));
            // 如果是开发环境
            if (app()->environment() === 'local') {
                // 配置日志，Elasticsearch 的请求和返回数据将打印到日志文件中，方便我们调试
                $builder->setLogger(app('log')->driver());
            }

            return $builder->build();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Horizon::auth(function ($request) {
           return true;
        });

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
        //首页个人简介
        \View::composer(['layouts._card'], \App\Http\ViewComposers\CardComposer::class);
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
        //关于我
        \View::composer(['about.index'], \App\Http\ViewComposers\CardComposer::class);
        //统计文章数量
        $article_count = Article::where('status', '0')->count();
        //统计文章评论数量,不包含下架的文章
        $article_comments = Article::query()->sum('comments');
        View::share('article_count', $article_count);
        View::share('article_comments', $article_comments);
    }
}
