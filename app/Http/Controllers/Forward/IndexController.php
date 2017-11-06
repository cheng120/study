<?php

namespace App\Http\Controllers\Forward;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    public function index(){
       // echo "这是首页";

        $nav = $this->nav();
        return view('blog.index',['user'=>"这是传参","nav"=>$nav]);
    }

   public function nav()
    {
//        return view('blog.nav',['first'=>"6666"]);
    }
}
