<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>电影登录</title>
        <link rel="stylesheet" href="{{ asset ('/home/css/login.css') }}">
    </head>
    <body>
        <div id="big">
            <div class="btfont">
                <h3>登录</h3>
            </div>
            <div class="biaodan">
                <form action="./index.php?c=login&a=doLogin" method="post">
                    <table width="380" border="0" cellspacing="15">
                        <tr>
                            <td class="you">用户名<span> *</span></td>
                            <td class="zuo"><input type="text" name="userName"/></td>
                        </tr>
                        <tr>
                            <td class="you">密  码<span> *</span></td>
                            <td class="zuo"><input type="password" name="password"/></td>
                        </tr>
                        <tr>
                            <td class="you">验证码<span> *</span></td>
                            <td class="zuo">
                            <input type="text" name="code" style="width:110px;height:30px;" placeholder="验证码">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            <a onclick="javascript:re_captcha();" >
                                <img src="{{ URL('kit/captcha/1') }}"  alt="验证码" title="刷新图片" width="100" height="30" id="c2c98f0de5a04167a9e427d883690ff6" border="0">
                            </a>
                            </td>
                        <tr style="text-align:center;">
                            <td class="btn" colspan="2">
                                <input type="submit" value="登陆"/>
                                <input type="reset" value="重置"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="butdl">
                <h3>还没有账号？</h3>
                <a href="./index.php?c=register&a=index"><button>去注册</button></a>
            </div>
        </div>
        <div id="clear"></div>
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