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
        'cid','title','content', 'is_admin','admin_name', 'publish_date', 'cover','status','user_id','clicks','likes'
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
        return $this->hasMany(Category::class, 'id', 'cid');
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
}
