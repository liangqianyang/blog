<?php


namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::query()->with('replies')->paginate(10);
        return view('message.index', ['messages' => $messages]);
    }

    /**
     * 生成验证码
     */
    public function captcha()
    {
        return captcha('MESSAGE_CAPTCHA_IMG');
    }

    /**
     * 留言
     * @param Request $request
     * @return array
     */
    public function message(Request $request)
    {
        $username = $request->post('username');
        $avatar = $request->post('avatar');
        $captcha = $request->post('captcha');
        if ($captcha == session()->get('MESSAGE_CAPTCHA_IMG')) {
            $content = $request->post('content');
            $data['username'] = $username;
            $data['avatar'] = env("APP_URL") . $avatar;
            $data['content'] = $content;
            Message::create($data);
            return ['code' => 0, 'message' => '留言成功'];
        } else {
            return ['code' => 1001, 'message' => '验证码不对!'];
        }
    }
}
