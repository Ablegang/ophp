<?php
// +----------------------------------------------------------------------
// | index.php
// +----------------------------------------------------------------------
// | Description: 入口文件
// +----------------------------------------------------------------------
// | Time: 2018/12/6 下午6:50
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

/**
 * 1、定义常量：根目录、框架目录、项目目录、调试模式
 * 2、根据调试模式显示错误信息
 * 3、配置自动加载
 * 4、引入函数库
 * 5、引入框架启动类
 * 6、启动框架
 */

define('ROOT', realpath('./')); // realpath函数会返回绝对路径，并去除多余的斜杠、../、./这样的符号链接，目录的话，最后不会带 /
define('CORE', ROOT . '/object'); // 统一框架规范，定义目录的结尾都不带 /
define('APP', ROOT . '/application');
define('VIEW', ROOT . '/views');
define('CONFIG', ROOT . '/config');

define('DEBUG', false);

ini_set('date.timezone', 'PRC'); // 设置时区

if (DEBUG) {
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

require_once CORE . '/common/functions.php'; // 除类和命名空间相关以外的文件、文件夹，全部以小写命名
require_once CORE . '/Boot.php';

spl_autoload_register('\Object\Boot::load'); // 自动加载

\Object\Boot::run();