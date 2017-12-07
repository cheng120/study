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
     * 判断输入内容是否有中文
     */
    protected function verStrHasCn($str)
    {
        //是否含有中文
        $flag = false;
        if(preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $str)>0){
            $flag = true;
        }elseif(preg_match('/[\x{4e00}-\x{9fa5}]/u', $str)>0){
            $flag = true;
        }
        return $flag;
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

    protected function reJson($data)
    {
        exit(json_encode($data));
    }

    /*
     * 账号升级
     */
    public function userLevelUp($userInfo)
    {
        if((int)date("Ymd") - date("Ymd",$userInfo['lastlogintime']) > 1){
            if($userInfo['expire']+=100>pow($userInfo['level'],10)){
                $level = $userInfo['level']+1;
            }
            $data = array(
                "level"=>$level?$level:$userInfo['level'],
                "expire"=>$userInfo['expire'],
            );
            return $data;
        }else{
            return false;
        }
    }

}
