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

class Controller
{
    public $assignData = [];

    public function assign($k, $v)
    {
        $this->assignData[$k] = $v;
    }

    public function display($view = '')
    {
        $path = VIEW . '/' . CONTROLLER;
        $file = $path . '/' . ($view ?: ACTION) . '.html';
        if (file_exists($file)) {
            extract($this->assignData);
            include $file;
        } else {
            throw new \Exception('模板不存在：' . $file);
        }
    }
}