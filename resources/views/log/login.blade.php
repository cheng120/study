@extends('f_layout.f_login_layout')
@section('log')
    <header>
        <div class="log-header">
            <h1><a href="/">Amaze UI</a> </h1>
        </div>
        <div class="log-re">
            <button type="button" class="am-btn am-btn-default am-radius log-button">注册</button>
        </div>
    </header>
    <div class="log">
        <div class="am-g">
            <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
                <h1 class="log-title am-animation-slide-top">AmazeUI</h1>
                <br>
                <form class="am-form" id="log-form">
                    <div class="am-input-group am-radius am-animation-slide-left">
                        <input type="email" id="doc-vld-email-2-1" class="am-radius" data-validation-message="请输入正确邮箱地址" placeholder="邮箱" required/>
                        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
                    </div>
                    <br>
                    <div class="am-input-group am-animation-slide-left log-animation-delay">
                        <input type="password" id="log-password" class="am-form-field am-radius log-input" placeholder="密码" minlength="11" required>
                        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
                    </div>
                    <br>
                    <div class="am-input-group am-animation-slide-left log-animation-delay-a">
                        <input type="password" data-equal-to="#log-password" class="am-form-field am-radius log-input" placeholder="确认密码" data-validation-message="请确认密码一致" required>
                        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
                    </div>
                    <br>
                    <button type="submit" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay-b">注 册</button>
                    <br>
                    <div class="am-btn-group am-animation-slide-bottom log-animation-delay-b">
                        <p>支持第三方注册</p>
                        <a href="#" class="am-btn am-btn-secondary am-btn-sm"><i class="am-icon-github am-icon-sm"></i> Github</a>
                        <a href="#" class="am-btn am-btn-success am-btn-sm"><i class="am-icon-google-plus-square am-icon-sm"></i> Google+</a>
                        <a href="#" class="am-btn am-btn-primary am-btn-sm"><i class="am-icon-stack-overflow am-icon-sm"></i> stackOverflow</a>
                    </div>
                </form>
            </div>
        </div>
        <footer class="log-footer">
            © 2014 AllMobilize, Inc. Licensed under MIT license.
        </footer>
    </div>
@endsection