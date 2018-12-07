<?php
// +----------------------------------------------------------------------
// | File.php
// +----------------------------------------------------------------------
// | Description: 
// +----------------------------------------------------------------------
// | Time: 2018/12/7 下午6:21
// +----------------------------------------------------------------------
// | Author: Object,半醒的狐狸<2252390865@qq.com>
// +----------------------------------------------------------------------

namespace Object\Driver\Log;

class File
{

    public $path;

    public function __construct()
    {
        $this->path = config('log.File')['path'];
    }

    public function log($content, $file = null)
    {
        $path = $this->path . '/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $file = $file ?: 'log.txt';
        $content = date('Y-m-d H:i:s') . '---' . json_encode($content) . PHP_EOL;
        return file_put_contents($path . $file, $content, FILE_APPEND); // 会加上两条
    }
}