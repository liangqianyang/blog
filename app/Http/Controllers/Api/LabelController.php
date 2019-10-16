<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LabelRequest;
use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class LabelController extends Controller
{
    /**
     * 标签列表
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
        $data = Label::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Label::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $data, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 获取所有的标签
     * @param CategoryService $menusService
     * @return mixed
     */
    public function getEnableLabel()
    {
        $data = Label::query()->select('id', 'title')->orderBy('id', 'asc')->get();
        return $this->response->array(['code' => 0, 'data' => $data, 'message' => 'success']);
    }

    /**
     * 保存标签
     * @param LabelRequest $request
     * @return mixed
     */
    public function store(LabelRequest $request)
    {
        $params = $request->all();
        $data = Label::create($params);
        if ($data) {
            writeLog($request, '新增标签', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新标签
     * @param LabelRequest $request
     * @param Label $label
     * @return mixed
     */
    public function update(LabelRequest $request, Label $label)
    {
        $params = $request->all();
        $label = $label::find($params['id']);

        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('labels')->ignore($label->id)]
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $label->title = $params['name'];

        $flag = $label->save();

        if ($flag) {
            writeLog($request, '更新标签', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除标签
     * @param Request $request
     * @param Label $label
     * @return mixed
     */
    public function destroy(Request $request, Label $label)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $label->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除标签', $ids, '0');
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
