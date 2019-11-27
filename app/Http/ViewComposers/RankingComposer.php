<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/26
 * Time: 17:34
 */

namespace App\Http\ViewComposers;


use App\Models\Article;
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
        $articles = $this->article->select(['id','title','cover'])->where('status', '0')->orderBy('clicks', 'desc')->limit(8)->get();
        $view->with('articles', $articles);
    }
}
