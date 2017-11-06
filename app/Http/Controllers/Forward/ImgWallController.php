<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/12
 * Time: 17:02
 * 照片墙
 */

namespace App\Http\Controllers\Forward;
use App\Http\Controllers\Controller;

class ImgWallController extends Controller
{
    //照片墙主页
    public function index()
    {
        return view('imgwall.index');

    }




}