<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/11/18
 * Time: 10:51
 */

namespace App\Services;

use OSS\OssClient;
use OSS\Core\OssException;
use Illuminate\Support\Facades\Log;

class AliOssService implements OssService
{
    private $accessKeyId;
    private $accessKeySecret;
    /**
     * @var OssService 外网节点或自定义外部域名
     */
    private $endpoint;
    /**
     * @var 空间名称
     */
    private $bucket;

    /**
     * @var 自定义域名
     */
    private $domain;

    public function __construct()
    {
        $this->accessKeyId = env("ALIYUN_ACCESS_ID");
        $this->accessKeySecret = env("ALIYUN_ACCESS_KEY");
        $this->endpoint = env("ALIYUN_ENDPOINT");
        $this->bucket = env("ALIYUN_BUCKET");
        $this->domain = env("ALIYUN_CDN_DOMAIN");
    }

    public function list()
    {

    }

    public function upload($folder,$file)
    {
        $url = "";
        try {
            // 文件名称
            $filePath = $file['tmp_name'];
            $object = $folder."/" . $file['name'];
            $ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
            $result = $ossClient->uploadFile($this->bucket, $object, $filePath);
            return $result;
            if ($result && isset($result['info'])) {
                $info = $result['info'];
                if ($info['http_code'] == 200) {
                    $url = str_replace('http://liangqy.oss-cn-shanghai.aliyuncs.com', $this->domain, $info['url']);
                }
            }
        } catch (OssException $e) {
            Log::warning("文件上传失败," . $e->getMessage());
            return $url;
        }
        return $url;
    }

    /**
     * @param $objects 删除的对象
     * @return bool|mixed
     */
    public function destroy($objects)
    {
        $bucket = $this->bucket;
        try {
            $ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
            $ossClient->deleteObjects($bucket, $objects);
        } catch (OssException $e) {
            print $e->getMessage();
            Log::warning("文件删除失败," . $e->getMessage());
            return false;
        }
        return true;
    }
}
