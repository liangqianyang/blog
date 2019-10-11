<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RolesRequest;
use App\Models\AdminRole;
use App\Models\AdminRoleMenu;
use Illuminate\Http\Request;
use App\Services\UserRolesService;
use Illuminate\Support\Facades\DB;
use App\Services\AdminUsersService;
use Validator;
use Illuminate\Validation\Rule;

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

        $roles = AdminRole::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = AdminRole::query()->where($where)->count();
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
     * @param RolesRequest $request
     * @return mixed
     */
    public function store(RolesRequest $request)
    {
        DB::beginTransaction();
        $params = $request->all();
        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        $params['create_user_id'] = $user->user->id;
        $flag = true;
        $role = AdminRole::create($params);
        if ($role) {
            foreach ($params['rule_ids'] as $menu) {
                $result = $role->menus()->create(['menu_id' => $menu]);
                if (!$result) {
                    $flag = false;
                }
            }
        } else {
            $flag = false;
        }
        if ($flag) {
            DB::commit();
            writeLog($request, '新增角色',$params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 0, 'type' => 'error', 'message' => '保存失败']);
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
        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        Validator::make($params, [
            'name' => [
                'required',
                Rule::unique('admin_roles')->ignore($user->user->id),
            ],
        ]);
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
            $role = $adminRole->where('id', $params['id'])->first();
            AdminRoleMenu::where('role_id', $params['id'])->delete();
            foreach ($params['rule_ids'] as $menu) {
                $result = $role->menus()->create(['menu_id' => $menu]);
                if (!$result) {
                    $flag = false;
                }
            }
        } else {
            $flag = false;
        }
        if ($flag) {
            DB::commit();
            writeLog($request, '更新角色',$params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 0, 'type' => 'error', 'message' => '更新失败']);
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
        DB::beginTransaction();
        $flag = true;
        foreach ($ids as $id) {
            $result = $adminRole->where('id', $id)->update(['status' => '9']);
            if (!$result) {
                $flag = false;
            }
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '删除角色',$ids, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '删除成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 001,'type' => 'error', 'message' => '删除失败']);
        }
    }
}
