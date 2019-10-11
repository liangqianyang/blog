<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/7/17
 * Time: 9:51
 */

use App\Models\SysLog;

/**
 * 将当前请求的路由名称转换为CSS类名称
 * @return mixed
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

/**
 * 把多维数组转为一维数组
 * @param $array
 * @return array
 */
function reduce($array)
{
    $return = [];
    array_walk_recursive($array, function ($x, $index) use (&$return) {
        $return[] = $x;
    });
    return $return;
}

/**
 * 默认的精度为小数点后两位
 * @param $number
 * @param int $scale
 * @return \Moontoast\Math\BigNumber
 */
function big_number($number, $scale = 2)
{
    return new \Moontoast\Math\BigNumber($number, $scale);
}

/**
 * 字符串截取，支持中文和其他编码
 * @param $str
 * @param int $start
 * @param $length
 * @param string $charset
 * @param bool $suffix
 * @return bool|string
 */
function my_sub_str($str, $start = 0, $length, $charset = "utf-8", $suffix = true)
{
    if (function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif (function_exists('iconv_substr')) {
        $slice = iconv_substr($str, $start, $length, $charset);
        if (false === $slice) {
            $slice = '';
        }
    } else {
        $re['utf-8'] = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk'] = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5'] = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("", array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice . '...' : $slice;
}

/**
 * 循环删除目录和文件
 * @param string $dir_name
 * @return bool
 */
function delete_dir_file($dir_name)
{
    $result = false;
    if (is_dir($dir_name)) {
        if ($handle = opendir($dir_name)) {
            while (false !== ($item = readdir($handle))) {
                if ($item != '.' && $item != '..') {
                    if (is_dir($dir_name . DS . $item)) {
                        delete_dir_file($dir_name . DS . $item);
                    } else {
                        unlink($dir_name . DS . $item);
                    }
                }
            }
            closedir($handle);
            if (rmdir($dir_name)) {
                $result = true;
            }
        }
    }

    return $result;
}

/**时间格式化1
 * @param $time 时间戳
 * @return string
 */
function format_time($time)
{
    $now_time = time();
    $t = $now_time - $time;
    $mon = (int)($t / (86400 * 30));
    if ($mon >= 1) {
        return '一个月前';
    }
    $day = (int)($t / 86400);
    if ($day >= 1) {
        return $day . '天前';
    }
    $h = (int)($t / 3600);
    if ($h >= 1) {
        return $h . '小时前';
    }
    $min = (int)($t / 60);
    if ($min >= 1) {
        return $min . '分钟前';
    }
    return '刚刚';
}


/**
 * 时间格式化2
 * @param $time 时间戳
 * @return string
 */
function pinche_time($time)
{
    $today = strtotime(date('Y-m-d')); //今天零点
    $here = (int)(($time - $today) / 86400);
    if ($here == 1) {
        return '明天';
    }
    if ($here == 2) {
        return '后天';
    }
    if ($here >= 3 && $here < 7) {
        return $here . '天后';
    }
    if ($here >= 7 && $here < 30) {
        return '一周后';
    }
    if ($here >= 30 && $here < 365) {
        return '一个月后';
    }
    if ($here >= 365) {
        $r = (int)($here / 365) . '年后';
        return $r;
    }
    return '今天';
}

/**
 * 生成随机字符串
 * @param $len
 * @param null $chars
 * @return string
 */
function get_random_string($len, $chars = null)
{
    if (is_null($chars)) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    }
    mt_srand(10000000 * (double)microtime());
    for ($i = 0, $str = '', $lc = strlen($chars) - 1; $i < $len; $i++) {
        $str .= $chars[mt_rand(0, $lc)];
    }
    return $str;
}

/**
 * 生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
 * @param $length
 * @return string
 */
function random_str($length)
{
    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
    $arr = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

    $str = '';
    $arr_len = count($arr);
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $arr_len - 1);
        $str .= $arr[$rand];
    }
    return $str;
}

/**
 * 字符串加密（加密方法：DES-ECB）
 * @param string $str 待加密字符串
 * @param string $key 对称加密密钥
 * @return string
 */
function encryptData($str, $key)
{
    $iv_len = openssl_cipher_iv_length('DES-ECB');    // 获取密码iv长度
    $iv = openssl_random_pseudo_bytes($iv_len);        // 生成一个伪随机字节串
    $data = openssl_encrypt($str, 'DES-ECB', $key, $options = OPENSSL_RAW_DATA, $iv);    // 加密
    return bin2hex($data);
}

/**
 * 字符串解密（解密方法：DES-ECB）
 * @param string $str 待解密字符串
 * @param string $key 对称加密密钥
 * @return bool|string
 */
function decryptData($str, $key)
{
    $str = hex2bin(strtolower($str));
    $iv_len = openssl_cipher_iv_length('DES-ECB');    // 获取密码iv长度
    $iv = openssl_random_pseudo_bytes($iv_len);        // 生成一个伪随机字节串
    $str = openssl_decrypt($str, 'DES-ECB', $key, $options = OPENSSL_RAW_DATA, $iv);
    return $str;
}

/**
 * 记录系统日志
 * @param App\Http\Requests | Illuminate\Http\Request $request 请求
 * @param string $description 操作描述
 * @param array $params 调用的参数
 * @param string $status 状态
 * @param boolean|string 是否是token
 */
function writeLog($request, $description, $params, $status, $isToken = false)
{
    if ($isToken) {
        $token = $isToken;
    } else {
        $token = $request->header('X-Token');//获取用户token
    }
    $ip = $request->getClientIp();//获取客户端ip
    $service = new \App\Services\AdminUsersService($token);
    SysLog::create(['user_id' => $service->user->id, 'username' => $service->user->username, 'ip' => $ip, 'params' => json_encode($params, JSON_UNESCAPED_UNICODE), 'description' => $description, 'status' => $status]);
}

