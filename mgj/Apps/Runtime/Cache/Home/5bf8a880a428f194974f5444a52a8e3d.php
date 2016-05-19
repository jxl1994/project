<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>蘑菇街 -我的买手街-</title>
		
		<link rel="stylesheet" href="/Public/Home/css/public.css">
		<link href="/Public/Home/css/detail.css" rel="stylesheet"/>
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
			<li><a href="<?php echo U('Home/Order/index');?>"><img src="/Public/Home/images/tb1.png" class="tb1"> 我的订单</a><span>|</span></li>
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
	
	<link href="/Public/Home/css/detail.css" rel="stylesheet"/>
	<?php if(is_array($list)): foreach($list as $key=>$row): ?><div class="main">
		<!-- 显示大图 -->
		<div class="left1">
			<div id="small">
				<img src="/Public/<?php echo ($row["pic"]); ?>" alt=""class="bimg">
				<div id="move"style="background: url('/Public/Home/images/fdj_bg.png')"></div>
			</div>
			<div id="big"><img src="/Public/<?php echo ($row["pic"]); ?>" alt="" id="dimg"></div>

			<!-- 细节小图 -->
			<div class="left2">
				<?php if(is_array($gimg)): foreach($gimg as $key=>$img): ?><div class="gimg"><img src="/Public/<?php echo ($img["minpic"]); ?>" alt=""></div><?php endforeach; endif; ?>
			</div>
		</div>

		<!-- 右侧 -->
		<div class="right">
			<!-- 标题 -->
			<div class="title"><?php echo ($row["name"]); ?></div>
			<!-- -->
			<!-- 背景图 -->
			<div class="price" style="background: url('/Public/Home/images/det_bg.png');">
				<div class="price1"><font color="#ccc" size="4px">价&nbsp;&nbsp;格：<font></div>
				<?php
 if(!empty($zhekou)){ ?>
						<div class="price2"  style='text-decoration: line-through;' ><font color="rgba(135, 134, 134, 0.94)" size="2">￥<?php echo ($row["price"]); ?></font></div>
					
				<?php
 }else{ ?>
						<div class="price2"  ><font color="rgba(135, 134, 134, 0.94)" size="2">￥<?php echo ($row["price"]); ?></font></div>	
				<?php  } ?>	
				<?php  if(!empty($zhekou)){ ?>		
					<div class="price1"><font color="#EF2F23" size="2"><b>全场<?php echo ($zk); ?>折</b><font></div>
					<div class="price1 xj"><font color="#999" size="4">现&nbsp;&nbsp;价：<font></div>
					<div class="price2 xj"><font color="#EF2F23" size="4">￥<?php echo ($zhekou); ?></font></div>
				<?php
 } ?>
				<div style="clear:both"></div>

				<div class="price3">
					<font color="#999" size="2">店铺优惠:全店满两件减三元</font>
				</div>
			</div>

			<!-- 款式 -->
			<div class="sty">
				<div class="sty_name">款式：</div>
				<?php if(is_array($gimg)): foreach($gimg as $key=>$img): ?><div class="sty1">
				
					<div class="ks"><img src="/Public/<?php echo ($img["minpic"]); ?>" width="100%"></div>
				
				</div><?php endforeach; endif; ?>
			</div>
			<div style="clear:both"></div>

			<!-- 尺码 -->
			<div style="size">
				<div class="size_name">商品描述：<?php echo ($row["detail"]); ?></div>
				<!-- <div class="size1"><a href="">S</a></div>
				<div class="size2"><a href="">M</a></div>
				<div class="size3"><a href="">L</a></div> -->
			</div>
			<div style="clear:both"></div>
			<!-- 库存 -->
			<div style="size">
				<div class="size_name">库存：<?php echo ($row["num"]); ?></div>
				<!-- <div class="size1"><a href="">S</a></div>
				<div class="size2"><a href="">M</a></div>
				<div class="size3"><a href="">L</a></div> -->
			</div>
			<div style="clear:both"></div>
			<!-- 立即购买 -->
			<div class="buy">
				<div class="but1"><a lj="/Home/Cart/add/id/<?php echo ($row["gid"]); ?>">立即购买</a></div>
				<div class="but2"><a lj="/Home/Cart/add/id/<?php echo ($row["gid"]); ?>">加入购物车</a></div>
			</div>
			<div style="clear:both"></div>
			
			<!-- 收藏 -->
			<?php if(is_array($sc)): foreach($sc as $key=>$count): ?><div class="sc">
				<div class="sc1" goodsid="<?php echo ($row["gid"]); ?>" sc="0">
					<a lj="/Home/Shoucang/add/id/<?php echo ($row["gid"]); ?>"><div class="sc2"><img src="/Public/Home/images/sc.png" alt=""><span class="count"><?php echo ($count["count(*)"]); ?></span></div></a>
				</div>
			</div><?php endforeach; endif; endforeach; endif; ?>
			<div class="bdsharebuttonbox">
				<div class="fx">
			      <a href="#" class="bds_more" data-cmd="more"></a>
			      <a href="#" class="bds_qzone" data-cmd="qzone"></a>
			      <a href="#" class="bds_tsina" data-cmd="tsina"></a>
			      <a href="#" class="bds_tqq" data-cmd="tqq"></a>
			      <a href="#" class="bds_renren" data-cmd="renren">
			      </a><a href="#" class="bds_weixin" data-cmd="weixin"></a>
				</div>
		    </div>
			<div style="clear:both"></div>
			</foreach>
			<!-- 商品特色 -->
			<div class="ts">
				<div class="ts1">商品特色：</div>
				<div class="ts2"><img src="/Public/Home/images/rz.png" alt=""></div>
				<div class="ts3">品质认证</div>
			</div>
			<div style="clear:both"></div>
				<!-- 库存 -->
			<div style="size">
				<div class="size_name"><div class="cn">服务承诺：</div><div class="cn_img"><img src="/Public/Home/images/jt.png" ></div></div>
				
			</div>
			<!-- 支付方式 -->
			<div class="zf">
				<div class="zf1">支付方式；</div>
				<div class="zf2"><img src="/Public/Home/images/fs.png" alt=""></div>
			</div>
		
		</div>
			<!-- 商品评价 -->
			<div class="pj">
				<div class="pj_head">
					<h3>全部评价</h3>
				</div>
				<table width="1000"class="bg">
				 <?php if(is_array($pingjia)): foreach($pingjia as $key=>$pj): ?><tr>
						<td width="100px"><div class="pj_img">
						<?php if($pj["pic"] == null): ?><img src="/Public/Home/images/kong_img.jpg" alt="">
						<?php else: ?>
							<img src="/Public/<?php echo ($pj["pic"]); ?>" alt=""><?php endif; ?>
						<span><?php echo ($pj["username"]); ?></span></div></td>
						<td class="content"style="word-wrap:break-word;"width="800px">
							<div class="pj_status"><?php echo ($pj["status"]); ?></div>
							<div class="pj_con"><?php echo ($pj["content"]); ?></div>
							<div class="time"><?php echo ($pj["time"]); ?></div>
						</td>
					</tr><?php endforeach; endif; ?>
					<tr ><td style="padding-left:15px"><?php echo ($empty); ?></td></tr>
				
				</table>
			</div>
	</div>
	<!-- 弹框 -->
	<div id="win">
		<div class="all">
			<div class="h">
				<b>登录蘑菇街</b>
				<a href="javascript:closeLogin();">
					<span class="close">×</span>
				</a>
			</div>
			<div class="main">
				<table>
					<form action="<?php echo U('Home/User/tklogin');?>"method="post">
					 <?php if(is_array($list)): foreach($list as $key=>$vo): ?><input type="hidden" name="goodsid" value="<?php echo ($vo["gid"]); ?>"><?php endforeach; endif; ?>
						<tr><td class="ptdl">普通登录</td></tr>
						<tr>
							<td><input type="text" name="username" class="yhm" placeholder="用户名"></td>
						</tr>
						<tr>
							<td><input type="password" name="password"placeholder="密码" class="mm"></td>
						</tr>
						<tr>
							<td height="50" ><input type="submit" value="用户登录" class="dl"><span class="zc"><a href="<?php echo U('Home/User/zhuce');?>">新用户注册</a></span></td>
							
						</tr>
					</form>
				</table>
				<center>
					<span class="kj">快捷登录:</span>
					<a href=""><img src="/Public/Home/images/qq_login.gif" class="tp"></a>
					<a href=""><img src="/Public/Home/images/wx_login.png" class="tp"></a>
				</center>
			</div>
		</div>
