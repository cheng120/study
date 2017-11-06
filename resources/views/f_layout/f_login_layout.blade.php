<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>LOG-IN | Amaze UI Examples</title>

    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">

    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>

    <link rel="icon" type="image/png" href="{{ URL::asset('/assets/i/favicon.png') }}">

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="{{ URL::asset('/assets/i/app-icon72x72@2x.png') }}">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="{{ URL::asset('/assets/i/app-icon72x72@2x.png') }}">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="{{ URL::asset('/assets/i/app-icon72x72@2x.png') }}">
    <meta name="msapplication-TileColor" content="#0e90d2">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/amazeui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/css/app.css') }}">
    @section("css")

    @show
</head>
<body>


@section('log')

@show

        <!--弹层start-->
        <div class="am-modal am-modal-no-btn" tabindex="-1" id="your-modal">
            <div class="am-modal-dialog">
                <div class="am-modal-hd"><span id="am_title">温馨提示</span>
                    <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                </div>
                <div class="am-modal-bd">
                   <span id="am_content">内容</span>
                </div>
            </div>
        </div>
        <!--弹层end-->



        <!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ URL::asset('/assets/js/jquery.min.js') }}"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]-->

<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src=" {{ URL::asset('/assets/js/amazeui.ie8polyfill.min.js') }} "></script>
<!--[endif]-->
<script src="{{ URL::asset('/assets/js/amazeui.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pinto.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/img.js') }}"></script>
<script src="{{ URL::asset('/assets/js/common.js') }}"></script>
@section("js")

@show


</body>
</html>
