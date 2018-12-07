<?php
// +----------------------------------------------------------------------
// | Log.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午6:00
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

class Log
{
    private static $driver;

    // 找到合适的驱动
    public static function init()
    {
        $driver = config('log.driver');
        $class = "Object\Driver\Log\\$driver";
        self::$driver = new $class;
    }

    // 记录日志
    public static function log($content, $file = null)
    {
        self::$driver->log($content,$file);
    }
}