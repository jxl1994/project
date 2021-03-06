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
				
				<div class="fl_all">全部商品</div>
				
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
	
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css">
	

	<script type="text/javascript" src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
		$(function(){


		//定义全局变量
		var i = 0;
		//无缝第一步 克隆第一张图片
		var cloneimg = $('.banner .img li').first().clone();
		
		//插入进去 克隆第二步
		$('.banner .img').append(cloneimg);
		//获取图片的个数
		var length = $('.banner .img li').length;
		// console.log(length);

		// 启动定时器
		var inte = setInterval(moveR,2000);
		//鼠标悬停事件
		$('.banner').hover(function(){
			//鼠标移入以后 清除定时器
			clearInterval(inte);
		},function(){
			//启动轮播
			inte = setInterval(moveR,2000);
		})

		//给小圆点绑定鼠标滑入事件
		$('.banner .num li').hover(function(){
			//获取当前小圆点的索引
			var index = $(this).index();
			i = index;
			//计算新left
			newLeft = i*715;
			//设置样式
			$('.banner .img').animate({left:-newLeft+'px'},500);
			//在方法中移动园点 class="on"
			$('.banner .num li').eq(i).addClass('on').siblings().removeClass();
		})

		// 绑定向右移动事件
		$('.btn_r').click(function(){
			moveR();
			// console.log(i);
			// console.log(length);
		})
		// 绑定向左移动事件
		$('.btn_l').click(function(){
			moveL();
		})
		// 封装向右移动的方法
		function moveR(){
			i++;
			//检测越界
			if(i == length){
				// i = 0;//不能等于0 无缝第三步
				$('.banner .img').css({left:0});

				//把i改成1
				i = 1;
			}
			//计算新left
			newLeft = i*715;
			//修复bug
			if(i == length-1){
				$('.banner .num li').eq(0).addClass('on').siblings().removeClass();
			}else{
				$('.banner .num li').eq(i).addClass('on').siblings().removeClass();
			}
			//设置样式 //stop是为了运行更流畅
			$('.banner .img').stop().animate({left:-newLeft+'px'},500);
			//在方法中移动园点 class="on"
		}
		// 封装向左移动的方法
		function moveL(){
			i--;
			//检测越界
			if(i == -1){
				// i = length-1;
				//第四步
				$('.banner .img').css({left:-(length-1)*715});
				i = length-2;
			}
			//计算新left
			newLeft = i*715;
			//设置样式
			$('.banner .img').stop().animate({left:-newLeft+'px'},500);
			//在方法中移动园点 class="on"
			$('.banner .num li').eq(i).addClass('on').siblings().removeClass();
		}
	})		
		
	</script>

	<div class="c"></div>
	<div class="center">
		<div class="c1">
		<!-- 商品分类 -->
			<div class="c1_fl">
				<?php if(is_array($list[0])): foreach($list[0] as $key=>$vo): ?><dl>
						<dd>
						<h3><a href="<?php echo U('Home/list/lb',array('id' =>$vo['id']));?>"><?php echo ($vo["catename"]); ?></a></h3>
						</dd>
						<?php if(is_array($list[$vo['id']])): foreach($list[$vo['id']] as $key=>$vo2): ?><dd>
							<a href="<?php echo U('Home/List/lb',array('id' =>$vo2['id']));?>" style="color:red;"><?php echo ($vo2["catename"]); ?></a>
							</dd><?php endforeach; endif; ?>
					</dl><?php endforeach; endif; ?>
			</div>
			<!-- 轮播图 -->
			<div class="c1_lb banner">
				<ul class="img">
					<?php if(is_array($res)): foreach($res as $key=>$vo): ?><li><a href="<?php echo U('Home/Activity/index',array('id'=>$vo['id']));?>"><img src="/Public<?php echo ($vo["pic"]); ?>" alt=""></a></li><?php endforeach; endif; ?>
				</ul>
					<div class="btn btn_l">&lt;</div>
					<div class="btn btn_r">&gt;</div>
					<ul class="num">
						<li class="on"></li>
						<li ></li>
						<li ></li>
						<li ></li>
						<li ></li>


					</ul>
			</div>
			<!-- 右侧图片 -->
			<div class="c1_img">
				<div class="c1_img1">
					<a href=""><img src="/Public/Home/images/c1_img1.jpg" alt=""></a>
				</div>
				<a href=""><img src="/Public/Home/images/c1_img2.jpg" alt=""></a>
			</div>
		</div>
		<!-- 精品 -->
		<div class="c2">
			<div class="c2_head">
				<div class="c2_head_left">
					<img src="/Public/Home/images/c2_head.png" alt="">
				</div>
				<div class="c2_head_center">
					精品馆
				</div>
				<div class="c2_head_right">
					<img src="/Public/Home/images/c2_head.png" alt="">
				</div>
			</div>
			<div class="c2_goods">
				<div class="c2_goods_left">
					<div class="c2_goods_lt">
						<a href=""><img src="/Public/Home/images/c2_lt.jpg" alt=""></a>
					</div>
					<div class="c2_goods_lb">
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb1.png" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb2.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb3.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb4.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb5.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb6.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb7.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb8.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="c2_bimg">
					<img src="/Public/Home/images/c2_bimg.jpg" alt="">
				</div>
				<div class="c2_goods_r">
				<?php if(is_array($goods1)): foreach($goods1 as $key=>$vo): ?><div class="c2_goods_r1">
						<div class="rl_img"><a href="<?php echo U('Home/Detail/index',array('id'=>$vo['id']));?>"><img src="/Public/<?php echo ($vo["pic"]); ?>" alt=""></div>
						<p><?php echo ($vo["name"]); ?></p>
						</a>
					</div><?php endforeach; endif; ?>	
				</div>
			</div>
		</div>
		<!-- 新品 -->
		<div class="c2">
			<div class="c2_head">
				<div class="c2_head_left">
					<img src="/Public/Home/images/c2_head.png" alt="">
				</div>
				<div class="c2_head_center">
					热销馆
				</div>
				<div class="c2_head_right">
					<img src="/Public/Home/images/c2_head.png" alt="">
				</div>
			</div>
			<div class="c2_goods">
				<div class="c2_goods_left">
					<div class="c2_goods_lt">
						<a href=""><img src="/Public/Home/images/c2_lt2.jpg" alt=""></a>
					</div>
					<div class="c2_goods_lb">
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb1.png" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb2.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb3.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb4.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb5.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb6.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb7.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb8.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="c2_bimg">
					<img src="/Public/Home/images/c2_bimg2.jpg" alt="">
				</div>
				<div class="c2_goods_r">
				<?php if(is_array($goods2)): foreach($goods2 as $key=>$vo): ?><div class="c2_goods_r1">
						<div class="rl_img"><a href="<?php echo U('Home/Detail/index',array('id'=>$vo['id']));?>"><img src="/Public/<?php echo ($vo["pic"]); ?>" alt=""></div>
						<p><?php echo ($vo["name"]); ?></p>
						</a>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
		</div>
		<!-- 热销 -->
		<div class="c2">
			<div class="c2_head">
				<div class="c2_head_left">
					<img src="/Public/Home/images/c2_head.png" alt="">
				</div>
				<div class="c2_head_center">
					新品馆
				</div>
				<div class="c2_head_right">
					<img src="/Public/Home/images/c2_head.png" alt="">
				</div>
			</div>
			<div class="c2_goods">
				<div class="c2_goods_left">
					<div class="c2_goods_lt">
						<a href=""><img src="/Public/Home/images/c2_lt3.png" alt=""></a>
					</div>
					<div class="c2_goods_lb">
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb1.png" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb2.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb3.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb4.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb5.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb6.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img1">
							<a href=""><img src="/Public/Home/images/c2_lb7.jpg" alt=""></a>
						</div>
						<div class="c2_goods_img2">
							<a href=""><img src="/Public/Home/images/c2_lb8.jpg" alt=""></a>
						</div>
					</div>
				</div>
				<div class="c2_bimg">
					<img src="/Public/Home/images/c2_bimg3.png" alt="">
				</div>
				<div class="c2_goods_r">
				<?php if(is_array($goods3)): foreach($goods3 as $key=>$vo): ?><div class="c2_goods_r1">
						<div class="rl_img"><a href="<?php echo U('Home/Detail/index',array('id'=>$vo['id']));?>"><img src="/Public/<?php echo ($vo["pic"]); ?>" alt=""></div>
						<p><?php echo ($vo["name"]); ?></p>
						</a>
					</div><?php endforeach; endif; ?>
				</div>
			</div>
		</div>
		<!-- 友情链接 -->
		<div class="c"></div>
		<div class="friendlink">
			<h3>友情链接:<h3>
		<?php if(is_array($links)): foreach($links as $key=>$vo): ?><tr class="gradeA odd" role="row">
                <td class="sorting_1"><a href="http://<?php echo ($vo["address"]); ?>"><img src="/Public/<?php echo ($vo["logo"]); ?>" width="50px" style="padding-top:-10px;padding-left:60px;"></a></td>  
            </tr><?php endforeach; endif; ?>
		</div>
		<!-- 搜索 -->
		<div class="ss">
			<div class="ss_logo">
				<img src="/Public/Home/images/ss_logo.png" alt="">
			</div>
			<div class="ss_left">
                <span class="selected">搜商品</span>
            </div>
            <form action="">
            	<input type="search" class="search">
            	<button><img src="/Public/Home/images/ss.png" alt=""></button>
            </form>
		</div>
		<script type="text/javascript"src="/Public/Home/js/ss.js"></script>
	</div>

