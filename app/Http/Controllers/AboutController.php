<?php

namespace App\Http\Controllers;

use App\Models\Article;

class AboutController extends Controller
{
    public function index()
    {
        $articles = Article::query()->select(['id', 'title','summary' ,'cover'])->where('status', '0')->orderBy('likes', 'desc')
            ->limit(8)->get();
        return view('about.index', ['articles' => $articles]);
    }
}
