<?php

namespace App\Http\Controllers\Api;

use App\Handlers\ImageUploadHandler;
use App\Models\Article;
use App\Models\ArticleLabel;
use App\Models\Category;
use App\Services\AdminUsersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Validator;
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;

class ArticleController extends Controller
{
    private $accessKey = 'jmFE3U-mtGWnifX2aQe9HetzGoPmCx0chGf53NWQ';
    private $secretKey = 'PoqapdTWiBoaUo-yj2GrXwBOt4JsXg40mdyOiGLa';

    /**
     * 文章列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {

        $title = $request->input('title');
        $cid = $request->input('cid');//文章分类
        $label = $request->input('label');//文章标签
        $status = $request->input('status');//文章状态
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;

        $where = [];//查询条件
        if ($title) {
            $where[] = ['title', 'like', "%" . $title . "%"];
        }

        if ($cid) {
            $where[] = ['cid', '=', $cid];
        }


        if ($status != '') {
            $where[] = ['status', '=', $status];
        }

        $sort = ['id', 'asc'];
        $data = Article::query()->with('categories:id,name')->with('labels:labels.id as lid,title')
            ->whereHas('labels', function ($query) use ($label) {
                if ($label) {
                    $query->where('labels.id', '=', $label);
                }
            })
            ->where($where)->orderBy('is_top', 'desc')->orderBy('likes', 'desc')
            ->orderBy('comments', 'desc')->orderBy($sort[0], $sort[1])->forPage($page, $limit)->get();
        $total = Article::query()->where($where)->count();
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
            $result = $uploader->save($request->file, 'article', mt_rand(0, 10), true);
            if ($result) {
                $file = image_to_base64($result['path']);
                return $this->response->array(['code' => 0, 'file' => $file, 'message' => 'success']);
            } else {
                return $this->response->array(['code' => 1002, 'message' => '图片上传失败']);
            }
        } else if ($request->cover) {
            $result = $uploader->save($request->cover, 'article', mt_rand(0, 10));
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
     * 创建文章
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        //文章标题不能重复
        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('articles')],
            'content' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }
        if ($params['is_admin']) {
            $params['user_id'] = $user->user->id;//创建者ID
            $params['admin_name'] = $user->user->username;//管理员名称
        }
        if (empty($params['publish_date'])) {
            $params['publish_date'] = date('Y-m-d H:i:s', time());
        }
        DB::beginTransaction();

        $flag = true;
        $article = Article::create($params);//保存文章

        if ($article) {
            if (isset($params['label_ids'])) {
                foreach ($params['label_ids'] as $label) {
                    $result = ArticleLabel::create(['a_id' => $article->id, 'label_id' => $label]);
                    if (!$result) {
                        $flag = false;
                        break;
                    }
                }
            }
        } else {
            $flag = false;
        }

        if ($flag) {
            DB::commit();
            unset($params['content']);
            writeLog($request, '新增文章', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }

    }

    /**
     * 更新文章
     * @param Request $request
     * @param Article $article
     * @param ArticleLabel $articleLabel
     * @return mixed
     * @throws \Exception
     */
    public function update(Request $request, Article $article, ArticleLabel $articleLabel)
    {
        $params = $request->only(['id', 'cid', 'title', 'summary', 'content', 'is_admin',
            'publish_date', 'cover', 'status', 'label_ids', 'seo_title', 'seo_keywords', 'seo_description',
            'likes', 'comments']);
        $token = $request->header('X-Token');//获取用户token
        $user = new AdminUsersService($token);
        $info = $article::find($params['id']);//文章信息
        //文章标题不能重复
        $validator = Validator::make($params, [
            'title' => ['required', Rule::unique('articles')->ignore($info->id)],
            'content' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        DB::beginTransaction();

        $data['id'] = $params['id'];
        $data['cid'] = $params['cid'];
        $data['title'] = $params['title'];
        $data['summary'] = $params['summary'];
        $data['content'] = $params['content'];
        $data['is_admin'] = $params['is_admin'];
        $data['publish_date'] = $params['publish_date'];
        $data['cover'] = $params['cover'];
        $data['status'] = $params['status'];
        $data['seo_title'] = $params['seo_title'];
        $data['seo_keywords'] = $params['seo_keywords'];
        $data['seo_description'] = $params['seo_description'];
        $data['likes'] = $params['likes'];
        $data['comments'] = $params['comments'];

        if ($params['is_admin']) {
            $data['user_id'] = $user->user->id;//创建者ID
            $data['admin_name'] = $user->user->username;//管理员名称
        }

        $flag = $article->where('id', $params['id'])->update($data);//更新文章

        if ($flag) {
            if (isset($params['label_ids'])) {
                $articleLabel::where('a_id', $params['id'])->delete();
                foreach ($params['label_ids'] as $label) {
                    $result = ArticleLabel::create(['a_id' => $params['id'], 'label_id' => $label]);
                    if (!$result) {
                        $flag = false;
                        break;
                    }
                }
            }
        } else {
            $flag = false;
        }

        if ($flag) {
            DB::commit();
            unset($params['content']);
            writeLog($request, '更新文章', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }


    /**
     * 置顶文章
     * @param Request $request
     * @param Article $articleModel
     * @return mixed
     * @throws \Exception
     */
    public function top(Request $request, Article $articleModel)
    {
        $id = $request->input('id');
        DB::beginTransaction();
        $topArticle = $articleModel::where('is_top', 1)->first();//获取置顶的数据
        $flag = true;
        if ($topArticle) {
            $flag = $articleModel->where('id', $topArticle->id)->update(['is_top' => 0]);//取消置顶
        }

        if ($flag) {
            $flag = $articleModel->where('id', $id)->update(['is_top' => 1]);//新的置顶
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '置顶文章', $id, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '置顶成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '置顶失败']);
        }
    }


    /**
     * 上架文章
     * @param Request $request
     * @param Article $articleModel
     * @return mixed
     * @throws \Exception
     */
    public function up(Request $request, Article $articleModel)
    {
        $ids = $request->input('ids');
        DB::beginTransaction();
        $flag = true;
        if (isset($ids)) {
            foreach ($ids as $id) {
                $result = $articleModel->where('id', $id)->update(['status' => '0']);
                if (!$result) {
                    $flag = false;
                    break;
                }
            }
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '上架文章', $ids, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '上架成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '上架失败']);
        }
    }


    /**
     * 下架文章
     * @param Request $request
     * @param Article $articleModel
     * @return mixed
     */
    public function down(Request $request, Article $articleModel)
    {
        $ids = $request->input('ids');
        DB::beginTransaction();
        $flag = true;
        if (isset($ids)) {
            foreach ($ids as $id) {
                $result = $articleModel->where('id', $id)->update(['status' => '9']);
                if (!$result) {
                    $flag = false;
                    break;
                }
            }
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '下架文章', $ids, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '下架成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => '下架失败']);
        }
    }

    /**
     * 删除文章
     * @param Request $request
     * @param Article $articleModel
     * @return mixed
     */
    public function destroy(Request $request, Article $articleModel)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $articleModel->where('id', $id)->delete();
                if (!$result) {
                    $flag = false;
                    break;
                }

            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除文章', $ids, '0');
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
