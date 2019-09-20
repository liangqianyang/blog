<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRoleUser extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * 关联管理员
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function adminUser(){
        return $this->belongsTo(AdminUser::class,'user_id');
    }
}
