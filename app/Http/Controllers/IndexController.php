<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Label;
use App\Services\ArticleService;

class IndexController extends Controller
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * 网站首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function root()
    {
        //获取banner
        $banners = Banner::query()->orderBy('sort', 'asc')->get();
        //头部展示文章
        $top_articles = Article::query()->select(['id','title','cover'])->where('status', '0')->orderBy('likes', 'desc')->limit(2)->get();
        //获取分类列表
        $categories = Category::query()->where('is_category', 1)->where('level', 0)->orderBy('sort')->get();
        $tab = [];
        if ($categories) {
            $articleService = new ArticleService();
            $category_id = $categories->get(0)->id;
            $columns = ['id', 'cover', 'title', 'summary'];
            $articles = $articleService->getArticleByCategory($category_id, $columns, 5);
            if ($articles) {
                $tab['list'] = $articles;
                $tab['pic'] = $articles->random(2);
            }
        }
        //获取标签列表
        $labels = Label::query()->where('is_special', 1)->get();
        $special_articles = [];//特殊专题的文章
        if ($labels) {
            $articleService = new ArticleService();
            $columns = ['id', 'cover', 'title', 'summary'];
            $special_articles = $articleService->getArticleByLabel(null, $columns, 6);
        }

        //获取文章列表
        $limit = 9;
        $columns = ['id', 'cid', 'cover', 'title', 'summary', 'is_top', 'created_at'];
        $articles = $this->articleService->getPaginateArticleByCategory(null, $columns, $limit);
        return view('index.index',
            ['is_root' => 1, 'banners' => $banners, 'top_articles' => $top_articles,
                'labels' => $labels,
                'categories' => $categories, 'special_articles' => $special_articles, 'articles' => $articles, 'tab' => $tab]);
    }

    public function info()
    {
        return view('index.info');
    }

    public function list()
    {
        return view('index.list');
    }

    public function list2()
    {
        return view('index.list2');
    }

    public function list3()
    {
        return view('index.list3');
    }

    public function time()
    {
        return view('index.time');
    }

    public function about()
    {
        return view('index.about');
    }

    public function daohang()
    {
        return view('index.daohang');
    }

    public function message()
    {
        return view('index.message');
    }

}
