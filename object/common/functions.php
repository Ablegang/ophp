<?php
// +----------------------------------------------------------------------
// | functions.php
// +----------------------------------------------------------------------
// | Description: 函数库
// +----------------------------------------------------------------------
// | Time: 2018/12/7 上午11:47
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

if (!function_exists('dump')) {
    function dump($var)
    {
        echo "<pre>";
        var_dump($var);
    }
}

if (!function_exists('dd')) {
    function dd($var)
    {
        echo "<pre>";
        var_dump($var);
        exit;
    }
}

if (!function_exists('config')) {
    function config($key = '', $default = '')
    {
        return \Object\Config::get($key) ?: $default;
    }
}