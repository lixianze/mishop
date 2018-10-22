<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <meta name="author" content="order by dede58.com"/>
		<title>小米商城</title>
		<base href="__PUBLIC__">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
	</head>
	<body>
	<!-- start header -->
		<header>
			<div class="top center">
				<div class="left fl">
					<ul>
						<li><a href="{{url('homepage/homePage')}}" >小米商城</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">MIUI</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">米聊</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">游戏</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">多看阅读</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">云服务</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">金融</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">小米商城移动版</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">问题反馈</a></li>
						<li>|</li>
						<li><a href="{{url('homepage/homePage')}}">Select Region</a></li>
						<div class="clear"></div>
					</ul>
				</div>
				<div class="right fr">
					<div class="gouwuche fr"><a href="{{url('homepage/mi_shopcar')}}">购物车</a></div>
					<div class="fr">
						<ul>
							<li><a href="{{url('homepage/LoginOut')}}"><?php
								use Illuminate\Support\Facades\Session;
									if(session()->get('user_name') == ''){
										echo "";
									}else{
										echo session()->get('user_name')."(退出登录)";
									}
								?></a></li>
							<li>|</li>
							<li><a href="{{url('homepage/mobileLogin')}}" ><?php
									if(session()->get('user_name') == ''){
										echo "登陆";
									}else{
										echo "";
									}
									?></a></li>
							<li>|</li>
							<li><a href="{{url('homepage/mobileAdd')}}" ><?php
									if(session()->get('user_name') == ''){
										echo "注册";
									}else{
										echo "";
									}
									?></a></li>
							<li>|</li>
							<li><a href="{{url('homepage/homePage')}}">消息通知</a></li>
						</ul>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear"></div>
			</div>
		</header>
	<!--end header -->

<!-- start banner_x -->
		<div class="banner_x center">
			<a href="{{url('homepage/homePage')}}" ><div class="logo fl"></div></a>
			<a href="{{url('homepage/homePage')}}"><div class="ad_top fl"></div></a>
			<div class="nav fl">
				<ul>
					<li><a href="{{url('homepage/mi_list')}}" >小米手机</a></li>
					<li><a href="{{url('homepage/mi_list')}}">红米</a></li>
					<li><a href="{{url('homepage/mi_list')}}">平板·笔记本</a></li>
					<li><a href="{{url('homepage/mi_list')}}">电视</a></li>
					<li><a href="{{url('homepage/mi_list')}}">盒子·影音</a></li>
					<li><a href="{{url('homepage/mi_list')}}">路由器</a></li>
					<li><a href="{{url('homepage/mi_list')}}">智能硬件</a></li>
					<li><a href="{{url('homepage/mi_list')}}">服务</a></li>
					<li><a href="{{url('homepage/mi_list')}}">社区</a></li>
				</ul>
			</div>
			<div class="search fr">
				<form action="" method="post">
					<div class="text fl">
						<input type="text" class="shuru"  placeholder="小米6&nbsp;小米MIX现货">
					</div>
					<div class="submit fl">
						<input type="submit" class="sousuo" value="搜索"/>
					</div>
					<div class="clear"></div>
				</form>
				<div class="clear"></div>
			</div>
		</div>
