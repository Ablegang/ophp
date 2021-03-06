<?php
// +----------------------------------------------------------------------
// | Users.php
// +----------------------------------------------------------------------
// | Description: 自定义模型
// +----------------------------------------------------------------------
// | Time: 2018/12/10 上午11:39
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Application\Model;

use Object\Model;

class User extends Model
{
    protected $table = 'users';

    public function lists()
    {
        return $this->select($this->table,'*');
    }
}