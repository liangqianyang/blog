<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;

class BannerController extends Controller
{
    /**
     * 轮播列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $title = $request->input('title');
        $sort = $request->input('sort');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;

        $where = [];//查询条件
        if ($title) {
            $where[] = ['title', 'like', "%" . $title . "%"];
        }

        if ($sort) {
            $sort = explode(" ", $sort);
        } else {
            $sort = ['sort', 'asc'];
        }

        $data = Banner::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Banner::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $data, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 上传图片
     * @param Request $request
     * @param ImageUploadHandler $uploader
     * @return mixed
     */
    public function upload(Request $request, ImageUploadHandler $uploader)
    {
        if ($request->file) {
            $result = $uploader->save($request->file, 'banner', mt_rand(0, 10));
            if ($result) {
                return $this->response->array(['code' => 0, 'file' => $result['path'], 'message' => 'success']);
            } else {
                return $this->response->array(['code' => 1002, 'message' => '图片上传失败']);
            }
        } else {
            return $this->response->array(['code' => 1001, 'message' => '请选择图片']);
        }
    }

    /**
     * 保存轮播
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('banners')]
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }
        $data = Banner::create($params);
        if ($data) {
            writeLog($request, '新增轮播', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新轮播
     * @param \Illuminate\Http\Request $request
     * @param Banner $banner
     * @return mixed
     */
    public function update(Request $request, Banner $banner)
    {
        $params = $request->all();
        $banner = $banner::find($params['id']);

        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('banners')->ignore($banner->id)]
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        $banner->title = $params['title'];
        $banner->url = $params['url'];
        $banner->image_url = $params['image_url'];
        $banner->sort = $params['sort'];

        $flag = $banner->save();

        if ($flag) {
            writeLog($request, '更新轮播', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除轮播
     * @param Request $request
     * @param Banner $banner
     * @return mixed
     */
    public function destroy(Request $request, Banner $banner)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $banner->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除轮播', $ids, '0');
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
