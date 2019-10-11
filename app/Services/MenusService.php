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
     * 生成树形数据
     * @param $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int $root
     * @return array
     */
    function listToTree($list, $pk = 'id', $pid = 'parent_id', $child = 'children', $root = 0)
    {
        $tree = array();
        if (is_array($list)) {
            $refer = array();
            foreach ($list as $key => $data) {
                $refer[$data[$pk]] = &$list[$key];
            }

            foreach ($list as $key => $data) {
                // 判断是否存在parent
                $parentId = $data[$pid];

                if ($root == $parentId) {
                    $tree[$data[$pk]] = &$list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent = &$refer[$parentId];
                        $parent[$child][$data[$pk]] = &$list[$key];
                        $parent[$child] = array_values($parent[$child]);
                    }
                }
            }
        }

        return $tree;
    }


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
                $user_role = AdminRoleUser::where('user_id', $token_info->user_id)->first();//获取用户角色
                if ($user_role) {
                    $user_role_menus = AdminRoleMenu::where('role_id', $user_role->role_id)->pluck('menu_id')->toArray();//获取用户对应的权限
                    sort($user_role_menus);
                    $user_role_menus = array_unique($user_role_menus);
                    $menus = AdminMenu::whereIn('id', $user_role_menus)->where('status', '0')->where('type', '<>', '2')
                        ->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'sort', 'status')
                        ->orderBy('sort', 'asc')->get()->toArray();
                }
            }
        }
        $menus = $this->listToTree($menus);
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
        $auths = [];
        if ($token) {
            if ($token_info->user_id === 1) {
                $perms = AdminMenu::where('status', '0')->pluck('perms')->toArray();
            } else {
                $user_role = AdminRoleUser::where('user_id', $token_info->user_id)->first();//获取用户角色
                if ($user_role) {
                    $user_role_menus = AdminRoleMenu::where('role_id', $user_role->role_id)->pluck('menu_id')->toArray();//获取用户对应的权限
                    $user_role_menus = array_unique($user_role_menus);
                    $perms = AdminMenu::whereIn('id', $user_role_menus)->where('status', '0')->pluck('perms')->toArray();
                }
            }
            if ($perms) {
                foreach ($perms as $perm) {
                    $auth = explode(',', $perm);
                    array_push($auths, $auth);
                }
            }

            $auths = reduce($auths);

            $auths = array_values((array_unique($auths)));

            if (in_array($route, $auths)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
