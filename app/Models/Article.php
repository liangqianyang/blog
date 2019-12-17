<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cid','title','summary','content', 'is_admin','admin_name', 'publish_date', 'cover','status','user_id',
        'clicks','likes','seo_title','seo_keywords','seo_description','comments','is_top'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * 关联分类
     */
    public function categories()
    {
        return $this->belongsTo(Category::class, 'cid', 'id');
    }

    /**
     * 关联标签
     */
    public function labels()
    {
        return $this->hasManyThrough(
            Label::class,
            ArticleLabel::class,
            'a_id',
            'id',
            'id',
            'label_id'
        );
    }

    /**
     * 关联评论
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comments::class, 'id', 'article_id');
    }

    public function toESArray()
    {
        // 只取出需要的字段
        $arr = Arr::only($this->toArray(), [
            'id',
            'c_id',
            'categories',
            'labels',
            'title',
            'summary',
            'content',
            'status',
            'clicks',
            'likes',
            'comments',
            'is_top',
            'publish_date',
        ]);
        // strip_tags 函数可以将 html 标签去除
        $arr['content'] = strip_tags($this->content);
        return $arr;
    }
}
