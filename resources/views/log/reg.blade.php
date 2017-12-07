@extends('f_layout.f_login_layout')
@section('log')
    <header>
        <div class="log-header">
            <h1><a href="/">Amaze UI</a> </h1>
        </div>
        <div class="log-re">
            <button type="button" id="jump" class="am-btn am-btn-default am-radius log-button" onclick="jump_url()">登  陆</button>
        </div>
    </header>
    <div class="log">
        <div class="am-g">
            <div class="am-u-lg-3 am-u-md-6 am-u-sm-8 am-u-sm-centered log-content">
                <h1 class="log-title am-animation-slide-top">AmazeUI</h1>
                <br>
                <form class="am-form" id="log-form" >
                    <div class="am-input-group am-radius am-animation-slide-left">
                        <input type="email" id="username" class="am-radius" data-validation-message="请输入正确邮箱地址" placeholder="邮箱" required/>
                        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-user am-icon-sm am-icon-fw"></i></span>
                    </div>
                    <br>
                    <div class="am-input-group am-animation-slide-left log-animation-delay">
                        <input type="password" id="password" class="am-form-field am-radius log-input" placeholder="密码" minlength="6" required>
                        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
                    </div>
                    <br>
                    <div class="am-input-group am-animation-slide-left log-animation-delay-a">
                        <input type="password" data-equal-to="#log-password" class="am-form-field am-radius log-input" placeholder="确认密码" data-validation-message="请确认密码一致" required id="repassword">
                        <span class="am-input-group-label log-icon am-radius"><i class="am-icon-lock am-icon-sm am-icon-fw"></i></span>
                    </div>
                    <br>
                    <button type="button" class="am-btn am-btn-primary am-btn-block am-btn-lg am-radius am-animation-slide-bottom log-animation-delay-b" onclick="reg()">注 册</button>
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

@section('js')
    <script>
        jump_url('jump','click', '{{ route('f_login') }}');

        function reg(){
            var username = $("#username").val();
            var password = $("#password").val();
            var repassword = $("#repassword").val();
            var token = "{{ csrf_token()}}";
            var url = "{{ url('log/regUser') }}";
            if(!username){
                am_alert("请填写用户名");
                return false;
            }
            if(!password){
                am_alert("请填写密码");
                return false;
            }
            if(!repassword){
                am_alert("请填写确认密码");
                return false;
            }
            if(repassword != password){
                am_alert("两次输入的密码不一致，请重新输入");
                return false;
            }
            if(password.length < 6){
                am_alert("密码不能少于6位");
                return false;
            }
            var data = {
                username:username,
                password:password,
                _token : token
            }
            $.ajax({
                type:'POST',
                url:url,
                data:data,
                dataType:"json",
                success:function(d){
                    am_alert(d.msg);
                    if(d.code == 10000){
                        location.href = "{{ url('login/log') }}";
                    }
                }
            });
        }
    </script>
@endsection
