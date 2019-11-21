<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Services\ArticleService;

class IndexController extends Controller
{
    public function root()
    {
        //获取banner
        $banners = Banner::query()->orderBy('sort', 'asc')->get();
        //获取分类列表
        $categories = Category::query()->where('is_category', 1)->where('level', 0)->orderBy('sort')->get();
        $tab = [];
        if ($categories) {
            $articleService = new ArticleService();
            $category_id = $categories->get(0)->id;
            $columns = ['id', 'cover', 'title', 'summary'];
            $articles = $articleService->getArticleByCategory($category_id, $columns);
            if ($articles) {
                $tab['list'] = $articles;
                $tab['pic'] = $articles->random(2);
            }
        }
        return view('index.index', ['is_root' => 1, 'banners' => $banners, 'categories' => $categories, 'tab' => $tab]);
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
