<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\Material;
use App\Services\AliOssService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    /**
     * 素材列表
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


        $data = Material::query()->where($where)->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Material::query()->where($where)->count();
        return $this->response->array(['code' => 0, 'data' => $data, 'total' => $total, 'message' => 'success']);
    }


    /**
     * 上传图片
     * @param Request $request
     * @return mixed
     */
    public function upload(Request $request)
    {
        $file = $_FILES['file'];
        if ($file) {
            $image_upload_handler = new ImageUploadHandler();
            $folder = "material";//目录名
            $result = $image_upload_handler->uploadToAli($file, $folder);
            if ($result['code'] === 0) {
                return $this->response->array($result);
            } else {
                return $this->response->array(['code' => 1002, 'message' => '图片上传失败']);
            }
        } else {
            return $this->response->array(['code' => 1001, 'message' => '请选择图片']);
        }
    }

    /**
     * 保存素材
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();

        $data = Material::create($params);
        if ($data) {
            writeLog($request, '新增素材', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新素材
     * @param \Illuminate\Http\Request $request
     * @param Material $material
     * @return mixed
     */
    public function update(Request $request, Material $material)
    {
        $params = $request->all();
        $material = $material::find($params['id']);
        $material->title = $params['title'];
        $flag = $material->save();
        if ($flag) {
            writeLog($request, '更新素材', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '更新成功']);
        } else {
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除素材
     * @param Request $request
     * @param Material $material
     * @return mixed
     */
    public function destroy(Request $request, Material $material)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            $objects = array();//要删除的对象
            foreach ($ids as $id) {
                $material = $material::find($id);
                if ($material) {
                    $url = $material->url;//获取访问链接
                    $info = explode("/", $url);
                    array_push($objects, $info[3] . '/' . $info[4]);
                }
            }

            $aliOssService = new AliOssService();
            $result = $aliOssService->destroy($objects);
            if ($result) {
                $result = $material->whereIn('id', $ids)->delete();
                if (!$result) {
                    $flag = false;
                }
            }
            if ($flag) {
                DB::commit();
                writeLog($request, '删除素材', $ids, '0');
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
