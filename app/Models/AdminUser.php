<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    const STATUS_ENABLE = 1;
    const STATUS_DISABLE = 0;

    public static $statusMap = [
        self::STATUS_ENABLE => '正常',
        self::STATUS_DISABLE => '禁用',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * 关联管理员登陆token
     */
    public function adminUserToken()
    {
        $this->hasOne(AdminUserToken::class);
    }
}
