<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id','username','content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * 关联文章
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function article(){
        return $this->belongsTo(Article::class,'article_id');
    }
}
