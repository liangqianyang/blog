<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminMenu;
use Illuminate\Http\Request;
use App\Http\Requests\MenusRequest;
use Illuminate\Support\Facades\DB;
use App\Services\MenusService;

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
    public function list(Request $request, MenusService $menusService)
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

        $menus = AdminMenu::query()->select('id','parent_id','name','perms','url','type','icon','sort','status')->where($where)->orderBy($sort[0], $sort[1])
            ->get()->toArray();
        $menus =list_to_tree($menus);
        $menus = array_values($menus);
        $total = AdminMenu::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => array_values($menus), 'total' => $total, 'message' => 'success']);
    }

    /**
     * 获取可用的菜单
     * @param MenusService $menusService
     * @return mixed
     */
    public function getEnableMenus(MenusService $menusService)
    {
        $menus = AdminMenu::query()->select('id','parent_id','name','url','type','icon','sort','status')
            ->where('status','0')->where('type', '<>', '2')->orderBy('sort','asc')->get()->toArray();
        $menus = list_to_tree($menus);
        $menus = array_values($menus);
        return $this->response->array(['code' => 0, 'data' => $menus, 'message' => 'success']);
    }

    /**
     * 保存菜单
     * @param MenusRequest $request
     * @return mixed
     */
    public function store(MenusRequest $request)
    {
        $params = $request->all();
        $menu = AdminMenu::create($params);
        if ($menu) {
            writeLog($request, '新增菜单',$params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 0, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新菜单
     * @param MenusRequest $request
     * @param AdminMenu $adminMenu
     * @return mixed
     */
    public function update(MenusRequest $request, AdminMenu $adminMenu)
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

        $menu = $adminMenu->where('id', $params['id'])->update($params);

        if ($menu) {
            writeLog($request, '更新菜单',$params,  '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 0, 'type' => 'error', 'message' => '更新失败']);
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
        DB::beginTransaction();
        $flag = true;
        foreach ($ids as $id) {
            $result = $adminMenu->where('id', $id)->update(['status' => '9']);
            if (!$result) {
                $flag = false;
            }
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '删除菜单',$ids,  '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '删除成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 001, 'type' => 'error', 'message' => '删除失败']);
        }
    }
}
