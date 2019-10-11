<?php

namespace App\Http\Controllers\Api;

use App\Models\SysLog;
use Illuminate\Http\Request;

class SysLogController extends Controller
{
    /**
     * 日志列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $username = $request->input('username');
        $status = $request->input('status');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;
        $where = [];//查询条件
        if ($username) {
            $where[] = ['username', 'like', "%" . $username . "%"];
        }

        if ($status != '') {
            $where[] = ['status', '=', $status];
        }

        $sort = ['created_at', 'desc'];

        $list = SysLog::query()->with('adminUser:id,username')->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = SysLog::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $list, 'total' => $total, 'message' => 'success']);
    }

}
