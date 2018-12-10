<?php
// +----------------------------------------------------------------------
// | Controller.php
// +----------------------------------------------------------------------
// | Description: 控制器父类
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
        /**
         * 这个文件路径的拼接方式，就算传入$view参数，但也只支持选择在controller路径下的其他模板文件，无法垮目录
         * 另外，这里写死了模板文件的后缀
         */
        $file = CONTROLLER . '/' . ($view ?: ACTION) . '.html';

        /**
         * 总模板目录，可通过view.php配置
         */
        $templatePath = config('view.path') ?: APP . '/views';

        /**
         * 缓存
         */
        $templateCachePath = config('view.cachePath') ?: CACHE . '/views';

        /**
         * twig模板引擎
         * 一个小经验：传入错误路径，会报 There are no registered paths for namespace "__main__". Error
         */
        $loader = new Twig_Loader_Filesystem($templatePath);
        $twig = new Twig_Environment($loader, [
            'cache' => $templateCachePath,
            'debug' => DEBUG, // 调试模式开启，则不会有模板缓存
        ]);

        /**
         * 旧版本的twig要在display之前调用load方法来得到一个渲染好的对象，新版本将load和display放在了一步。
         * 详细使用，参考twig文档：https://twig.symfony.com/
         */
        $twig->display($file,$this->assignData);
    }
}