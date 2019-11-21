<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/20
 * Time: 17:31
 */

namespace App\Http\Controllers;

use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    /**
     * 根据分类获取文章列表
     * @param Request $request
     * @return array
     */
    public function getArticleByCategory(Request $request)
    {
        $category_id = $request->input('category_id');
        $columns = ['id', 'cover', 'title', 'summary'];
        $articles = $this->articleService->getArticleByCategory($category_id, $columns);
        $data = [];
        if ($articles) {
            $data['list'] = $articles;
            $data['pic'] = $articles->random(2);
        }
        return $data;
    }

    public function list(Request $request)
    {

    }

    /**
     * 显示文章详情
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|\think\response\View
     */
    public function show(Request $request)
    {
        $id = $request->input('id');
        $article = $this->articleService->detail($id);
        return view('article.show', ['article' => $article]);
    }
}
