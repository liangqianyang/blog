<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SysLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'username','ip','description','status','params'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * 关联管理员员
     */
    public function adminUser()
    {
        return $this->belongsTo(AdminUser::class,'user_id');
    }

}
