<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'url', 'width', 'height', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * 获取图片类型
     * @param $value
     * @return string
     */
    public function getTypeAttribute($value)
    {
        $type = '';
        switch ($value) {
            case 1:
                $type = 'GIF';
                break;
            case 2:
                $type = 'JPG';
                break;
            case 3:
                $type = 'PNG';
                break;
            case 4:
                $type = 'SWF';
                break;
            case 5:
                $type = 'PSD';
                break;
            case 6:
                $type = 'BMP';
                break;
            case 7:
                $type = 'TIFF(intel byte order)';
                break;
            case 8:
                $type = 'TIFF(motorola byte order)';
                break;
            case 9:
                $type = 'JPC';
                break;
            default:
                $type = '';
        };
        return $type;
    }
}
