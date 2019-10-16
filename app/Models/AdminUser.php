<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    const STATUS_ENABLE = 0;
    const STATUS_DISABLE = 9;

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
        'username','real_name','avatar', 'email', 'password', 'phone','status','create_user_id'
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
        return $this->hasOne(AdminUserToken::class, 'user_id');
    }

    /**
     * 关联角色
     */
    public function roles()
    {
        return $this->hasMany(AdminRoleUser::class, 'user_id', 'id');
    }

    /**
     * 关联系统日志表
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function sysLog()
    {
        return $this->hasOne(SysLog::class, 'user_id');
    }
}
