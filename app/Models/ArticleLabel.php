<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleLabel extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'a_id', 'label_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * 获取标签所属的文章
     */
    public function role()
    {
        return $this->belongsTo(Article::class,'a_id');
    }
}
