<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/9/20
 * Time: 17:11
 */

namespace App\Handlers;

use App\Services\AliOssService;
use  Illuminate\Support\Str;

class ImageUploadHandler
{
    // 只允许以下后缀名的图片文件上传
    protected $allowed_ext = ["png", "jpg", "gif", 'jpeg'];

    /**
     * @param $file 文件
     * @param $folder 存储目录
     * @param $file_prefix 文件名前缀
     * @param bool $is_absolute_path 是否返回相对路径
     * @return array|bool
     */
    public function save($file, $folder, $file_prefix, $is_absolute_path = false)
    {
        // 构建存储的文件夹规则，值如：uploads/images/avatars/201709/21/
        // 文件夹切割能让查找效率更高。
        $folder_name = "uploads/images/$folder/" . date("Ym/d", time());

        // 文件具体存储的物理路径，`public_path()` 获取的是 `public` 文件夹的物理路径。
        // 值如：/home/vagrant/Code/larabbs/public/uploads/images/avatars/201709/21/
        $upload_path = storage_path('app/public') . '/' . $folder_name;

        // 获取文件的后缀名，因图片从剪贴板里黏贴时后缀名为空，所以此处确保后缀一直存在
        $extension = strtolower($file->getClientOriginalExtension()) ?: 'png';

        // 拼接文件名，加前缀是为了增加辨析度，前缀可以是相关数据模型的 ID
        // 值如：1_1493521050_7BVc9v9ujP.png
        $filename = $file_prefix . '_' . time() . '_' . Str::random(10) . '.' . $extension;

        // 如果上传的不是图片将终止操作
        if (!in_array($extension, $this->allowed_ext)) {
            return false;
        }

        // 将图片移动到我们的目标存储路径中
        $file->move($upload_path, $filename);

        if ($is_absolute_path) {
            return [
                'path' => getcwd() . '/storage' . "/$folder_name/$filename"
            ];
        } else {
            return [
                'path' => env('APP_URL') . '/storage' . "/$folder_name/$filename"
            ];
        }
    }

    /**
     * 上传到阿里云oss
     * @param string $folder
     * @param File $file
     * @return array|bool
     */
    public function uploadToAli($folder,$file)
    {
        //获取文件名
        $filename = $_FILES['file']['name'];
        //获取文件临时路径
        $file_path = $file['tmp_name'];
        $image_info = getimagesize($file_path);//图片宽高等信息
        $width = $image_info[0];
        $height = $image_info[1];
        $type = $image_info[2];
        $file_info = pathinfo($filename);//文件信息
        //获取文件的后缀名
        $ext_suffix = $file_info['extension'];
        //判断上传的文件是否在允许的范围内（后缀）==>白名单判断
        if (!in_array($ext_suffix, $this->allowed_ext)) {
            return ['code' => 1001,'message' => '上传的文件类型只能是jpg,gif,jpeg,png'];
        }
        $material = new AliOssService();
        $result = $material->upload($folder, $file);
        if ($result) {
            return ['code' => 0, 'file' => $result, 'width' => $width, 'height' => $height, 'type' => $type, 'message' => 'success'];
        } else {
            return false;
        }
    }

}
