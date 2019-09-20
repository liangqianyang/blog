<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRoleMenu extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'menu_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * 获取菜单所属角色
     */
    public function role()
    {
        return $this->belongsTo(AdminRole::class,'role_id');
    }
}
