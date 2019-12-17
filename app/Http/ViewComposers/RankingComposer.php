<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/26
 * Time: 17:34
 */

namespace App\Http\ViewComposers;


use App\Models\Article;
use App\SearchBuilders\ArticleSearchBuilder;
use Illuminate\View\View;

class RankingComposer
{
    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function compose(View $view)
    {
        $builder = (new ArticleSearchBuilder())->status('0')->paginate(8, 1);
        $builder->orderBy('clicks', 'desc');
        $result = app('es')->search($builder->getParams());

        // 通过 collect 函数将返回结果转为集合，并通过集合的 pluck 方法取到返回的文章 ID 数组
        $articlesIds = collect($result['hits']['hits'])->pluck('_id')->all();

        // 通过 whereIn 方法从数据库中读取文章数据
        $articles = Article::query()
            ->select('id','title','cover')
            ->whereIn('id', $articlesIds)
            // orderByRaw 可以让我们用原生的 SQL 来给查询结果排序
            ->orderByRaw(sprintf("FIND_IN_SET(id, '%s')", join(',', $articlesIds)))
            ->get();

        $view->with('articles', $articles);
    }
}
