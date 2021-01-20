<?php

namespace App\Http\Controllers\Api;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class PageController extends Controller
{
    /**
     * 单页列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {

        $title = $request->input('title');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;

        $where = [];//查询条件
        if ($title) {
            $where[] = ['title', 'like', "%" . $title . "%"];
        }

        $sort = ['sort', 'asc'];
        $data = Page::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Page::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $data, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 创建单页
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();
        //标题不能重复
        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('pages')],
            'url' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $flag = Page::create($params);//保存单页

        if ($flag) {
            writeLog($request, '新增单页', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新单页
     * @param \Illuminate\Http\Request $request
     * @param Page $page
     * @return mixed
     */
    public function update(Request $request, Page $page)
    {
        $params = $request->only(['id', 'title', 'url', 'sort']);
        $info = $page::find($params['id']);//单页信息
        //单页标题不能重复
        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('pages')->ignore($info->id)],
            'url' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $data['id'] = $params['id'];
        $data['title'] = $params['title'];
        $data['url'] = $params['url'];
        $data['sort'] = $params['sort'];
        $flag = $page->where('id', $params['id'])->update($data);//更新单页
        if ($flag) {
            writeLog($request, '更新单页', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 删除单页
     * @param Request $request
     * @param Page $page
     * @return mixed
     */
    public function destroy(Request $request, Page $page)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $page->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }

            }
            if ($flag) {
                DB::commit();
                writeLog($request, '删除单页', $ids, '0');
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
