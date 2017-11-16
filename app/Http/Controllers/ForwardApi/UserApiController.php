<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 15:25
 */
namespace App\Http\Controllers\ForwardApi;


use App\Http\Controllers\ApiBaseController;
use App\Model\UserModel;
use Dingo\Api\Http\Request;

class UserApiController extends ApiBaseController
{
    public $logDir = "";



    public function test()
    {
        $this->write_log(1,1);
        $this->logDir = "UserApi";

    }

    /*
     * 注册接口
     */
    public function regUser(Request $request)
    {
        $msg = array(
            "msg" => "注册成功",
            "code"=> 10000,
            "debug"=>"",
        );
        $password = $request->input('password');
        $password = trim($password);
        $username = $request->input('username');
        $username = trim($username);
        if(strlen($password) < 6){
            $msg = array(
                "msg"=>"密码不能少于6位",
                "code"=>10005,
                "debug"=>"",
            );
            return $this->reJson($msg);
        }
        if($this->verStrHasCn($username)){
            $msg = array(
                "msg"=>"密码不能少于6位",
                "code"=>10006,
                "debug"=>"",
            );
            return $this->reJson($msg);
        }
        $user_model = new UserModel();
        //验证用户名唯一
        $un_user = $user_model->getUser(array("username"=>$username));
        if($un_user){
            $msg = array(
                "msg"=>'重复用户名，请更换用户名',
                "code"=>10001,
                "debug"=>"",
            );
            $this->write_log("账号注册 重复用户名 info : ".json_encode($_REQUEST),"user_api","INFO");
            return $this->reJson($msg);

            $res = $user_model->createUser($username,$password);
            if($res){
                $re_res = $this->reflashLoginfo($res);
                return $this->reJson($msg);

            }else{
                $msg=array(
                    "msg"=>"注册失败",
                    "code"=>10002,
                    "debug"=>"",
                );
                $this->write_log("账号注册失败 error : ".json_encode($_REQUEST),"user_api","ERROR");

                return $this->reJson($msg);
            }
        }
    }

    /*
     * 用户登陆
     */
    public function userLogin(Request $request)
    {
        $msg = array(
            "code"=>10000,
            "msg"=>"登陆成功",
            "debug"=>"",
        );
        $userModel = new UserModel();
        //验证登陆
        $password = md5(md5($request->input('password')));
        $username = $request->input("username");
        $userInfo = $userModel->getUser(array("username"=>$username,"password"=>$password));
        if($userInfo){
            $log_res = $this->reflashLoginfo($userInfo['id']);
            if(!$log_res){
                $msg = array(
                    "code"=>10001,
                    "msg"=>"登陆信息写入失败请重新登陆",
                    "debug"=>"",
                );
            }
        }else{
            $msg = array(
                "code"=>10001,
                "msg"=>"错误的用户名或者密码，请核对后登陆",
                "debug"=>"",
            );
        }
        return $this->reJson($msg);
    }
}