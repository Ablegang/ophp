<?php
// +----------------------------------------------------------------------
// | Model.php
// +----------------------------------------------------------------------
// | Description: 数据库父类
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午3:18
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object;

use Medoo\Medoo;

class Model extends Medoo
{
    /**
     * Model constructor.
     * 这里使用了Medoo包
     * Medoo中文手册：https://medoo.lvtao.net/
     */
    public function __construct()
    {
        $driver = config('db.driver');
        $config = config("db.$driver");
        parent::__construct($config);
    }
}