</div>
<script type="text/javascript"src="/Public/Home/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript"src="/Public/Home/js/detail.js"></script>
	 <script>
	window._bd_share_config = {
		common : {
			bdText : '自定义分享内容',	
			bdDesc : '自定义分享摘要',	
			bdUrl : '自定义分享url地址', 	
			bdPic : '自定义分享图片'
		},
		share : [{
			"bdSize" : 16
		}],
		slide : [{	   
			bdImg : 0,
			bdPos : "right",
			bdTop : 100
		}],
		
		selectShare : [{
			"bdselectMiniList" : ['qzone','tqq','kaixin001','bdxc','tqf']
		}]
	}
	with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
<script type="text/javascript">
	// alert($);
	//绑定移动事件
	$('#small').mouseover(function(e){
		$('#move').css('display','block');
		$('#big').css('display','block');
		var x = e.pageX;
		// console.log(x);
		var y = e.pageY;
		//获取small的xy
		var _l = $('#small').offset().left;
		// console.log(_l);
		var _t = $('#small').offset().top;
		// console.log(_t);
		//计算小div宽高的一半
		var _w = $('#move').width()/2;
		// console.log(_w);
		var _h = $('#move').height()/2;
		// console.log(_h);
		//计算新的left和top
		var newL = x - _l - _w;
		var newT = y - _t - _h;
		//检测越界
		if(newL <= 0){newL = 0;}
		if(newT <= 0){newT = 0;}
		//获取最大的left
		var maxLeft = $('#small').width()-$('#move').width();
		if(newL >= maxLeft){
			newL = maxLeft;
		}
		// 获取最大的top
		var maxTop = $('#small').height()-$('#move').height();
		if(newT >= maxTop){
			newT = maxTop;
		}
		//设置left和top
		var nel = newL + 'px';
		var net = newT + 'px';
		$('#move').css('left',nel);
		$('#move').css('top',net);

		//计算移动比例
		sW = $('#small').width();
		sH = $('#small').height()
		var xp = newL/sW;
		// console.log(xp);
		var yp = newT/sH;
		// console.log(yp);
		//计算右侧图片移动距离
		var nl = $('#dimg').width() * xp;
		var nt = $('#dimg').height() * yp;
		//设置移动
		var bnl = -nl + 'px';
		var bnt = -nt + 'px';
		$('#dimg').css('left',bnl);
		$('#dimg').css('top',bnt);

		//计算小图的宽高
		var bp = $('#big').width()/$('#dimg').width();
		var bpp = $('#big').height()/$('#dimg').height();

		//计算小图的宽度
		var mW = $('#small').width() * bp;
		var mH = $('#small').height() * bpp;
		//设置小图的宽度
		mwidth = mW + 'px';
		mheight = mH + 'px';
		$('#move').css('width',mwidth);
		$('#move').css('height',mheight);
	})
	//绑定鼠标离开事件
	$('#small').mouseout(function(){
		//隐藏小div和右侧的图
		$('#move').css('display','none');
		$('#big').css('display','none');
	})


	//获取元素
		//从ul标签中获取img
		var limg = $('.gimg').find('img');
		//遍历
		for (var i = 0; i < limg.length; i++) {
			limg[i].onclick = function(){
				//获取当前src属性
				var src = this.getAttribute('src');
				// alert(src);
				//设置src属性
				$('#dimg').attr('src',src);
				$('.bimg').attr('src',src);
			}
		};
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