<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/8/30
 * Time: 13:37
 */

namespace App\Http\Enums;


class NavigationEnums
{
    const TYPE_ARTICLE = 'article';
    const TYPE_WHISPER = 'whisper';
    const TYPE_LEACOTS = 'leacots';
    const TYPE_ALBUM = 'album';
    const TYPE_ABOUT = 'about';

    public static $typeMap = [
        self::TYPE_ARTICLE => '文章',
        self::TYPE_WHISPER => '微语',
        self::TYPE_LEACOTS => '留言',
        self::TYPE_ALBUM => '相册',
        self::TYPE_ABOUT => '关于',
    ];
}
