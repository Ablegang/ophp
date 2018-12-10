<?php
// +----------------------------------------------------------------------
// | Controller.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午3:51
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

use Twig_Loader_Filesystem;
use Twig_Environment;

class Controller
{
    public $assignData = [];

    public function assign($k, $v)
    {
        $this->assignData[$k] = $v;
    }

    public function display($view = '')
    {
        $file = CONTROLLER . '/' . ($view ?: ACTION) . '.html'; // 模板文件
        $templatePath = config('view.path') ?: APP . '/views'; // 总模板路径
        $templateCachePath = config('view.cachePath') ?: CACHE . '/views'; // 缓存路径

        $loader = new Twig_Loader_Filesystem($templatePath);
        // 这两个路径如果传入错误，会报 There are no registered paths for namespace "__main__". Error
        $twig = new Twig_Environment($loader, [
            'cache' => $templateCachePath,
            'debug' => DEBUG, // 调试模式开启，则不会有模板缓存
        ]);

        $twig->display($file,$this->assignData);
    }
}