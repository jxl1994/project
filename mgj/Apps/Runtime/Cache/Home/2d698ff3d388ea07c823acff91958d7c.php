<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Home/css/public.css">
	<link rel="stylesheet" href="/Public/Home/css/index.css">
	<link rel="icon" href="/Public/Home/images/logo.ico">
	
	<title>蘑菇街-我的买手街!</title>
	
	<script type="text/javascript"src="/Public/Home/js/jquery-1.8.3.min.js"></script>
</head>

<body>
	<!-- 导航条 -->
	<div id="header">
		<div class="dh">
		<?php
 if(!$_SESSION['uid']){ ?>
			<li><a href="<?php echo U('Home/User/zhuce');?>">注册</a><span>|</span></li>
			<li><a href="<?php echo U('Home/User/login');?>">登录</a><span>|</span></li>
		<?php }else{ ?>
			<li><a href="<?php echo U('Home/Personal/index');?>"><?php echo session('username');?></a><span>|</span></li>
			<li><a href="<?php echo U('Home/User/logout');?>">退出 </a><span>|</span></li>
			<?php } ?>
			<li><a href="<?php echo U('Home/Shoucang/index');?>">我的收藏</a><span>|</span></li>
			<li><a href="<?php echo U('Home/Myorder/detail');?>"><img src="/Public/Home/images/tb1.png" class="tb1"> 我的订单</a><span>|</span></li>
			<li><a href="<?php echo U('Home/Cart/index');?>" name="rdh_md"><img src="/Public/Home/images/tb2.png" class="tb2"> 购物车</a><span>|</span></li>
			
			<li><a href="#"><img src="/Public/Home/images/tb3.png" class="tb3"> 我的小店</a></li>
			
		</div>
	</div>

	<!-- 右侧导航条 -->
	<div id="right_dh">
		<div class="right_dh">
		<!-- 购物车 -->
			<div class="rdh_gwc">
				<a href="<?php echo U('Home/Cart/index');?>"><div class="rdh_gwc_logo">
					<img src="/Public/Home/images/right_dh.png" alt="">
				</div>
				<div class="rdh_gwc_w">购物车</div></a>
			</div>
			<!-- 优惠券 -->
			<div class="rdh_yhq">
				<a href="">
					<div class="rdh_yhq_logo">
						<img src="/Public/Home/images/right_dh.png" alt="">
					</div>
					<div class="rdh_yhq_w">优惠券</div>
				</a>
			</div>
			<!-- 钱包 -->
			<div class="rdh_qb">
				<a href="<?php echo U('Home/Purse/index');?>">
					<div class="rdh_qb_logo">
						<img src="/Public/Home/images/right_dh.png" alt="">
					</div>
					<div class="rdh_qb_w">钱包</div>
				</a>
			</div>
			<!-- 足迹 -->
			<div class="rdh_zj">
				<a href="<?php echo U('Home/Mark/index');?>">
					<div class="rdh_zj_logo">
						<img src="/Public/Home/images/right_dh.png" alt="">
					</div>
					<div class="rdh_zj_w">足迹</div>
				</a>
			</div>

		</div>
		<!-- 锚点 -->
		<div class="rdh_md">
			<a href="#rdh_md"><img src="/Public/Home/images/right_dh.png" alt=""></a>

		</div>
	</div>
	
	<div class="c"></div>

	<!-- 顶部 -->
	
	<div id="top">
		<div class="top">
			<div class="top_logo">
				<a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/top_logo.png" alt=""></a>
				
			</div>
			
			<!-- 搜索框 -->
			<div class="top_center">
				<div class="sousuo_left">
					<span>搜商品</span>
				</div>
				<form action="" >
					<input type="search" class="sousuo_center">
					<button class="sousuo_right"><img src="/Public/Home/images/ss.png" alt=""></button>
				</form>
			</div>
			<!-- 二维码 -->
			<div class="top_right" style="background-image: url('/Public/Home/images/ewm.gif');">
				<img src="/Public/Home/images/ewm.png" alt="">
			</div>
		</div>
		
	</div>
	
	
	<!-- 中间 -->
	<div class="c"></div>
	
	<link rel="stylesheet" href="/Public/Home/css/list.css">
	<script type="text/javascript"src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<div id="list">
	<!-- 分类 -->
		<div class="list_fl">
			<?php if(is_array($list[0])): foreach($list[0] as $key=>$vo): ?><li><a href="<?php echo U('Home/list/lb',array('id'=>$vo['id']));?>"><?php echo ($vo["catename"]); ?></a>
				<?php if(is_array($list[$vo['id']])): foreach($list[$vo['id']] as $key=>$vo2): ?><div class="a"><a href="<?php echo U('Home/list/lb',array('id'=>$vo2['id']));?>"><?php echo ($vo2["catename"]); ?></a></div><?php endforeach; endif; ?>
			</li><?php endforeach; endif; ?>
		</div>
		<!-- 两张图片 -->
		<div class="l">
			<img src="/Public/Home/images/10.jpg" style="border-radius: 10px;" width="1212"  alt="">
		</div>
		<div class="name">
		<?php
 $id=$_GET['id']; $sql='select * from category where id = '.$id; $res=mysql_query($sql); $row=mysql_fetch_assoc($res); ?>	
			<h1 style="color:blue;"><?php echo ($row["catename"]); ?></h1>	
			<hr width="1200px" style="color:#ccc;">
		</div>
		
		<div class="list_goods">
		<?php if(is_array($result)): foreach($result as $key=>$vo): ?><div class="list_g1">
				<dl>
					<dt><a href="<?php echo U('Home/Detail/index',array('id'=>$vo['id']));?>"><img src="/Public/<?php echo ($vo["pic"]); ?>" width="179" height="190" alt=""></a></dt>
					<dd class="goods_name"><a href="<?php echo U('Home/Detail/index',array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></dd>
					<dd class="goods_price">￥<?php echo ($vo["price"]); ?></dd>	
				</dl>
			</div><?php endforeach; endif; ?>
		</div>
		<div class="c"></div>
		
	</div>
	<script type="text/javascript">
	$('li').mouseover(function(){
		$(this).find('.a').css('display','block');
	})
	$('li').mouseout(function(){
		$(this).find('.a').css('display','none');
	})
	</script>


	<div class="c"></div>
	<!-- 底部 -->
	<div id="footer" style="background-image: url('/Public/Home/images/footer_bg.png');">
		<div class="footer">
			<div class="footer_left">
				<div class="footer_logo">
					<img src="/Public/Home/images/footer_logo.png" alt="">
				</div>
				<div class="footer_bq">
					<ul>
						<li>营业执照注册号：330106000129004</li>
						<li>增值电信业务经营许可证：浙B2-20110349</li>
						<li>ICP备案号：浙ICP备10044327号-3</li>
						<li>©2016 Mogujie.com 杭州卷瓜网络有限公司</li>
					</ul>
				</div>
			</div>
			<div class="footer_center">
				<dl>
					<dt>公司</dt>
					<dd><a href="">关于我们</a></dd>
					<dd><a href="">招聘信息</a></dd>
					<dd><a href="">联系我们</a></dd>
				</dl>
				<dl>
					<dt>消费者</dt>
					<dd><a href="">消费者服务</a></dd>
					<dd><a href="">意见反馈</a></dd>
					<dd><a href="">手机版下载</a></dd>
				</dl>
				<dl>
					<dt>商家</dt>
					<dd><a href="">商家入驻</a></dd>
					<dd><a href="">商家后台</a></dd>
					<dd><a href="">商家社区</a></dd>
				</dl>
				
			</div>
			<div class="footer_right">
				<p>权威认证</p>
				<div class="img">
					<div class="img1">
						<img src="/Public/Home/images/split.png" alt="">
					</div>
					<div class="img2">
						<img src="/Public/Home/images/split.png" alt="">
					</div>
					<div class="img3">
						<img src="/Public/Home/images/split.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>