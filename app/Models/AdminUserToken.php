<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUserToken extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'token', 'expire_time', 'updated_at'
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
        $this->belongsTo(AdminUser::class);
    }
}
