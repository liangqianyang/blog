<?php

namespace App\Http\Controllers\Api;

use App\Models\AdminRoleUser;
use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\AdminUserToken;
use App\Services\AdminUsersService;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Validation\Rule;
use App\Handlers\ImageUploadHandler;

class AdminUsersController extends Controller
{

    /**
     * 用户列表
     * @param Request $request
     * @return mixed
     */
    public function list(Request $request)
    {
        $name = $request->input('username');
        $status = $request->input('status');
        $sort = $request->input('sort');
        $page = $request->input('page') ?? 1;
        $limit = $request->input('limit') ?? 20;
        $where = [];//查询条件
        if ($name) {
            $where[] = ['username', 'like', "%" . $name . "%"];
        }
        if ($status != '') {
            $where[] = ['status', '=', $status];
        }

        if ($sort) {
            $sort = explode(" ", $sort);
        } else {
            $sort = ['id', 'asc'];
        }
        $token = $request->header('X-Token');//获取用户token
        $adminUsersService = new AdminUsersService($token);
        $data = $adminUsersService->getUserList($where, $sort, $page, $limit);
        $users = $data['users'];
        $total = $data['total'];
        return $this->response->array(['code' => 0, 'data' => $users, 'total' => $total, 'message' => 'success']);
    }

    /**
     * 上传图片
     * @param Request $request
     * @param ImageUploadHandler $uploader
     * @return mixed
     */
    public function uploadAvatar(Request $request, ImageUploadHandler $uploader)
    {
        if ($request->file) {
            $result = $uploader->save($request->file, 'avatars', mt_rand(0, 10));
            if ($result) {
                return $this->response->array(['code' => 0, 'path' => $result['path'], 'message' => 'success']);
            } else {
                return $this->response->array(['code' => 1002, 'message' => '图片上传失败']);
            }
        } else {
            return $this->response->array(['code' => 1001, 'message' => '请选择图片']);
        }
    }

    /**
     * 获取登陆的用户信息
     * @param Request $request
     * @return mixed
     */
    public function getUserInfo(Request $request)
    {
        $token = $request->header('X-Token');//获取用户token
        $admin_token = AdminUserToken::query()
            ->where('token', $token)
            ->first();

        if ($admin_token) {
            $expire = $admin_token->expire_time;//token的过期时间
            if ($expire > time()) {
                $adminUsersService = new AdminUsersService($token);
                $user_id = $admin_token->user_id;
                $admin_user_role_info = $adminUsersService->getUserRoleInfo($user_id);//获取用户的基础信息
                return $this->response->array(['code' => 0, 'data' => $admin_user_role_info, 'message' => 'success']);
            } else {
                return $this->response->array(['code' => 50014, 'message' => 'token已过期请重新登陆']);
            }

        } else {
            return $this->response->array(['code' => 50008, 'message' => '无效的token']);
        }
    }

    /**
     * 保存管理员信息
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $params = $request->all();
        $token = $request->header('X-Token');//获取用户token
        $userInfo = new AdminUsersService($token);//登陆的管理员信息
        $validator =  Validator::make($params,[
            'username' => 'required|unique:admin_users',
            'phone' =>'required|unique:admin_users' ,
            'email' => 'required|unique:admin_users',
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        DB::beginTransaction();
        $params['password'] = md5(md5($params['password']) . env('AUTH_KEY'));
        $params['create_user_id'] = $userInfo->user->id;
        $flag = true;
        $user = AdminUser::create($params);
        if ($user) {
            if (isset($params['role_ids'])) {
                foreach ($params['role_ids'] as $role) {
                    $result = AdminRoleUser::create(['user_id'=>$user->id,'role_id' => $role]);
                    if (!$result) {
                        $flag = false;
                    }
                }
            }
        } else {
            $flag = false;
        }

        if ($flag) {
            DB::commit();
            writeLog($request, '新增管理员', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'message' => '保存成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '保存失败']);
        }
    }

    /**
     * 更新管理员信息
     * @param Request $request
     * @param AdminUser $adminUser
     * @return mixed
     */
    public function update(Request $request, AdminUser $adminUser)
    {
        $params = $request->all();
        $userInfo=$adminUser->where('id', $params['id'])->first();
        $validator =  Validator::make($params,[
            'username' => ['required',Rule::unique('admin_users')->ignore($userInfo->id)],
            'phone' =>['required',Rule::unique('admin_users')->ignore($userInfo->id)] ,
            'email' => ['required',Rule::unique('admin_users')->ignore($userInfo->id)],
        ]);

        if ($validator->fails()) {
            return $this->response->array(['code' => 1001, 'type' => 'error', 'message' => $validator->errors()]);
        }

        DB::beginTransaction();
        $flag = true;
        $data = [
            'id' => $params['id'],
            'username' => $params['username'],
            'real_name' => $params['real_name'],
            'avatar' => $params['avatar'],
            'email' => $params['email'],
            'phone' => $params['phone'],
            'status' => $params['status'],
        ];

        $result = $adminUser->where('id', $params['id'])->update($data);

        if ($result) {
            if (isset($params['role_ids'])) {
                AdminRoleUser::where('user_id', $params['id'])->delete();
                foreach ($params['role_ids'] as $role) {
                    $result = AdminRoleUser::create(['user_id'=> $params['id'],'role_id' => $role]);
                    if (!$result) {
                        $flag = false;
                    }
                }
            }
        } else {
            $flag = false;
        }


        if ($flag) {
            DB::commit();
            writeLog($request, '更新管理员信息', $params, '0');
            return $this->response->array(['code' => 0, 'type' => 'success', 'data' => $result, 'message' => '更新成功']);
        } else {
            DB::rollBack();
            return $this->response->array(['code' => 1002, 'type' => 'error', 'message' => '更新失败']);
        }
    }

    /**
     * 删除管理员信息
     * @param Request $request
     * @param AdminUser $adminUser
     * @return mixed
     */
    public function destroy(Request $request, AdminUser $adminUser)
    {
        $ids = $request->input('ids');
        $flag = true;
        if (isset($ids)) {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $result = $adminUser->where('id', $id)->update(['status' => '9']);
                if (!$result) {
                    $flag = false;
                    break;
                }
            }

            if ($flag) {
                DB::commit();
                writeLog($request, '删除管理员', $ids, '0');
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
