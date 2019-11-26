<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