<!-- end banner_x -->

	<!-- start banner_y -->
		<div class="banner_y center">
			<div class="nav">				

				<ul>
					<?php foreach($data as $v) { ?>
					<li><a href="{{url('homepage/homePage')}}">{{$v['shop_name']}}</a>

						<div class="pop">
							<?php foreach($v['name'] as $k) { ?>
							<div class="left fl" style="height: 80px">
								<div>
									<div class="xuangou_left fl">

										<a href="{{url('homepage/homeList')}}?type_id={{$k['type_id']}}">
											<div class="img fl"><img src={{$k['shop_url']}} alt=""></div>

											<span class="fl">{{$k['shop_name']}}</span>

											<div class="clear"></div>
										</a>
									</div>
									<div class="xuangou_right fr"><a href="{{url('homepage/homeList')}}?type_id={{$k['type_id']}}" >选购</a></div>
									<div class="clear"></div>
							</div>
							</div>
						<?php } ?>
					</li>
						<?php } ?>
				</ul>

			</div>

		</div>

		<div class="sub_banner center">
			<div class="sidebar fl">
				<div class="fl"><a href=""><img src="/image/xiaomi/hjh_01.gif"></a></div>
				<div class="fl"><a href=""><img src="/image/xiaomi/hjh_02.gif"></a></div>
				<div class="fl"><a href=""><img src="/image/xiaomi/hjh_03.gif"></a></div>
				<div class="fl"><a href=""><img src="/image/xiaomi/hjh_04.gif"></a></div>
				<div class="fl"><a href=""><img src="/image/xiaomi/hjh_05.gif"></a></div>
				<div class="fl"><a href=""><img src="/image/xiaomi/hjh_06.gif"></a></div>
				<div class="clear"></div>
			</div>
			<div class="datu fl"><a href=""><img src="/image/xiaomi/hongmi4x.png" alt=""></a></div>
			<div class="datu fl"><a href=""><img src="/image/xiaomi/xiaomi5.jpg" alt=""></a></div>
			<div class="datu fr"><a href=""><img src="/image/xiaomi/pinghengche.jpg" alt=""></a></div>
			<div class="clear"></div>


		</div>
	<!-- end banner -->
	<div class="tlinks">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div>

	<!-- start danpin -->
		<div class="danpin center">
			
			<div class="biaoti center">小米明星单品</div>
			<div class="main center">
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/image/xiaomi/pinpai1.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米MIX</a></div>
					<div class="youhui">5月9日-21日享花呗12期分期免息</div>
					<div class="jiage">3499元起</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/image/xiaomi/pinpai2.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米5s</a></div>
					<div class="youhui">5月9日-10日，下单立减200元</div>
					<div class="jiage">1999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/image/xiaomi/pinpai3.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米手机5 64GB</a></div>
					<div class="youhui">5月9日-10日，下单立减100元</div>
					<div class="jiage">1799元</div>
				</div>
				<div class="mingxing fl"> 	
					<div class="sub_mingxing"><a href=""><img src="/image/xiaomi/pinpai4.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米电视3s 55英寸</a></div>
					<div class="youhui">5月9日，下单立减200元</div>
					<div class="jiage">3999元</div>
				</div>
				<div class="mingxing fl">
					<div class="sub_mingxing"><a href=""><img src="/image/xiaomi/pinpai5.png" alt=""></a></div>
					<div class="pinpai"><a href="">小米笔记本</a></div>
					<div class="youhui">更轻更薄，像杂志一样随身携带</div>
					<div class="jiage">3599元起</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="peijian w">
			<div class="biaoti center">配件</div>
			<div class="main center">
				<div class="content">
					<div class="remen fl"><a href=""><img src="/image/xiaomi/peijian1.jpg"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span>新品</span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian2.jpg"></a></div>
						<div class="miaoshu"><a href="">小米6 硅胶保护套</a></div>
						<div class="jiage">49元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian3.jpg"></a></div>
						<div class="miaoshu"><a href="">小米手机4c 小米4c 智能</a></div>
						<div class="jiage">29元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:red">享6折</span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian4.jpg"></a></div>
						<div class="miaoshu"><a href="">红米NOTE 4X 红米note4X</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian5.jpg"></a></div>
						<div class="miaoshu"><a href="">小米支架式自拍杆</a></div>
						<div class="jiage">89元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="content">
					<div class="remen fl"><a href=""><img src="/image/xiaomi/peijian6.png"></a>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian7.jpg"></a></div>
						<div class="miaoshu"><a href="">小米指环支架</a></div>
						<div class="jiage">19元</div>
						<div class="pingjia">372人评价</div>
						<div class="piao">
							<a href="">
								<span>发货速度很快！很配小米6！</span>
								<span>来至于mi狼牙的评价</span>
							</a>
						</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian8.jpg"></a></div>
						<div class="miaoshu"><a href="">米家随身风扇</a></div>
						<div class="jiage">19.9元</div>
						<div class="pingjia">372人评价</div>
					</div>
					<div class="remen fl">
						<div class="xinpin"><span style="background:#fff"></span></div>
						<div class="tu"><a href=""><img src="/image/xiaomi/peijian9.jpg"></a></div>
						<div class="miaoshu"><a href="">红米4X 高透软胶保护套</a></div>
						<div class="jiage">59元</div>
						<div class="pingjia">775人评价</div>
					</div>
					<div class="remenlast fr">
						<div class="hongmi"><a href=""><img src="/image/xiaomi/hongmin4.png" alt=""></a></div>
						<div class="liulangengduo"><a href=""><img src="/image/xiaomi/liulangengduo.png" alt=""></a></div>					
					</div>
					<div class="clear"></div>
				</div>				
			</div>
		</div>
		<footer class="mt20 center">			
			<div class="mt20">小米商城|MIUI|米聊|多看书城|小米路由器|视频电话|小米天猫店|小米淘宝直营店|小米网盟|小米移动|隐私政策|Select Region</div>
			<div>©mi.com 京ICP证110507号 京ICP备10046444号 京公网安备11010802020134号 京网文[2014]0059-0009号</div> 
			<div>违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试</div>
		</footer>
	</body>
</html>