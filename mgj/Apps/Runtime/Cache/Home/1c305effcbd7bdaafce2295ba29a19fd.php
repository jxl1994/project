<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的钱包</title>
	<link rel="stylesheet" href="/Public/Home/css/pay.css">
	<link rel="icon" href="/Public/Home/images/logo.ico">
	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	</script>
</head>
<body>
	<div class="all">
		<div class="header">
			<div class="sy">
				<a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/purse1.png" alt=""> 蘑菇街首页</a>
			</div>
			<div class="yh">
				<li>您好,<?php echo session('username');?></li>
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
		<div class="c1" style="background:url('/Public/Home/images/purse_bg.jpg')">
			<div class="c1_main">
				<div class="pic">
					<img src="/Public/Home/images/purse_pic.jpg" alt="">
				</div>
				<div class="c1_w">
					<span>亲爱的<?php echo session('username');?>,欢迎您!</span>
				</div>
			</div>
		</div>
		<div class="c2">
			<div class="dd">
				<h3>订单提交成功,请您于24小时内完成支付</h3>
				<li>(以订单时间为准)</li>
				<h4>应付金额:¥<?php echo ($money); ?></h4>
			</div>
			<hr width="1180">
			<div class="wy">
				<h3>网上银行</h3>
				<li>需跳转银行页面</li>
				
			</div>
			
			<div class="zf">
			<?php if(is_array($pays)): foreach($pays as $key=>$vo): ?><div class="z1">
					<img src="/Public/<?php echo ($vo["logo"]); ?>" width="150" height="50" alt="">
				</div><?php endforeach; endif; ?>			
			</div>
			
			<div class="zz">
				<hr width="1180">
				<h4>实付金额:<?php echo ($newmoney); ?></h4>
				<div class="a">
				<a href="<?php echo U('Home/Purse/insert',array('money'=>$money));?>"><p>确认并付款</p></a>
				<span style="color:red;display:none;">首冲享受8折优惠哦,亲!</span>
				</div>
			</div>
			<script type="text/javascript">
				$('.wy').find('h3').click(function(){
					$('.zf').css('display','block');
				})
				$('.wy').find('h3').dblclick(function(){
					$('.zf').css('display','none');
					$('.wy hr').css('dispaly','block');
				})
				
				$('.z1').click(function(){
					$(this).css({border:'1px solid blue'});
					$(this).siblings().css({border:''});
				})
				$(window).load(function(){
					$.ajax({
						url:'select',//请求url
						dataType:'json',//返回的数据类型
						type:'get',//请求的方式
						success:function(data){
							if(data == 0){
								$('.a span').css('display','block');
							}else{
								
							}
						},
						timeout:3000,//请求超时时间,如果是同步的请求,没有效果
						//是否异步 
						async:false,
						error:function(){
							//出现错误时 执行
							alert('出错啦 思密达');
						}
					});
				})
			</script>
			
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
</body>
</html>