<?php
// +----------------------------------------------------------------------
// | object.php
// +----------------------------------------------------------------------
// | Description: 启动类
// +----------------------------------------------------------------------
// | Time: 2018/12/7 上午11:54
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

class Boot
{
    private static $classMap = [];

    public static function run()
    {
        try {

            // 日志
            Log::init();

            // 路由
            $router = Router::getInstance();

            // 控制器
            $controller = 'Application\Controllers\\' . $router->controller;

            // 操作
            $action = $router->action;

            define('CONTROLLER', $router->controller);
            define('ACTION', $router->action);

            (new $controller())->$action(); // 调用控制器

        } catch (\Exception $e) {

            // 记录异常日志
            Log::log($e->getMessage());
            Log::log($e->getTrace());

            if (DEBUG) {
                throw $e; // 用于面板显示
            }

        }
    }

    // application和object目录下的自动加载
    public static function load($class)
    {
        $filePath = str_replace('\\', '/', $class); // 将命名空间和类字符串中的 反斜杠 替换成 斜杠

        // 首字母大小写替换
        $filePath = str_replace('Object/', CORE . '/', $filePath);
        $filePath = str_replace('Application/', APP . '/', $filePath);

        // linux文件系统严格区分大小写，所以当文件夹是小写，命名空间是大写的时候，需要注意一下，另外，composer的自动加载可以通过映射解决大小写问题

        if (!isset($classMap[$class])) {
            $file = $filePath . '.php';
            if (!file_exists($file)) {
                throw new \Exception('找不到类：' . $file);
            }
            include_once $file;
        }

        return true;
    }
}