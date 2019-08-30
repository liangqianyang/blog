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
}
