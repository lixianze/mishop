<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>手机号登录</title>
		<base href="__PUBLIC__">
		<link rel="stylesheet" type="text/css" href="/css/login.css">
		
	</head>
	<body>
		<!-- login -->
		<div class="top center">
			<div class="logo center">
				<a href="{{url('homepage/homePage')}}"><img src="/image/xiaomi/mistore_logo.png" alt=""></a>
			</div>
		</div>

		<form  method="post" action="/index.php/mobileLoginUser" class="form center">
		@csrf
		<div class="login">
			<div class="login_center">
				<div class="login_top">
					<div class="left fl">手机号登录</div>
					
					<div class="right fr"><a href="{{url('homepage/mobileAdd')}}" target="_self">立即注册</a></div>
					<div class="right fr"><a href="{{url('homepage/emailLogin')}}" target="_self">邮箱登陆&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				<div class="login_main center">
					<div class="username">电话号码:<input class="shurukuang" type="text" name="user_tel" placeholder="请输入你的电话号"/><span>@if(is_object($errors)){{$errors -> first('user_tel')}}@endif</span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;&nbsp;&nbsp;<input class="shurukuang" type="password" name="user_pwd" placeholder="请输入你的密码"/><span>@if(is_object($errors)){{$errors -> first('user_pwd')}}@endif</span></div>
					<div class="username">
						<div class="left fl">验证码:&nbsp;&nbsp;&nbsp;&nbsp;<input class="yanzhengma" type="text" placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="/image/xiaomi/yanzhengma.jpg"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="login_submit">
					<input class="submit" type="submit" name="submit" value="立即登录" >
				</div>
				
			</div>
		</div>
		</form>
		<footer>
			<div class="copyright">简体 | 繁体 | English | 常见问题</div>
			<div class="copyright">小米公司版权所有-京ICP备10046444-<img src="/image/xiaomi/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号</div>

		</footer>
	</body>
</html>