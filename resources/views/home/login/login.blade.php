<!DOCTYPE HTML> 
<html> 
<head> 
<meta http-equiv="Content-Type" content="text/html" charset="utf-8"> 
<meta http-equiv="description" content=""> 
<meta http-equiv="author" content=""> 
<meta http-equiv="date" content=""> 
<title>半边天电影登录</title> 
<link rel="stylesheet" href="{{ asset ('home/css/login.css') }}"> 
<!--为了让IE支持HTML5元素，做如下操作：--> 
<!--[if IE]> 
<script type="text/javascript"> 
document.createElement("section"); 
document.createElement("header"); 
document.createElement("footer"); 
</script> 
<![endif]--> 
</head> 
 
<body style="background:url('/home/images/111.jpg'); background-repeat: no-repeat;"> 
<div class="wrap"> 
  @if(session('info'))
    <p class="text-danger">{{ session('info') }}</p>
    @endif
    <form action="/home/dologin" method="post">
    {{ csrf_field() }} 
    <section class="loginForm"> 
      <header> 
        <h1>欢迎登录半边天</h1> 
      </header> 
      <div class="loginForm_content"> 
        <fieldset> 
          <div class="inputWrap"> 
            <input type="text" name="name" placeholder="用户名" autofocus required> 
          </div> 
          <div class="inputWrap"> 
            <input type="password" name="password" placeholder="请输入密码" required> 
          </div> 
        </fieldset> 
        <fieldset> 
          <input type="checkbox" name="remember_me"> 
          <span>下次自动登录</span> 
        </fieldset> 
        <fieldset> 
          <input type="submit" value="登录"> 
          <a href="regist">去注册</a> 
        </fieldset> 
      </div> 
    </section> 
  </form> 
</div> 
</body> 
</html>