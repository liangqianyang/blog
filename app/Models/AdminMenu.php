<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    const STATUS_CATALOG = 0;
    const STATUS_MENU = 1;
    const STATUS_BUTTON = 2;

    public static $typesMap = [
        self::STATUS_CATALOG => '目录',
        self::STATUS_MENU => '菜单',
        self::STATUS_BUTTON => '按钮',
    ];

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'name', 'url','type','icon','sort','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
