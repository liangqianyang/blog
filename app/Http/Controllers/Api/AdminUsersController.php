<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\AdminUserToken;

class AdminUsersController extends Controller
{
    public function getUserInfo(Request $request)
    {
        $token = $request->input('token');
        $admin_token = AdminUserToken::query()
            ->where('token', $token)
            ->find(1);

        $user_id = $admin_token->user_id;

        $admin_user = AdminUser::query()
            ->where('id', $user_id)
            ->find(1)->toArray();

        $admin_user['avatar']='https://ss1.bdstatic.com/70cFuXSh_Q1YnxGkpoWK1HF6hhy/it/u=1544401333,526076356&fm=26&gp=0.jpg';
        $admin_user['roles']='admin';
        return $this->response->array(['code' => 0, 'data' => $admin_user, 'message' => 'success']);
    }
}
