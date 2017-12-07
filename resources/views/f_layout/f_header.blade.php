<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>article with sidebar  | Amaze UI Examples</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="icon" type="image/png" href="{{ URL::asset('/assets/i/favicon.png') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{ URL::asset('/assets/i/app-icon72x72@2x.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('/assets/i/app-icon72x72@2x.png') }}">
    <meta name="msapplication-TileImage" content="{{ URL::asset('/assets/i/app-icon72x72@2x.png') }}">
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/amazeui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/app.css') }}">
</head>

<body id="blog-article-sidebar">
<header>

</header>
<!-- header start -->
<header class="am-g am-g-fixed blog-fixed blog-text-center blog-header " style="background: red;padding-top: 15.2px">
    <div class="am-u-sm-1">
        <h1 class=""><a href="/">cheng</a> </h1>
    </div>
        @php
            $userInfo = session("userInfo");
            dump($userInfo);
        @endphp
        <div class="am-u-sm-11">
            <a href="{{url('login/reg')}}"><button type="button" id="jump" class="am-btn am-btn-default am-radius log-button  am-fr" onclick="jump_url()">注  册</button></a>
            <div class=" am-fr">&nbsp;&nbsp;&nbsp;&nbsp;</div>
            <a href="{{url('login/log')}}"><button type="button" id="jump" class="am-btn am-btn-default am-radius log-button  am-fr" onclick="jump_url()">登  陆</button></a>
        </div>




</header>
