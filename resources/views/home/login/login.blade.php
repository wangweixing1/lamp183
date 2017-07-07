<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/bootstrap.min.css') }}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/font-awesome.min.css') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{ asset ('/admin/adminlte/bootstrap/css/ionicons.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset ('/admin/adminlte/dist/css/AdminLTE.min.css') }}">
        <!-- iCheck -->
        <link rel="stylesheet" href="{{ asset ('/admin/adminlte/plugins/iCheck/square/blue.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../../index2.html"><b></b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <h4><p class="login-box-msg">请登录</p></h4>
                @if(session('info'))
                    <p class="text-danger">{{ session('info') }}</p>
                @endif
                <form action="/admin/dologin" method="post">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback">
                        <input type="text" name="name" class="form-control" placeholder="用户名">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="密码">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="text" name="code" style="width:110px;height:30px;" placeholder="验证码">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <a onclick="javascript:re_captcha();" >
                            <img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="40" id="c2c98f0de5a04167a9e427d883690ff6" border="0">
                        </a>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox" name="remember_me"> 记住我
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->

                <a href="#">忘记密码？</a><br>

            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="{{ asset ('/admin/adminlte/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="{{ asset ('/admin/adminlte/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset ('/admin/adminlte/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });

            // 点击生成新的验证码
            function re_captcha()
            {   
                // 生成路由路径
                $url = "{{ URL('kit/captcha') }}";

                // 追加随机数
                $url = $url + "/" + Math.random();

                // 获取id
                document.getElementById('c2c98f0de5a04167a9e427d883690ff6').src=$url;
            }
        </script>
    </body>
</html>
