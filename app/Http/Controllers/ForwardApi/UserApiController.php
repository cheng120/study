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
        $user_model = new UserModel();
        //验证用户名唯一
        $un_user = $user_model->getUser(array("username"=>$request->input('username'),"password"=>$request->input("password")));
        if($un_user){
            $msg = array(
                "msg"=>'注册失败',
                "code"=>10001,
                "debug"=>"",
            );
            $this->write_log("账号注册 重复用户名 info : ".json_encode($_REQUEST),"user_api","INFO");
            $this->reJson($msg);
        }
        $res = $user_model->createUser($request->input('username'),$request->input('password'));
        if($res){
            $this->reJson($msg);

        }else{
            $msg=array(
                "msg"=>"注册失败",
                "code"=>10002,
                "debug"=>"",
            );
            $this->write_log("账号注册失败 error : ".json_encode($_REQUEST),"user_api","ERROR");

            $this->reJson($msg);
        }
    }

    /*
     * 用户列标
     */
    public function userlist(Request $request)
    {
        $respose = array("test");
        return $respose;
    }
}