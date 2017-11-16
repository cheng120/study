<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 15:31
 */

namespace App\Http\Controllers;
use App\Model\UserModel;
use Dingo\Api\Contract\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ApiBaseController extends BaseController
{

    private $source = 1;
    private $logBaseDir = '';
    public $userInfo = "";
    private $logInlog = "apiLogin";

    public function __construct(Request $request)
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
    protected function write_log($msg,$file="datelog",$type = "error")
    {
        \CustomLog::getLogger($file,$type)->info($msg);
    }

    /*
     * IP计数器 单个IP请求同一接口超过10次 定义为恶意
     *
     */
    private function setIpCount(Request $request)
    {
        $ip = $request->getClientIp();
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
     * 更新登陆状态
     *
     */
    public function reflashLoginfo($uid,$source=1)
    {
        $userModel = new UserModel();
        //pc
        if($source == 1){
            $userInfo = $userModel->getUser(array('id'=>$uid));
            if($userInfo){
                //计算等级 获取待更新数据
                $up_date = $this->userLevelUp($userInfo);
                $up_date['lastlogintime'] = time();
                //session_KEY
                $key = date('Ymd').'_'.$userInfo['id'];
                session([$key=>$userInfo]);
                $save_sess_res  =session($key);

                if( $save_sess_res){
                    $this->write_log("uid:".$uid."reflash success",$this->logInlog);
                    return true;
                }else{
                    $this->write_log("uid:".$uid."reflash failed. save time failed",$this->logInlog);
                    return false;
                }
            }else{
                $this->write_log("uid:".$uid."reflash failed. user unknow ",$this->logInlog);

                return false;
            }
        }else{

        }
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