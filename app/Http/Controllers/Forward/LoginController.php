<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/13
 * Time: 15:34
 */

namespace App\Http\Controllers\Forward;

use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Http\Request;


class LoginController extends Controller
{
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
     * @return 废弃
     */
    public function do_reg(Request $request)
    {
        exit;
        $user_model = new UserModel();
        $res = $user_model->test();
        var_dump($request->input('email'));
        $res = $user_model->createUser($request->input('email'),$request->input('password'));
        var_dump($_REQUEST);
        //var_dump($request);
    }
}