<script>
$(function (){
$('.adver').animate({right:'10px',bottom:'-50px'},1000);
$('.c').click(function(){
   $('.adver').hide();
   $('.c img').hide();
});
});
$(function(){
	$('.c').animate({right:'10px',bottom:'-50px'},1000);
});
</script>
<div class="c">
	<img src="/Public/Home/images/577.png" alt="">
</div>
<div class="banner adver">
	<ul class="imgs">
	<?php if(is_array($advers)): foreach($advers as $key=>$vo): ?><a href="http://<?php echo ($vo["address"]); ?>"><img src="/Public/<?php echo ($vo["logo"]); ?>" alt=""></a><?php endforeach; endif; ?>
	</ul>
</div>
<!-- 广告轮播 -->
	
	</div>
	<script type="text/javascript">
		//定义全局变量
		var i = 0;
		//无缝第一步 克隆第一张图片
		var cloneimg = $('.adver').find('img:first').clone();
		//插入进去 克隆第二步
		$('.adver .imgs').append(cloneimg);
		//获取图片的个数
		var length = $('.adver .imgs img').length;
		console.log(length);

		// 启动定时器
		var inte = setInterval(moveR,3000);
		//鼠标悬停事件
		$('.adver').hover(function(){
			//鼠标移入以后 清除定时器
			clearInterval(inte);
		},function(){
			//启动轮播
			inte = setInterval(moveR,3000);
		})

		// 封装向右移动的方法
		function moveR(){
			i++;
			//检测越界
			if(i == length){
				// i = 0;//不能等于0 无缝第三步
				$('.adver .imgs').css({left:0});
				//把i改成1
				i = 1;
			}
			//计算新left
			newLeft = i*220;
			//设置样式 //stop是为了运行更流畅
			$('.adver .imgs').stop().animate({left:-newLeft+'px'},500);
			//在方法中移动园点 class="on"
		}
	</script>
	
	<script type="text/javascript">
		$('.adver').mouseover(function(){
			$('.c img').css('display','block');
			
		})
	</script>

	<!-- 公告 -->
	<script type="text/javascript" src="/Public/Home/css/index.css"></script>
	
		<div class="main" style="background:rgb(251,251,248)">
		  <div class="main2"><a href="javascript:" class="bar" style="background:url(/Public/Home/images/mini_bg.png)"></a>
		    <div id="demo" class="conter">
			     <div id="demo1">
			     <?php if(is_array($notices)): foreach($notices as $key=>$vo): ?><a href="http://www.mogujie.com/"><?php echo ($vo["content"]); ?></a><?php endforeach; endif; ?>
				</div>
				<div id="demo2"></div>
			</div>
		  </div>
		</div>
	<script type="text/javascript" src="/Public/Home/js/notice.js"></script>	


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