<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/4
 * Time: 17:48
 */

namespace App\Services;

use App\Models\AdminMenu;
use App\Models\AdminRoleMenu;
use App\Models\AdminRoleUser;
use App\Models\AdminUserToken;

class MenusService
{

    /**
     * 根据用户获取对应的权限菜单
     * @param $token
     * @return AdminMenu[]|array|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function getNav($token)
    {
        $token_info = AdminUserToken::query()->where('token', $token)->first();
        $menus = [];
        if ($token) {
            if ($token_info->user_id === 1) {
                $menus = AdminMenu::where('status', '0')->where('type', '<>', '2')
                    ->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'sort', 'status')
                    ->orderBy('sort', 'asc')->get()->toArray();

            } else {
                $role_ids = [];
                $user_roles = AdminRoleUser::where('user_id', $token_info->user_id)
                    ->leftJoin('admin_roles', 'admin_roles.id', '=', 'admin_role_users.role_id')
                    ->where('admin_roles.status','0')
                    ->get();//获取用户角色

                if ($user_roles) {
                    foreach ($user_roles as $user_role) {
                        array_push($role_ids, $user_role->role_id);
                    }
                }
                if ($role_ids) {
                    $user_role_menus = AdminRoleMenu::whereIn('role_id',$role_ids)->pluck('menu_id')->toArray();//获取用户对应的权限
                    $menus = AdminMenu::whereIn('id', $user_role_menus)->where('status', '0')->where('type', '<>', '2')
                        ->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'sort', 'status')
                        ->orderBy('sort', 'asc')->get()->toArray();
                }
            }
        }
        $menus = list_to_tree($menus);
        $menus = array_values($menus);
        return $menus;
    }

    /**
     * 检查操作是否有权限
     * @param $token 用户token
     * @param $route 访问路由
     * @return bool
     */
    public function checkAuth($token, $route)
    {
        $token_info = AdminUserToken::query()->where('token', $token)->first();
        $perms = [];//权限数组
        if ($token) {
            if ($token_info->user_id === 1) {
                $perms = AdminMenu::where('status', '0')->pluck('perms')->toArray();
            } else {
                $user_roles = AdminRoleUser::where('user_id', $token_info->user_id)
                    ->leftJoin('admin_roles', 'admin_roles.id', '=', 'admin_role_users.role_id')
                    ->where('admin_roles.status','0')
                    ->get();//获取用户角色

                if ($user_roles) {
                    foreach ($user_roles as $user_role) {
                        $user_role_menus = AdminRoleMenu::where('role_id', $user_role->role_id)->pluck('menu_id')->toArray();//获取用户对应的权限
                        $data = AdminMenu::whereIn('id', $user_role_menus)->where('status', '0')->whereNotNull('perms')->pluck('perms')->toArray();
                        array_push($perms, $data);
                    }
                    $perms = reduce($perms);
                    $perms = array_filter($perms);//去除空值
                    $perms = array_unique($perms);//去除重复的记录
                }
            }

            if (in_array($route, $perms)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
