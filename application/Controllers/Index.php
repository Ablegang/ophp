<?php
// +----------------------------------------------------------------------
// | User.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午3:05
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Application\Controllers;

use Object\Model;
use Object\Controller;

class Index extends Controller
{
    public function index()
    {
        $model = new Model();
        $res = $model->query('select * from users')->fetchAll(2);
        dump($res);
        $this->assign('title', "这是首页");
        $this->display();
    }
}