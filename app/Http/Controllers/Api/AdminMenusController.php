<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminMenu;
use App\Models\AdminRoleMenu;
use App\Models\AdminRoleUser;
use App\Services\AdminUsersService;
use App\Services\MenusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class AdminMenusController extends Controller
{
    /**
     * 获取用户对应的导航菜单
     * @param Request $request
     * @param MenusService $menusService
     * @return mixed
     */
    public function getNav(Request $request, MenusService $menusService)
    {
        $token = $request->header('X-Token');//获取用户token
        $menus = $menusService->getNav($token);
        return $this->response->array(['code' => 0, 'data' => $menus, 'message' => 'success']);
    }

    /**
     * 菜单列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $sort = $request->input('sort');
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
            $sort = ['sort', 'asc'];
        }

        $menus = AdminMenu::query()->select('id', 'parent_id', 'name', 'perms', 'url', 'type', 'icon', 'sort', 'status')->where($where)->orderBy($sort[0], $sort[1])
            ->get()->toArray();
        $menus = list_to_tree($menus);
        $total = AdminMenu::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => array_values($menus), 'total' => $total, 'message' => 'success']);
    }

    /**
     * 获取权限选择时使用的菜单
     * @return mixed
     */
    public function getEnableMenus(Request $request)
    {
        $token = $request->header('X-Token');//获取用户token
        $userInfo = new AdminUsersService($token);//登陆的管理员信息
        $create_user_id = $userInfo->user->id;
        $menus = [];
        if ($create_user_id === 1) {
            $menus = AdminMenu::query()->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'sort', 'status')
                ->where('status', '0')->orderBy('sort', 'asc')->get()->toArray();
        } else {
            $role_ids = AdminRoleUser::where('user_id', $create_user_id)->pluck('role_id');
            if ($role_ids) {
                $menu_ids = AdminRoleMenu::whereIn('role_id', $role_ids)->pluck('menu_id');
                $menus = AdminMenu::query()->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'sort', 'status')
                    ->where('status', '0')->whereIn('id', $menu_ids)
                    ->orderBy('sort', 'asc')->get()->toArray();
            }
        }
        if ($menus) {
            $menus = list_to_tree($menus);
            $menus = array_values($menus);
        }
        return $this->response->array(['code' => 0, 'data' => $menus, 'message' => 'success']);
    }

    /**
     * 获取添加菜单时使用的菜单列表
     * @return mixed
     */
    public function getAuthMenus()
    {
        $menus = AdminMenu::query()->select('id', 'parent_id', 'name', 'url', 'type', 'icon', 'sort', 'status')
            ->where('status', '0')->where('type', '<>', '2')->orderBy('sort', 'asc')->get()->toArray();
        $menus = list_to_tree($menus);
        $menus = array_values($menus);
        return $this->response->array(['code' => 0, 'data' => $menus, 'message' => 'success']);
    }

    /**
     * 保存菜单
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $parent_id = $params['parent_id'];
        if ($parent_id == 0 && $params['type'] == 0) {
            $params['url'] = '#';
        }

        $messages = [
            'name.required' => '菜单名称不能为空',
            'name.unique' => '菜单名称已存在',
            'type.required' => '菜单类型不能为空',
        ];

        $validator = Validator::make($params, [
            'name' => ['required', Rule::unique('admin_menus')],
            'type' => 'required',
        ], $messages
        );

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $menu = AdminMenu::create($params);
        if ($menu) {
            writeLog($request, '新增菜单', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新菜单
     * @param \Illuminate\Http\Request $request
     * @param AdminMenu $adminMenu
     * @return mixed
     */
    public function update(Request $request, AdminMenu $adminMenu)
    {
        $params = $request->only([
            'id',
            'parent_id',
            'perms',
            'name',
            'url',
            'type',
            'icon',
            'sort',
            'status',
        ]);

        $messages = [
            'name.required' => '菜单名称不能为空',
            'name.unique' => '菜单名称已存在',
            'type.required' => '菜单类型不能为空',
        ];

        $menuInfo = $adminMenu->where('id', $params['id'])->first();


        $validator = Validator::make($params, [
            'name' => ['required', Rule::unique('admin_menus')->ignore($menuInfo->id)],
            'type' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $menu = $adminMenu->where('id', $params['id'])->update($params);

        if ($menu) {
            writeLog($request, '更新菜单', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除菜单
     * @param Request $request
     * @param AdminMenu $adminMenu
     * @return mixed
     */
    public function destroy(Request $request, AdminMenu $adminMenu)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $adminMenu->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除菜单', $ids, '0');
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
