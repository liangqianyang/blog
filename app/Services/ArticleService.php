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
     * 根据文章分类获取文章的条数
     * @param  $category_id 分类ID
     * @return int
     */
    public function getArticlesCountByCategory($category_id = null)
    {
        try {
            if (!empty($category_id)) {
                $cate_info = Category::query()->where('id', $category_id)->first();
                if ($cate_info->level === 0) {
                    //获取所有子分类的id
                    $childrens = Category::query()->where('parent_id', $category_id)->pluck('id');
                    $count = Article::query()->whereIn('cid', $childrens)->orWhere('cid', $category_id)
                        ->where('status', '0')
                        ->orderBy('is_top', 'desc')
                        ->count();
                } else {
                    $count = Article::query()->where('cid', $category_id)->where('status', '0')->count();
                }
            } else {
                $count = Article::query()->where('status', '0')->count();
            }

            return $count;
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * 根据标签统计文章数量
     * @param $label_id
     * @return int
     */
    public function getArticlesCountByLabel($label_id)
    {
        try {
            $count = Article::query()->whereHas('labels', function ($query) use ($label_id) {
                $query->where('labels.id', '=', $label_id);
            })->where('status', '0')->count();
            return $count;
        } catch (\Exception $e) {
            return 0;
        }
    }

    /**
     * 根据分类获取文章列表
     * @param int|null $category_id 分类ID
     * @param array $columns 要展示的列
     * @param int $limit 显示的条数
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|null
     */
    public function getArticleByCategory($category_id = null, array $columns, int $limit = 5)
    {
        try {
            if (!empty($category_id)) {
                $cate_info = Category::query()->where('id', $category_id)->first();
                if ($cate_info->level === 0) {
                    //获取所有子分类的id
                    $childrens = Category::query()->where('parent_id', $category_id)->pluck('id');
                    $articles = Article::query()
                        ->select($columns)
                        ->whereIn('cid', $childrens)->orWhere('cid', $category_id)->where('status', '0')
                        ->orderBy('is_top', 'desc')->orderBy('likes', 'desc')
                        ->orderBy('comments', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->limit($limit)->get();
                } else {
                    $articles = Article::query()
                        ->select($columns)
                        ->where('cid', $category_id)->where('status', '0')->orderBy('is_top', 'desc')
                        ->orderBy('likes', 'desc')->orderBy('comments', 'desc')
                        ->orderBy('created_at', 'desc')
                        ->limit($limit)->get();
                }
            } else {
                $articles = Article::query()->with('categories:id,name')
                    ->select($columns)->where('status', '0')->orderBy('is_top', 'desc')
                    ->orderBy('likes', 'desc')->orderBy('comments', 'desc')
                    ->orderBy('created_at', 'desc')
                    ->limit($limit)->get();
            }
            return $articles;
        } catch (\Exception $e) {
            return null;
        }

    }

    /**
     * 根据分类获取文章分页列表
     * @param null $category_id
     * @param array $columns
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function getPaginateArticleByCategory($category_id = null, array $columns, int $limit = 5)
    {
        try {
            if (!empty($category_id)) {
                $cate_info = Category::query()->where('id', $category_id)->first();
                if ($cate_info->level === 0) {
                    //获取所有子分类的id
                    $childrens = Category::query()->where('parent_id', $category_id)->pluck('id');
                    $articles = Article::query()->with('categories:id,name')
                        ->select($columns)
                        ->whereIn('cid', $childrens)->orWhere('cid', $category_id)->where('status', '0')
                        ->orderBy('is_top', 'desc')->orderBy('likes', 'desc')
                        ->orderBy('comments', 'desc')
                        ->orderBy('created_at', 'desc')->paginate($limit);
                } else {
                    $articles = Article::query()->with('categories:id,name')
                        ->select($columns)
                        ->where('cid', $category_id)->where('status', '0')->orderBy('is_top', 'desc')
                        ->orderBy('likes', 'desc')->orderBy('comments', 'desc')
                        ->orderBy('created_at', 'desc')->paginate($limit);
                }
            } else {
                $articles = Article::query()->with('categories:id,name')
                    ->select($columns)->where('status', '0')->orderBy('is_top', 'desc')
                    ->orderBy('likes', 'desc')->orderBy('comments', 'desc')
                    ->orderBy('created_at', 'desc')->paginate($limit);
            }
            return $articles;
        } catch (\Exception $e) {
            return null;
        }

    }

    /**
     * 根据标签获取文章列表
     * @param int $label_id 标签ID
     * @param array $columns
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|null
     */
    public function getArticleByLabel($label_id, array $columns, int $limit = 6)
    {
        try {
            if (!empty($label_id)) {
                $articles = Article::query()->with('categories:id,name')->select($columns)
                    ->whereHas('labels', function ($query) use ($label_id) {
                        $query->where('labels.id', '=', $label_id);
                    })
                    ->where('status', '0')
                    ->orderBy('is_top', 'desc')->orderBy('likes', 'desc')
                    ->orderBy('comments', 'desc')
                    ->orderBy('created_at', 'desc')->limit($limit)->get();
            } else {
                $articles = Article::query()->with('categories:id,name')
                    ->select($columns)->where('status', '0')->orderBy('is_top', 'desc')
                    ->orderBy('likes', 'desc')->orderBy('comments', 'desc')
                    ->orderBy('created_at', 'desc')->limit($limit)->get($limit);
            }
            return $articles;
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * 根据标签获取文章分页列表
     * @param $label_id 标签ID
     * @param array $columns
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|null
     */
    public function getPaginateArticleByLabel($label_id, array $columns, int $limit = 12)
    {
        try {
            $articles = Article::query()->with('categories:id,name')->select($columns)
                ->whereHas('labels', function ($query) use ($label_id) {
                    $query->where('labels.id', '=', $label_id);
                })
                ->where('status', '0')
                ->orderBy('is_top', 'desc')->orderBy('likes', 'desc')
                ->orderBy('comments', 'desc')
                ->orderBy('created_at', 'desc')->paginate($limit);
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
