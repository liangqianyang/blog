<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/21
 * Time: 16:53
 */

namespace App\Services;

use App\Models\Article;
use App\Models\Category;

class ArticleService
{

    /**
     * 根据分类获取文章列表
     * @param int $category_id 分类ID
     * @param array $columns 要展示的列
     * @param int $limit 显示的条数
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|null
     */
    public function getArticleByCategory(int $category_id, array $columns,int $limit=5)
    {
        try {
            $cate_info = Category::query()->where('id', $category_id)->first();
            if ($cate_info->level === 0) {
                //获取所有子分类的id
                $childrens = Category::query()->where('parent_id', $category_id)->pluck('id');
                $articles = Article::query()
                    ->select($columns)
                    ->whereIn('cid', $childrens)->orWhere('cid', $category_id)->orderBy('is_top', 'desc')
                    ->orderBy('likes', 'desc')
                    ->orderBy('comments', 'desc')->limit($limit)->get();
            } else {
                $articles = Article::query()
                    ->select($columns)
                    ->where('cid', $category_id)->orderBy('is_top', 'desc')
                    ->orderBy('likes', 'desc')
                    ->orderBy('comments', 'desc')->limit($limit)->get();
            }

            return $articles;
        } catch (\Exception $e) {
            return null;
        }

    }

    /**
     * 根据文章ID获取文章详情
     * @param $article_id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function detail($article_id)
    {
        try {
            $article = Article::query()
                ->with('categories:id,name')->with('labels:labels.id,title')
                ->where('id', $article_id)->orderBy('is_top', 'desc')
                ->orderBy('likes', 'desc')
                ->orderBy('comments', 'desc')->first();
            return $article;
        } catch (\Exception $e) {
            return null;
        }
    }

}
