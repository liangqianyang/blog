<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/4
 * Time: 14:10
 */

namespace App\Services;

use App\Models\AdminRole;

class UserRolesService
{
    /**
     * 获取角色对应的权限
     * @param $role_id
     * @return mixed
     */
    public function getMenusByRoleId($role_id)
    {
        $result = AdminRole::with('menus')->find($role_id)->menus->pluck('menu_id');
        return $result;
    }
}
