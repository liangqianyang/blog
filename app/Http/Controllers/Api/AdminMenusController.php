<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminMenu;
use Illuminate\Http\Request;
use App\Http\Requests\MenusRequest;
use Illuminate\Support\Facades\DB;

class AdminMenusController extends Controller
{

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

        $menus = AdminMenu::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = AdminMenu::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $menus, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 获取可用的菜单
     * @return mixed
     */
    public function getEnableMenus()
    {
        $menus = AdminMenu::query()->where('status', '0')->get();
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
            return $this->response->array(['code' => 0, 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 0, 'message' => '保存失败']);
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
            'name',
            'url',
            'type',
            'icon',
            'sort',
            'status',
        ]);

        $menu = $adminMenu->where('id', $params['id'])->update($params);

        if ($menu) {
            return $this->response->array(['code' => 0, 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 0, 'message' => '更新失败']);
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
            return $this->response->array(['code' => 0, 'data' => $ids, 'message' => '删除成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 001, 'data' => $ids, 'message' => '删除失败']);
        }
    }
}
