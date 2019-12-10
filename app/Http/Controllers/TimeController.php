<?php


namespace App\Http\Controllers;


use App\Models\Article;

class TimeController extends Controller
{
    public function index(Article $article){

        $articles = $article->select('id','title','created_at')->where('status','0')->orderBy('created_at','desc')->paginate(25);
        return view('time.index', [ 'articles' => $articles]);
    }
}
