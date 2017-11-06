<?php

namespace App\Http\Controllers;
use Log;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $userInfo = array();
        $userInfo['id'] = 1;

    }

    /*
     * 日志写入
     * @msg 日志信息
     * @file 日志文件名
     * @type 日志级别
     */
    protected function write_log($msg,$file,$type = "error")
    {
        \CustomLog::getLogger($file,$type)->info($msg);
    }
}
