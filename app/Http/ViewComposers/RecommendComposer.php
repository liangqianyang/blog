<?php


namespace App\Http\ViewComposers;


use App\Models\Article;
use Illuminate\View\View;

class RecommendComposer
{

    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function compose(View $view)
    {
        $articles = $this->article->select(['id','title','cover'])->where('status', '0')->orderBy('likes', 'desc')->limit(7)->get();
        $view->with('articles', $articles);
    }
}
