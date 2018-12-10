<?php
// +----------------------------------------------------------------------
// | Route.php
// +----------------------------------------------------------------------
// | Description: 路由类
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午1:35
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

class Router
{
    public $controller = "";
    public $action = "";
    public $params = [];

    private static $instance = null;

    private function __construct()
    {
        /**
         * 需开启rewrite功能，自动隐藏index.php
         * 如：ophp.test/index/index/id/1/name/2
         * 其中，第一个index为controller，第二个index为action，后面的都是参数
         */

        $query = trim(trim(trim($_SERVER['REQUEST_URI'], '/')), config('route.suffix'));
        if ($query == '') {
            // 默认controller和action
            $this->action = config('route.action');
            $this->controller = config('route.controller');
        } else {
            // 拆分和组装query到$_GET中
            $params = explode('/', $query);
            $this->controller = $params[0] ?? '';
            $this->action = $params[1] ?? '';
            unset($params[0], $params[1]);
            $i = 2;
            while ($params) {
                $_GET[$params[$i]] = $params[$i + 1] ?? '';
                unset($params[$i], $params[$i + 1]);
                $i += 2;
            }
            $this->params = $_GET;
        }
    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self;
        }

        return self::$instance;
    }
}