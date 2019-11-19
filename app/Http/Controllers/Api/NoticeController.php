<?php

namespace App\Http\Controllers\Api;

use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class NoticeController extends Controller
{
    /**
     * 公告列表
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

        $sort = ['id', 'asc'];
        $data = Notice::query()->where($where)
            ->orderBy('is_top', 'desc')->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Notice::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $data, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 创建公告
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();
        //标题不能重复
        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('articles')],
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $flag = Notice::create($params);//保存公告

        if ($flag) {
            writeLog($request, '新增公告', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新公告
     * @param \Illuminate\Http\Request $request
     * @param Notice $notice
     * @return mixed
     */
    public function update(Request $request, Notice $notice)
    {
        $params = $request->only(['id', 'title', 'content', 'is_top']);
        $info = $notice::find($params['id']);//公告信息
        //公告标题不能重复
        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('notices')->ignore($info->id)],
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $data['id'] = $params['id'];
        $data['title'] = $params['title'];
        $data['content'] = $params['content'];
        $flag = $notice->where('id', $params['id'])->update($data);//更新公告
        if ($flag) {
            writeLog($request, '更新公告', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 置顶公告
     * @param Request $request
     * @param Notice $notice
     * @return mixed
     */
    public function top(Request $request, Notice $notice)
    {
        $id = $request->input('id');
        DB::beginTransaction();
        $topNotice = $notice::where('is_top', 1)->first();//获取置顶的数据
        $flag = true;
        if ($topNotice) {
            $flag = $notice->where('id', $topNotice->id)->update(['is_top' => 0]);//取消置顶
        }

        if ($flag) {
            $flag = $notice->where('id', $id)->update(['is_top' => 1]);//新的置顶
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '置顶公告', $id, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '置顶成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '置顶失败']);
        }
    }

    /**
     * 删除公告
     * @param Request $request
     * @param Notice $notice
     * @return mixed
     */
    public function destroy(Request $request, Notice $notice)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $notice->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }

            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除公告', $ids, '0');
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
