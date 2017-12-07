<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/13
 * Time: 15:34
 */

namespace App\Http\Controllers\Forward;

use App\Http\Controllers\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ForwardApi\UserApiController;
use App\Model\UserModel;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    private $apiBase = '';
    private $userModel = '';
    private $loginlogdir= 'reflashlog';
    public function __construct(Request $resquest)
    {

        if(!empty($this->userModel)){
            $this->userModel = new UserModel();
        }

    }

    public function login()
    {

        return view('log.login');
    }

    public function reg()
    {
        return view('log.reg');
    }

    /*
     * @username : name
     * @password : password
     * @_token
     * @return
     * 20171124 独立登陆
     */
    public function do_reg(Request $request)
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
                "msg"=>"用户名不能使用中文",
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
            $this->write_log("账号注册 重复用户名 info : ".json_encode($_REQUEST),"user_logs_pc","INFO");
            return $this->reJson($msg);
        }else{
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
                $this->write_log("账号注册失败 error : ".json_encode($_REQUEST),"user_logs_pc","ERROR");

                return $this->reJson($msg);
            }
        }

    }

    /*
     * 登陆验证
     *
     */
    public function loginPc(Request $request)
    {

        $userModel = new UserModel();
        $password = md5(md5($request->input('password')));
        $username = $request->input("username");
        $userInfo = $userModel->getUser(array("username"=>$username,"password"=>$password));
        if($userInfo){
            $log_res = $this->reflashLoginfo($userInfo,2);
            if(!$log_res){
                $msg = array(
                    "code"=>10001,
                    "msg"=>"登陆信息写入失败请重新登陆",
                    "debug"=>"",
                );
            }
        }else{
            $msg = array(
                "code"=>10005,
                "msg"=>"错误的用户名或者密码，请核对后登陆",
                "debug"=>"",
            );
        }

        return $this->reJson($msg);
    }

    /*
     * 登陆状态处理
     * 1已登录
     * 2未登录
     */
    public function reflashLoginfo($uinfo = array(),$type=1)
    {
        if($type == 2){
            //登陆验证
            $flashdata = $this->userLevelUp($uinfo);
            $flashdata['lastlogintime'] = time();

            $save_res = $this->userModel->saveUser($uinfo['id'],$flashdata);
            session(["userInfo"=>$uinfo]);
            $res = session("userInfo");
            return $res;
        }
    }
}