<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 15:31
 */

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class ApiBaseController extends BaseController
{

    private $source = 1;
    private $logBaseDir = '';

    public function __construct()
    {
        $this-> logBaseDir =  storage_path().'/logs/';
    }

    protected function reJson($data)
    {
        exit(json_encode($data));
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