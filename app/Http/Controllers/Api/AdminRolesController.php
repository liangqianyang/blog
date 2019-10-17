<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminRole;
use App\Models\AdminRoleMenu;
use App\Services\AdminUsersService;
use App\Services\UserRolesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class AdminRolesController extends Controller
{
    /**
     * 角色列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $sort = $request->input('sort');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;
        $where = [];//查询条件
        if ($name) {
            $where[] = ['name', 'like', "%" . $name . "%"];
        }
        if ($status != '') {
            $where[] = ['status', '=', $status];
        }

        if ($sort) {
            $sort = explode(" ", $sort);
        } else {
            $sort = ['id', 'asc'];
        }
        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        if ($user->user->id === 1) {
            $roles = AdminRole::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
            $total = AdminRole::query()->where($where)->count();
        } else {
            $roles = AdminRole::query()->where($where)->where('admin_roles.create_user_id', $user->user->id)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
            $total = AdminRole::query()->where($where)->where('admin_roles.create_user_id', $user->user->id)->count();
        }
        return $this->response->array(['code' => 0, 'data' => $roles, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 获取可用的角色
     * @return mixed
     */
    public function getEnableRoles()
    {
        $roles = AdminRole::query()->where('status', '0')->get();
        return $this->response->array(['code' => 0, 'data' => $roles, 'message' => 'success']);
    }


    /**
     * 获取角色信息
     * @param Request $request
     * @param UserRolesService $userRolesService
     * @return mixed
     */
    public function getRoleInfo(Request $request, UserRolesService $userRolesService)
    {
        $id = $request->input('id');
        $role = AdminRole::query()->where('id', $id)->first();
        $menu_ids = $userRolesService->getMenusByRoleId($id);
        $role['menu_ids'] = $menu_ids;
        return $this->response->array(['code' => 0, 'data' => $role, 'message' => 'success']);
    }

    /**
     * 保存角色信息
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $messages = [
            'name.required' => '角色名称不能为空',
            'name.unique' => '角色名称已存在',
            'rule_ids.required' => '权限不能为空',
        ];

        $validator = Validator::make($params,[
            'name' => ['required', Rule::unique('admin_roles')],
            'rule_ids' => 'required',
            ],$messages
        );
        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }
        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        $params['create_user_id'] = $user->user->id;
        $flag = true;
        DB::beginTransaction();
        $role = AdminRole::create($params);
        if ($role) {
            if (isset($params['rule_ids'])) {
                foreach ($params['rule_ids'] as $menu) {
                    $result = $role->menus()->create(['menu_id' => $menu]);
                    if (!$result) {
                        $flag = false;
                    }
                }
            }
        } else {
            $flag = false;
        }
        if ($flag) {
            DB::commit();
            writeLog($request, '新增角色', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新角色信息
     * @param Request $request
     * @param AdminRole $adminRole
     * @return mixed
     */
    public function update(Request $request, AdminRole $adminRole)
    {
        $params = $request->all();

        $messages = [
            'name.required' => '角色名称不能为空',
            'name.unique' => '角色名称已存在',
            'rule_ids.required' => '权限不能为空',
        ];

        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        $role_info = $adminRole->where('id', $params['id'])->first();
        $validator =  Validator::make($params, [
            'name' => ['required', Rule::unique('admin_roles')->ignore($role_info->id),],
            'rule_ids' => 'required',
        ],$messages);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        DB::beginTransaction();
        $params['create_user_id'] = $user->user->id;
        $flag = true;
        $data = [
            'id' => $params['id'],
            'name' => $params['name'],
            'remark' => $params['remark'],
            'status' => $params['status'],
        ];
        $result = $adminRole->where('id', $params['id'])->update($data);
        if ($result) {
            if (isset($params['rule_ids'])) {
                $role = $adminRole->where('id', $params['id'])->first();
                AdminRoleMenu::where('role_id', $params['id'])->delete();
                foreach ($params['rule_ids'] as $menu) {
                    $result = $role->menus()->create(['menu_id' => $menu]);
                    if (!$result) {
                        $flag = false;
                    }
                }
            }
        } else {
            $flag = false;
        }
        if ($flag) {
            DB::commit();
            writeLog($request, '更新角色', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除角色
     * @param Request $request
     * @param AdminRole $adminRole
     * @return mixed
     */
    public function destroy(Request $request, AdminRole $adminRole)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $adminRole->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除角色', $ids, '0');
                return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '删除成功']);
            } else {
                DB::rollBack();
                return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '删除失败']);
            }
        } else {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '缺失参数']);
        }

    }
}
