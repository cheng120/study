<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/13
 * Time: 11:24
 */

namespace App\Http\Controllers\Forward;

use App\Http\Controllers\Controller;

class TimelineController extends Controller
{
    public function index()
    {
        return view("timeline.index");
    }
}