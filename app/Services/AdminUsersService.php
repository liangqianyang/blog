<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/5
 * Time: 16:46
 */

namespace App\Services;


use App\Models\AdminUser;
use App\Models\AdminUserToken;
use Illuminate\Support\Facades\DB;

class AdminUsersService
{

    public $user;

    public function __construct($token)
    {
        $this->user = $this->getUserByToken($token);
    }

    /**
     * 根据用户token获取用户信息
     * @param $token
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getUserByToken($token)
    {
        $user = null;

        $token_info = AdminUserToken::query()->where('token', $token)->first();

        if ($token) {
            $user = AdminUser::query()->where('id', $token_info->user_id)->first();
        }
        return $user;
    }

    /**
     * 获取用户信息
     * @param $user_id
     * @return array
     */
    public function getUserRoleInfo($user_id)
    {
        $admin_user = AdminUser::query()->where('id', $user_id)->first()->toArray();
        if ($admin_user) {
            if ($user_id == 1) {
                $role_info = DB::table('admin_roles')->leftJoin('admin_role_users', 'admin_roles.id', '=', 'admin_role_users.role_id')
                    ->where('admin_role_users.user_id', $admin_user['id'])->where('admin_roles.status', '0')
                    ->select('admin_roles.id as role_id', 'admin_roles.name as role_name')->first();
                if (empty($role_info->role_name)) {
                    $admin_user['roles'] = 'admin';
                } else {
                    $admin_user['roles'] = $role_info->role_name;
                }
            } else {
                $role_info = DB::table('admin_roles')->select('admin_roles.id as role_id', 'admin_roles.name as role_name')
                    ->leftJoin('admin_role_users', 'admin_roles.id', '=', 'admin_role_users.role_id')
                    ->where('admin_role_users.user_id', $user_id)->where('admin_roles.status', '0')->get();
                if ($role_info) {
                    $role_ids = [];
                    $role_names = [];
                    foreach ($role_info as $role) {
                        array_push($role_ids, $role->role_id);
                        array_push($role_names, $role->role_name);
                    }
                    $admin_user['roles'] = implode(',', $role_names);
                } else {
                    $admin_user['roles'] = '无';
                }
            }
            return $admin_user;
        }
        return $admin_user;
    }

    /**
     * 返回用户列表
     * @param $where
     * @param $sort
     * @param $page
     * @param $limit
     * @return array
     */
    public function getUserList($where, $sort, $page, $limit)
    {
        $data = [];
        if ($this->user->id === 1) {
            $users = AdminUser::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        } else {
            $users = AdminUser::query()->where($where)->where('admin_users.create_user_id', $this->user->id)
                ->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        }
        if ($users) {
            foreach ($users as $user) {
                $role_info = DB::table('admin_roles')->select('admin_roles.id as role_id', 'admin_roles.name as role_name')
                    ->leftJoin('admin_role_users', 'admin_roles.id', '=', 'admin_role_users.role_id')
                    ->where('admin_role_users.user_id', $user->id)->where('admin_roles.status', '0')->get();
                if ($role_info) {
                    $role_ids = [];
                    $role_names = [];
                    foreach ($role_info as $role) {
                        array_push($role_ids, $role->role_id);
                        array_push($role_names, $role->role_name);
                    }
                    $user['role_ids'] = $role_ids;
                    $user['role_names'] = $role_names;
                } else {
                    $user['role_ids'] = [];
                    $user['role_names'] = ['无'];
                }
            }
        }
        $total = AdminUser::query()->where($where)->where('admin_users.create_user_id', $this->user->id)->count();
        $data['users'] = $users;
        $data['total'] = $total;
        return $data;
    }
}
