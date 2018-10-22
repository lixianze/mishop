<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>手机号注册</title>
		<base href="__PUBLIC__">
		<link rel="stylesheet" type="text/css" href="/css/login.css">

	</head>
	<body>
		<form  method="post" action="/index.php/mobileRegister">
		<div class="regist">
			<div class="regist_center">
				<div class="regist_top">
					<div class="left fl">手机号注册</div>
					<div class="right fr"><a href="{{url('homepage/homePage')}}">小米商城</a></div>
					<div class="right fr"><a href="{{url('homepage/emailAdd')}}">邮箱注册&nbsp;&nbsp;&nbsp;</a></div>
					<div class="clear"></div>
					<div class="xian center"></div>
				</div>
				@csrf
				<div class="regist_main center">
				
					<div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" type="text" name="user_name" placeholder="请输入你的用户名"/><span>@if(is_object($errors)){{$errors -> first('user_name')}}@endif</span></div>
					<div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="user_pwd" placeholder="请输入你的密码"/><span>@if(is_object($errors)){{$errors -> first('user_pwd')}}@endif</span></div>
					
					<div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" type="password" name="user_repwd" placeholder="请确认你的密码"/><span>@if(is_object($errors)){{$errors -> first('user_repwd')}}@endif</span></div>
					<div class="username">手&nbsp;&nbsp;&nbsp;&nbsp;机号:&nbsp;&nbsp;<input class="shurukuang" type="text" name="user_tel" placeholder="请填写正确的手机号"/><span>@if(is_object($errors)){{$errors -> first('user_tel')}}@endif</span></div>
					<div class="username">
						<div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" type="text"  placeholder="请输入验证码"/></div>
						<div class="right fl"><img src="../../image/xiaomi/yanzhengma.jpg"></div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="regist_submit">
					<input class="submit" type="submit"  value="立即注册" >
				</div>
				
			</div>
		</div>
		</form>
	</body>
</html>