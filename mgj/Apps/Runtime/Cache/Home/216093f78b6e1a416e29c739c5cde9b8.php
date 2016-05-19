<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的钱包</title>
	<link rel="stylesheet" href="/Public/Home/css/purse.css">
	<link rel="icon" href="/Public/Home/images/logo.ico">
</head>
<body>
	<div class="all">
		<div class="header">
			<div class="sy">
				<a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/purse1.png" alt=""> 蘑菇街首页</a>
			</div>
			<div class="yh">
				<li><?php  if($_SESSION['uid']){ echo session('username'); }else{ echo '请登录'; echo '<meta http-equiv="refresh" content="1;url=/Home/User/login">'; } ?></li>
				<li><a href="<?php echo U('Home/User/logout');?>">安全退出</a></li>
			</div>
		</div>
		<div class="purse">
			<div class="top">
				<div class="purse_logo">
					<img src="/Public/Home/images/purse2.png" alt="">
				</div>
				<div class="purse_dh">
					<ul>
						<li class="dh1">首页</li>
						<li>账号管理</li>
						<li>资金管理</li>
						<li>理财</li>
						<li>帮助中心</li>
					</ul>
				</div>
			</div>
		</div>
		<?php
 $id=$_SESSION['uid']; $M=M('user_image'); $sql="select * from user_image where uid =".$id; $res=$M->query($sql); foreach ($res as $k => $v) { } ?>
		<div class="c1" style="background:url('/Public/Home/images/purse_bg.jpg')">
			<div class="c1_main">
				<div class="pic">
				<?php
 if($v['pic']){ ?>
						<img src="/Public/<?php echo ($v["pic"]); ?>" alt="">
				<?php
 }else{ ?>
						<img src="/Public/Home/images/purse_pic.jpg" alt="">
				<?php
 } ?>
					
				</div>
				<div class="c1_w">
					<span>亲爱的<?php echo session('username');?>,欢迎您!</span>
				</div>
			</div>
		</div>
		<div class="c2">
			<div class="c2_l">
				<div class="c2_lt">	
					<div class="ye">
						我的余额
					</div>
					<div class="cz">
					<?php if(is_array($row)): foreach($row as $key=>$vo): ?><span><?php echo ($vo["gold"]); ?>元</span>
						<button class="but">充值</button><?php endforeach; endif; ?>
					</div>
				</div>
				<div class="c2_lc">
					<div class="lc">
						理财<span>HOT</span>
					</div>
					<div class="qlc">
						<span>零风险，高收益，闪电提现！</span>
						<button class="but1">去理财</button>
					</div>
				</div>
				<div class="youhui">
					<span>优惠</span>
					<img src="/Public/Home/images/youhui.png" alt="">
				</div>
			</div>
			<div class="c2_r">
				<img src="/Public/Home/images/purse_ewm.jpg" alt="">
			</div>
		</div>
		<div class="footer">
			<div class="f1">
				<div class="f2">
					<div class="f3">© 2015 Mogujie.com,All Rights Reserved.</div>
					<div class="f4"><img src="/Public/Home/images/footer.png" alt=""></div>
				</div>
			</div>
		</div>
	</div>
	<div id="tk">
		<div class="tk_cz">
			<div class="tk_head">
				<div class="tk_hl">
					请输入充值金额
				</div>
				<div class="close">
					×
				</div>
			</div>
			<div class="tk_b">
			<form action="<?php echo U('Home/Purse/pay');?>" method="post">
				<input type="text" name="money"> &nbsp;元
				<button>充值</button>
			</form>
			</div>
		</div>
	</div>
	<script type="text/javascript"src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="/Public/Home/js/purse.js"></script>
</body>
</html>