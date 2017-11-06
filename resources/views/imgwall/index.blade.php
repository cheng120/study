@extends('f_layout.base_layout')

@section('nav')
    <!-- nav start -->
    <nav class="am-g am-g-fixed blog-fixed blog-nav">
        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-success am-show-sm-only blog-button" data-am-collapse="{target: '#blog-collapse'}" ><span class="am-sr-only">导航切换</span> <span class="am-icon-bars"></span></button>

        <div class="am-collapse am-topbar-collapse" id="blog-collapse">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li class="am-active"><a href="lw-index.html">首页</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        首页布局 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="lw-index.html">1. blog-index-standard</a></li>
                        <li><a href="lw-index-nosidebar.html">2. blog-index-nosidebar</a></li>
                        <li><a href="lw-index-center.html">3. blog-index-layout</a></li>
                        <li><a href="lw-index-noslider.html">4. blog-index-noslider</a></li>
                    </ul>
                </li>
                <li><a href="lw-article.html">标准文章</a></li>
                <li><a href="lw-img.html">图片库</a></li>
                <li><a href="lw-article-fullwidth.html">全宽页面</a></li>
                <li><a href="lw-timeline.html">存档</a></li>
            </ul>
            <form class="am-topbar-form am-topbar-right am-form-inline" role="search">
                <div class="am-form-group">
                    <input type="text" class="am-form-field am-input-sm" placeholder="搜索">
                </div>
            </form>
        </div>
    </nav>
    <!-- nav end -->
@endsection

@section('content')
    <!-- content srart -->
    <div class="am-g am-g-fixed blog-fixed blog-content">
        <figure data-am-widget="figure" class="am am-figure am-figure-default "   data-am-figure="{  pureview: 'true' }">
            <div id="container">
                <div><img src="images/01.jpg"><h3>Agfa</h3></div>
                <div><img src="images/02.jpg"><h3>Auto</h3></div>
                <div><img src="images/03.jpg"><h3>Bald eagle</h3></div>
                <div><img src="images/04.jpg"><h3>Black swan</h3></div>
                <div><img src="images/05.jpg"><h3>Book shelf</h3></div>
                <div><img src="images/06.jpg"><h3>Camera</h3></div>
                <div><img src="images/07.jpg"><h3>Camera</h3></div>
                <div><img src="images/25.jpg"><h3>Vintage camera</h3></div>
                <div><img src="images/09.jpg"><h3>Coffee</h3></div>
                <div><img src="images/10.jpg"><h3>Cookies</h3></div>
                <div><img src="images/11.jpg"><h3>Cubes</h3></div>
                <div><img src="images/12.jpg"><h3>DJ</h3></div>
                <div><img src="images/13.jpg"><h3>Doors</h3></div>
                <div><img src="images/14.jpg"><h3>Matchbox</h3></div>
                <div><img src="images/15.jpg"><h3>Freiburg</h3></div>
                <div><img src="images/16.jpg"><h3>Henna</h3></div>
                <div><img src="images/17.jpg"><h3>Home office</h3></div>
                <div><img src="images/18.jpg"><h3>iPad</h3></div>
                <div><img src="images/19.jpg"><h3>Keyboard</h3></div>
                <div><img src="images/20.jpg"><h3>Lynx</h3></div>
                <div><img src="images/21.jpg"><h3>Mac</h3></div>
                <div><img src="images/22.jpg"><h3>Notebook</h3></div>
                <div><img src="images/23.jpg"><h3>Thoughts</h3></div>
                <div><img src="images/24.jpg"><h3>Office</h3></div>
                <div><img src="images/25.jpg"><h3>Children</h3></div>
                <div><img src="images/26.jpg"><h3>Portrait</h3></div>
                <div><img src="images/27.jpg"><h3>Startup</h3></div>
                <div><img src="images/28.jpg"><h3>Sun</h3></div>
                <div><img src="images/29.jpg"><h3>The Eiffel Tower</h3></div>
                <div><img src="images/30.jpg"><h3>Water drops</h3></div>

            </div>
        </figure>

    </div>
    <!-- content end -->
@endsection