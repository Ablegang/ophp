<?php
// +----------------------------------------------------------------------
// | Model.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午3:18
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

class Model extends \PDO
{
    public function __construct()
    {
        $driver = config('db.driver'); // 其实这里根据不同的驱动，可以使用不同的策略，先不展开，先搭完框架

        $dsn = config("db.$driver")['dsn'];
        $username = config("db.$driver")['username'];
        $password = config("db.$driver")['password'];
        try {
            parent::__construct($dsn, $username, $password);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }
}