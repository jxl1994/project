<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="/Public/Home/css/public.css">
	<link rel="stylesheet" href="/Public/Home/css/index.css">
	<link rel="icon" href="/Public/Home/images/logo.ico">
	
  <title>确认订单</title>

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
	

	
	<!-- 中间 -->
	<div class="c"></div>
	
  <link rel="stylesheet" href="/Public/Home/css/dd.css">
  <div id="quan">
    <div class="tou">
      <div class="logo"><a href="<?php echo U('Home/Index/index');?>"><img src="/Public/Home/images/c.png" alt=""></div></a>
      <div class="bu" style="background:url('/Public/Home/images/dd.png');"></div>
    </div>
    
    <form method="post" action="<?php echo U('Home/Myorder/insert');?>" >
    <div class="spbiao">
      <div class="cart_goods">
      <!-- 收货地址 -->
      <div class="dizhi">
        <div class="dzhead">
          选择收货地址
        </div>
        <div>
          <a href="<?php echo U('Home/Address/detail');?>">编辑地址</a>
        </div></br>
        
        
        <div class="dz1">
          <?php if(is_array($info2)): foreach($info2 as $key=>$vo): ?><div class="dz2"style="background: url('/Public/Home/images/dzbg1.png');">
            <div class="dz_name">
              <input type="radio" value="<?php echo ($vo["id"]); ?>" name="address"><span><?php echo ($vo["linkman"]); ?></span>
            </div>
            <div class="dz_ad">
              <span><?php echo ($vo["address"]); ?></span>
            </div>
            <div class="dz_phone">
              <?php echo ($vo["phone"]); ?>
            </div>
          </div><?php endforeach; endif; ?> 

        </div>

      </div>
      <!-- 确认商品信息 -->
      <div class="sp">
        确认商品信息
      </div>
        <table cellspacing="1" width="100%" class="table" >
          <tr height="49px" class="b1"align="center">
            <td width="120px">商品编号</td>
            <td>商品图片</td>
            <td>商品名称</td>
            <td>单价(元)</td>
            <td>数量</td>
            <td>小计(元)</td>
            <!-- <td>操作</td> -->
          </tr>
          <?php if(is_array($cart)): foreach($cart as $key=>$vo): ?><!-- <foreach name="info1" item="vo" >   -->
            <tr height="113px" class="b2"align="center">
              <td class="sid"><?php echo ($vo["id"]); ?></td>
              <td class="img"><img src="/Public<?php echo ($vo["pic"]); ?>" alt=""></td>
              <td><?php echo ($vo["name"]); ?></td>
              <td class="price"><?php echo ($vo["price"]); ?></td>
              <td><span><?php echo ($vo["gnum"]); $znum += $vo['gnum'] ?></span></td>
              <td class="xj"><?php  $xj=$vo['price']*$vo['gnum']; $total += $xj; echo $xj; ?></td>
            </tr><?php endforeach; endif; ?>
          <tr height="50px" align="center" class="zj">
            <!-- <td><p style="cursor:pointer" class="qingkong">清空购物车</p></td> -->
            <td align="center"><a href=""></a></td>
            <td colspan="5" align="right">配送方式：
            <select name="way" id="way">
              <option value="顺丰">顺丰</option>
              <option value="申通">申通</option>
              <option value="EMS">EMS</option>
            </select>&nbsp;&nbsp;
            总计:&nbsp;&nbsp;<span class="jiage">¥ </span><span class="jiage total"><?php echo $total;?></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="hidden" name="total" value="<?php echo $total;?>">
            <input type="submit" class="qfk" value="确认并付款"></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  </form>
  <script type="text/javascript"src="/Public/Home/js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript">
    $(function(){
      $('.dz2').mouseover(function(){
        // alert('111');
        $(this).css({background:'url("/Public/Home/images/dzbg.png")'});
      })
      $('.dz2').mouseout(function(){
        // alert('111');
        $(this).css({background:'url("/Public/Home/images/dzbg1.png")'});
      })
      $('.dz2').find('input').click(function(){
        $(this).parents('.dz2').unbind("mouseover");
        $(this).parents('.dz2').unbind("mouseout");
        $(this).parents('.dz2').css({background:'url("/Public/Home/images/dzbg2.png")'});
        $(this).parents('.dz2').siblings().css({background:'url("/Public/Home/images/dzbg1.png")'});
      })
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