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

use Application\Model\User;
use Medoo\Medoo;
use Object\Model;
use Object\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->assign('ab',23);
        $this->assign('aba',23);
        $this->display();
    }
}