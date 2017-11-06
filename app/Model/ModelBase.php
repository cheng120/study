<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/23
 * Time: 11:58
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ModelBase extends Model
{
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