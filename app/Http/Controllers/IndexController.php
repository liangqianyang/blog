<?php

namespace App\Http\Controllers;

use App\SearchBuilders\ArticleSearchBuilder;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Label;
use App\Services\ArticleService;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public function root(Request $request)
    {
        //获取banner
        $banners = Banner::query()->orderBy('sort', 'asc')->get();
        //头部展示文章
        $top_articles = Article::query()->select(['id', 'title', 'cover'])->where('status', '0')->orderBy('likes', 'desc')->limit(2)->get();
        //获取分类列表
        $categories = Category::query()->where('is_category', '=','1')->where('level', 0)->orderBy('sort')->get();
        $tab = [];
        if (count($categories) > 0) {
            $articleService = new ArticleService();
            $category_id = $categories->get(0)->id;
            $columns = ['id', 'cover', 'title', 'summary'];
            $articles = $articleService->getArticleByCategory($category_id, $columns, 5);
            if (count($articles)>0) {
                $tab['list'] = $articles;
                $tab['pic'] = $articles->random(2);
            }
        }
        //获取标签列表
        $labels = Label::query()->where('is_special', '=', '1')->get();
        $special_articles = [];//特殊专题的文章
        if ($labels) {
            $articleService = new ArticleService();
            $columns = ['id', 'cover', 'title', 'summary'];
            $special_articles = $articleService->getArticleByLabel(null, $columns, 6);
        }

        $limit = 9;
        $columns = ['id', 'cid', 'cover', 'title', 'summary', 'is_top', 'created_at'];
        $articles = $this->articleService->getPaginateArticleByCategory(null, $columns, $limit);

        return view('index.index',
            ['is_root' => 1, 'banners' => $banners, 'top_articles' => $top_articles,
                'labels' => $labels, 'categories' => $categories, 'special_articles' => $special_articles,
                'articles' => $articles, 'tab' => $tab]);
    }

    /**
     * 搜索列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = htmlspecialchars($request->input('keyword'));
        //获取文章列表
        $page = $request->input('page', 1);
        $perPage = 12;
        $articles = null;
        $pager = null;
        if ($keyword) {
            // 新建查询构造器对象，设置只搜索上架文章，设置分页
            $builder = (new ArticleSearchBuilder())->status('0')->paginate($perPage, $page);
            $keywords = array_filter(explode(' ', $keyword));
            $builder->keywords($keywords);
            // 调用查询构造器的分面搜索
            $builder->aggregateProperties();
            $builder->orderBy('is_top', 'desc');
            $builder->orderBy('likes', 'desc');
            $builder->orderBy('comments', 'desc');
            $result = app('es')->search($builder->getParams());

            $columns = ['id', 'cid', 'cover', 'title', 'summary', 'is_top', 'created_at'];

            // 通过 collect 函数将返回结果转为集合，并通过集合的 pluck 方法取到返回的文章 ID 数组
            $articlesIds = collect($result['hits']['hits'])->pluck('_id')->all();

            // 通过 whereIn 方法从数据库中读取文章数据
            $articles = Article::query()
                ->select($columns)
                ->whereIn('id', $articlesIds)
                // orderByRaw 可以让我们用原生的 SQL 来给查询结果排序
                ->orderByRaw(sprintf("FIND_IN_SET(id, '%s')", join(',', $articlesIds)))
                ->get();

            // 返回一个 LengthAwarePaginator 对象
            $pager = new LengthAwarePaginator($articles, $result['hits']['total'], $perPage, $page, [
                'path' => route('search', false), // 手动构建分页的 url
            ]);

        }
        return view('index.search', ['articles' => $pager, 'keyword' => $keyword]);
    }
}
