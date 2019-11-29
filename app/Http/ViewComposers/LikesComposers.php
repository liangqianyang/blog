<?php


namespace App\Http\ViewComposers;


use App\Models\Article;
use Illuminate\View\View;

class LikesComposers
{

    private $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function compose(View $view)
    {
        $articles = $this->article->select(['id','title'])->where('status', '0')->orderBy('comments', 'desc')->limit(8)->get();
        $view->with('articles', $articles);
    }
}
