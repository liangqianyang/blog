<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * 分类列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $name = $request->input('name');
        $sort = $request->input('sort');

        $where = [];//查询条件
        if ($name) {
            $where[] = ['name', 'like', "%" . $name . "%"];
        }

        if ($sort) {
            $sort = explode(" ", $sort);
        } else {
            $sort = ['sort', 'asc'];
        }
        $category = Category::query()->where($where)->orderBy($sort[0], $sort[1])->get()->toArray();
        $total = Category::query()->where($where)->count();
        $category = list_to_tree($category);
        $category = array_values($category);
        return $this->response->array(['code' => 0, 'data' => $category, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 获取可用的分类
     * @param CategoryService $menusService
     * @return mixed
     */
    public function getEnableCategory()
    {
        $category = Category::query()->select('id', 'parent_id', 'name')->where('is_category', 1)->orderBy('level', 'asc')->get()->toArray();
        $category = list_to_tree($category);
        $category = array_values($category);
        return $this->response->array(['code' => 0, 'data' => $category, 'message' => 'success']);
    }

    /**
     * 保存分类
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $validator = Validator::make($params, [
            'name' => ['required', Rule::unique('categories')],
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $menu = Category::create($params);
        if ($menu) {
            writeLog($request, '新增分类', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新分类
     * @param \Illuminate\Http\Request $request
     * @param Category $category
     * @return mixed
     */
    public function update(Request $request, Category $category)
    {
        $params = $request->only([
            'id',
            'name',
            'url',
            'parent_id',
            'is_category',
            'sort',
        ]);
        $data = $category::find($params['id']);
        $data->name = $params['name'];
        $data->url = $params['url'];
        $data->parent_id = $params['parent_id'];
        $data->sort = $params['sort'];

        $validator = Validator::make($params, [
            'name' => ['required', Rule::unique('categories')->ignore($data->id)],
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $flag = $data->save();

        if ($flag) {
            writeLog($request, '更新分类', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除分类
     * @param Request $request
     * @param Category $category
     * @return mixed
     */
    public function destroy(Request $request, Category $category)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $category->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除分类', $ids, '0');
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
