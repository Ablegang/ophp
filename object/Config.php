<?php
// +----------------------------------------------------------------------
// | Config.php
// +----------------------------------------------------------------------
// | Description: 配置加载类
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午5:01
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

class Config
{
    private static $configMap = [];

    public static function get($key)
    {
        if (!isset(self::$configMap[$key])) {
            $fileName = explode('.', $key)[0] ?? '';
            $file = CONFIG . '/' . $fileName . '.php';
            if (!file_exists($file)) {
                throw new \Exception('配置文件不存在：' . $file);
            }

            $config = include_once $file;
            foreach ($config as $k => $v) {
                self::$configMap[$fileName . '.' . $k] = $v;
            }
        }
        return self::$configMap[$key];
    }
}