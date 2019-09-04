<?php
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2019/7/17
 * Time: 9:51
 */

/**
 * 将当前请求的路由名称转换为CSS类名称
 * @return mixed
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
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
