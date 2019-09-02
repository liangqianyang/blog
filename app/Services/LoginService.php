<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/2
 * Time: 13:47
 */

namespace App\Services;

use App\Models\AdminUser;
use App\Models\AdminUserToken;

class LoginService
{

    /**
     * 管理员登陆
     * @param $name
     * @param $password
     * @return bool
     */
    public function doLogin($name, $password)
    {
        $password = md5(md5($password) . env('AUTH_KEY'));
        $user = AdminUser::where('name', $name)->where('password', $password)->first();
        if ($user) {
            $token = $this->updateToken($user);
            return $token;
        } else {
            return false;
        }
    }

    /**
     * 登录时创建token
     * @param AdminUser $user
     * @return bool|string
     */
    public function updateToken(AdminUser $user)
    {
        $user_id = $user->id;
        $expire_time = time() + 7200;
        $token = md5($user_id . time() . $expire_time);
        $data = [
            'user_id' => $user_id,
            'token' => $token,
            'expire_time' => $expire_time,
            'updated_at' => now()
        ];
        $result = AdminUserToken::updateOrCreate(['user_id' => $user_id], $data);
        if ($result) {
            return $token;
        } else {
            return false;
        }
    }
}
