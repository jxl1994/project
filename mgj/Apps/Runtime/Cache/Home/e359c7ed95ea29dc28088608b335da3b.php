<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>蘑菇街 -我的买手街-</title>
		<link href="/Public/Home/css/photo.css" rel="stylesheet"/>
		<link rel="stylesheet" href="/Public/Home/css/public.css">
		
		<link rel="icon" href="/Public/Home/images/logo.ico">
		
		<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
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
	
	<link href="/Public/Home/css/photo.css" rel="stylesheet"/>
	<!-- <link href="/Public/Home/css/bootstrap.css" rel="stylesheet"/> -->
	<!-- 个人信息主体页面 -->
	<div class="main">
		<!-- 左 -->
		<div class="left">
			<div class="left1">
				<!-- 头像 -->
					<div class="tx"><?php if(is_array($pic)): foreach($pic as $key=>$vo): if($vo["pic"] == null): ?><img src="/Public/Home/images/tx.jpg" class="tx_pic">
					<?php else: ?>
						<img src="/Public/<?php echo ($vo["pic"]); ?>" class="tx_pic" alt=""><?php endif; ?></div>
					
				<!-- 用户名 -->
					<span class="name" value="checked"><?php echo ($_SESSION['username']); ?></span>
				<!-- 等级 -->
					<span class="vip-level"><img src="/Public/Home/images/lev.png"></span>
				<!-- 我的订单 -->
				<dl class="menu">
					<p>我的订单</p>
					<dd><a href="<?php echo U('Home/Myorder/detail');?>">全部订单</a></dd>
					<dd><a href="">待付款</a></dd>
					<dd><a href="">待收货</a></dd>
					<dd><a href="">待评价</a></dd>
				</dl>
				<dl class="menu">
					<p><a href="<?php echo U('Home/Purse/index');?>">我的钱包</a></p>
				</dl>
				<dl class="menu">
					<p><a href="">我的理财</a></p>
				</dl>
				<dl class="menu">
					<p>优惠特权</p>
					<dd><a href="">砖石会员</a></dd>
					<dd><a href="">我的魔豆</a></dd>
					<dd><a href="">现金券</a></dd>
					<dd><a href="">店铺优惠券</a></dd>
				</dl>
				<dl class="menu">
					<p><a href="<?php echo U('Home/Address/detail');?>">地址管理</a></p>
				</dl>
				<dl class="menu">
					<p><a href="">安全设置</a></p>
				</dl>
				<dl class="menu">
					<p>账号设置</p>
					<dd><a href="<?php echo U('Home/personal/index');?>">基本信息</a></dd>
					<dd><a href="<?php echo U('Home/personal/photo');?>">修改头像</a></dd>
					<dd><a href="<?php echo U('Home/personal/xgmm');?>">修改密码</a></dd>
				</dl>

			</div>
			<div class="right">
			<div class="ziliao">
				<span>修改头像</span>
			</div><br/><br/>

			<!-- 当前头像 -->
			<div class="photo">
				<form action="/Home/Personal/head" method="post" class="form-horizontal" enctype="multipart/form-data" role="form">
				<!-- 隐藏域传输id -->
				<foreach name="pic" item="vo">
					<div class="photo1">当前头像：</div>
					<?php if($vo["pic"] == null): ?><div class="photo2"><img src="/Public/Home/images/tx.jpg" ></div>
					<?php else: ?>
						<div class="photo2"><img src="/Public/<?php echo ($vo["pic"]); ?>" alt=""></div><?php endif; endforeach; endif; ?>
			</div> 
			<div style="clear:both"></div>

			<!-- 上传新头像 -->
			<div class="photo-top"> 
		  		<span class="new">上传新头像：</span>
		  		<input type="file" name="img" id="exampleInputFile">
		  		<p class="pic-top">
					建议使用正方形的图片，支持JPG、GIF、JPEG格式，100K以内。
		  		</p> 
		  	</div>
			    <div class="sub">
			      <button type="submit" class="photoxg">确认</button>
			    </div>
			    </form>
				 <!-- 历史头像 -->
				 <div class="ziliao" style="margin-top: 80px;">
					<span>历史头像</span>
				</div>
				
				 <div class="lstx">
				 <?php if(is_array($head)): foreach($head as $key=>$lstx): ?><div class="lstx1">
				 		<div class="lstx_img">
				 			<div class="img"><img src="/Public<?php echo ($lstx["pic"]); ?>" alt=""></div>
				 			<div class="sy">使用<div class="id"><?php echo ($lstx["id"]); ?></div></div>
				 			<div class="sc">删除<div class="id"><?php echo ($lstx["id"]); ?></div></div>
				 		</div>
				 	</div><?php endforeach; endif; ?>
				 </div>
				 <div class="row">
                      <div class="col-sm-6">
                       <div class="dataTables_info" id="dataTables-example_info" role="status" aria-live="polite"></div></div>
                       <div class="col-sm-6">
                        <div id="pages">
                         <?php echo ($pages); ?>
                      </div>
                 </div>
             </div>
			</div>	
			</div>
			
			
		</div>	
		<script type="text/javascript"src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript"src="/Public/Home/js/lstx.js"></script>


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