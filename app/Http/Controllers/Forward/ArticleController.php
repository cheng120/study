<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12
 * Time: 11:39
 */

namespace App\Http\Controllers\Forward;
use App\Http\Controllers\Controller;


class ArticleController extends Controller
{
    public function index(){
        // echo "这是首页";

        $nav = $this->nav();
        return view('article.index',['user'=>"这是传参","nav"=>$nav]);
    }

    public function nav()
    {
//        return view('article.nav',['first'=>"6666"]);
    }
}