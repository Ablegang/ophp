<?php
// +----------------------------------------------------------------------
// | start.php
// +----------------------------------------------------------------------
// | Description: 引导文件
// +----------------------------------------------------------------------
// | Time: 2018/12/10 下午2:18
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

define('ROOT', realpath('./')); // 根目录
define('CORE', ROOT . '/object'); // 框架目录
define('APP', ROOT . '/application'); // 项目目录
define('CONFIG', ROOT . '/config'); // 配置目录
define('CACHE', ROOT . '/cache'); // 临时文件目录
define('DEBUG', true); // 调试模式
ini_set('date.timezone', 'PRC'); // 设置时区

if (DEBUG) {

    // 调试界面
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    ini_set('display_errors', 'On');

} else {

    ini_set('display_errors', 'Off');
}

require_once CORE . '/common/functions.php';
require_once ROOT . '/functions.php'; // 自定义函数库
require_once CORE . '/Boot.php';

spl_autoload_register('\Object\Boot::load');
\Object\Boot::run();