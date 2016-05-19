<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>蘑菇街 -我的买手街-</title>
		<link href="/Public/Home/css/Personal.css" rel="stylesheet"/>
		<link href="/Public/Home/css/photo.css" rel="stylesheet"/>
		 <link href="/Public/Home/css/order.css" rel="stylesheet"/>
		<link href="/Public/Home/css/bootstrap.css" rel="stylesheet"/>
		<link rel="icon" href="/Public/Home/images/logo.ico">
		<link rel="stylesheet" href="/Public/Home/css/public.css">

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
	
	<!-- <form role="form" method="post" action="<?php echo U('Home/User/insert');?>" enctype="multipart/form-data"> -->
	<!-- <link href="/Public/Home/css/Personal.css" rel="stylesheet"/>
	<link href="/Public/Home/css/photo.css" rel="stylesheet"/>
	<link href="/Public/Home/css/bootstrap.css" rel="stylesheet"/> -->
	<!-- 个人信息主体页面 -->
	<div class="main">
		<!-- <img src="/Public/Home/images/bg-v3.png" alt="" class="bg"> -->
		<!-- 左 -->
		<div class="left">
			<div class="left1">
				
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
				<!-- <dl class="menu">
					<p>维权管理</p>
					<dd><a href="">投诉管理</a></dd>
					<dd><a href="">举报管理</a></dd>
					<dd><a href="">被盗管理</a></dd>
				</dl> -->
				<dl class="menu">
					<p>账号设置</p>
					<dd><a href="<?php echo U('Home/personal/index');?>">基本信息</a></dd>
					<dd><a href="<?php echo U('Home/personal/photo');?>">修改头像</a></dd>
					<dd><a href="<?php echo U('Home/personal/update');?>">修改密码</a></dd>
				</dl>

			</div>
			<!-- <div style="clear:both"></div> -->
			<div class="right">
			<div class="ziliao">
				<span>地址管理</span>
			</div><br/><br/>

			<div class="dizhi" style="margin-left:100px;"><a href="<?php echo U('Home/Address/index');?>">添加地址</a>&nbsp;&nbsp;<a href="<?php echo U('Home/Myorder/index');?>">返回订单列表</a></div><br>

			<!-- 右边 -->
				<!-- <div id="new-address" style="margin-left:100px;"><a href="" class="btn btn-info" >添加新地址</a> -->
				    <div class="row">
             <div class="col-sm-12">
                 <table id="dataTables-example" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dataTables-example_info" width="400">
                    <thead>
                        <tr role="row" align="center">
                           <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width:37px;" aria-label="Browser: activate to sort column ascending">会员</th>
                          
                           <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 20px;" aria-label="CSS grade: activate to sort column ascending">联系人</th>
                           <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 30px;" aria-label="CSS grade: activate to sort column ascending">地址</th>
                           <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 37px;" aria-label="CSS grade: activate to sort column ascending">联系电话</th>
                            <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" style="width: 60px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                       </tr>
                   </thead>
                   <tbody>
                    <!-- 这是地址的遍历 -->
                    <?php if(is_array($info)): foreach($info as $key=>$vo): ?><tr>
                            <td class="sid"><?php echo ($vo["uid"]); ?></td>
                            <td class="sid"><?php echo ($vo["linkman"]); ?></td>
                            <td class="sid"><?php echo ($vo["address"]); ?></td> 
                            <td class="sid"><?php echo ($vo["phone"]); ?></td> 
                    <td><a href="/Home/Address/edit/id/<?php echo ($vo["id"]); ?>">编辑  |  
                    	<a href="/Home/Address/del/id/<?php echo ($vo["id"]); ?>"> 删除</a>
						<!-- <input type="text" disabled class="form-control addr" value="<?php echo ($vo['address']); echo ($vo['linkman']); ?> <?php echo ($vo['phone']); ?>" aria-label="...">
					      	<button name="<?php echo ($vo['uid']); ?>" class="btn btn-primary setDefault">设为默认</button> -->
						

                    	 </td>
                        </tr><?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
    </div>

			


			</div>
		 	<!-- <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" class="btn btn-default sure">确认修改</button>
			    </div>
		  	</div>
 -->
	 	
			</div>	
			</div>
		</div>	


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