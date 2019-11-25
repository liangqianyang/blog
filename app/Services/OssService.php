<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/18
 * Time: 10:49
 */

namespace App\Services;


interface OssService
{
    /**
     * 文件列表
     * @return mixed
     */
    public function list();

    /**
     * 上传文件
     * @var $folder 目录名称
     * @var $file 文件路径
     * @return mixed
     */
    public function upload($folder,$file);

    /**
     * 删除文件
     * @return mixed
     */
    public function destroy($objects);

}
