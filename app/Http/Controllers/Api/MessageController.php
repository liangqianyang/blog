<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use App\Models\Message;
use App\Models\MessageReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class MessageController extends Controller
{
    /**
     * 留言列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $username = $request->input('username');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;
        $where = [];//查询条件
        if ($username) {
            $where[] = ['username', 'like', "%" . $username . "%"];
        }

        $sort = ['created_at', 'asc'];
        $data = Message::query()->with('replies')->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Message::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $data, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 回复留言
     * @param Request $request
     * @return mixed
     */
    public function reply(Request $request)
    {
        $params = $request->only(['id', 'reply']);
        //文章标题不能重复
        $validator = Validator::make($params, [
            'id' => 'required',
            'reply' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }
        $result = MessageReply::create(['message_id' => $params['id'], 'content' => $params['reply']]);
        if ($result) {
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '回复成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '回复失败']);
        }
    }

    /**
     * 删除留言
     * @param Request $request
     * @param Message $messageModel
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Request $request, Message $messageModel)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $messageModel->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }

            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除留言', $ids, '0');
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
