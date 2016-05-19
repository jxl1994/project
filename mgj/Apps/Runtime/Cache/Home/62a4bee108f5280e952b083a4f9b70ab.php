<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>蘑菇街 -我的买手街-</title>
		<link href="/Public/Home/css/personal.css" rel="stylesheet"/>
		<link href="/Public/Home/css/bootstrap.css" rel="stylesheet"/>
		
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
	
	<!-- <form role="form" method="post" action="<?php echo U('Home/User/insert');?>" enctype="multipart/form-data"> -->
	<link href="/Public/Home/css/personal.css" rel="stylesheet"/>
	<link href="/Public/Home/css/bootstrap.css" rel="stylesheet"/>
<?php
 session_start(); ?>
	<div class="main">
		<!-- <img src="/Public/Home/images/bg-v3.png" alt="" class="bg"> -->
		<!-- 左 -->
		<foreach name="list" item="row">
		<div class="left">
			<div class="left1">
				<!-- 头像 -->
					<div class="tx"><img src="/Public/<?php echo ($pic); ?>" width="80px" height="80px" class="tx_pic"></div>
				<!-- 用户名 -->
					<span class="name" value="checked"><?php echo ($_SESSION['username']); ?></span>
					<!-- 隐藏域 -->
					<input type="hidden" name="username" value="<?php echo ($_GET['username']); ?>">
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
					<!-- <p><a href="">我的理财</a></p> -->
					<p><a href="<?php echo U('Home/History/history');?>">我的足迹</a></p>
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
					<dd><a href="<?php echo U('Home/personal/xgmm');?>">修改密码</a></dd>
				</dl>

			</div>
			<!-- <div style="clear:both"></div> -->
			<div class="right">
			<div class="ziliao">
				<span>基本资料</span>
			</div><br/><br/>
				<!-- 个人信息填写 -->
				<div class="info">
				<form action="<?php echo U('Home/Personal/insert');?>" method="post"  role="form">
					<div class="form-group">
						<input type="hidden" name="id" value="<?php echo ($_SESSION['username']); ?>"/>
						<!-- <input type="hidden" name="username" value="<?php echo ($_GET['username']); ?>"/> -->
				    	<label for="inputEmail3" class="col-sm-2 control-label name1">&nbsp;&nbsp;昵称:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control set-name" id="inputEmail3" name="username" placeholder="<?php echo ($list['username']); ?>" value="<?php echo ($_SESSION['username']); ?>" style="width:200px;" disabled>
				    	</div>
				 	</div>
				 	<div style="clear:both"></div>

				 	<div class="form-group">
				    	<label for="inputEmail3" class="col-sm-2 control-label name2">&nbsp;&nbsp;性别：</label>
				    	<div class="col-sm-2">
				      		<div class="checkbox" style="margin-top:20px;">
					       		<label>
						            <input type="radio" name="sex" value="女" <?php if($list['0']['sex']=="女"){echo 'checked';}?> checked>女&nbsp;&nbsp;
						            <input type="radio" name="sex" value="男" <?php if($list['0']['sex']=="男"){echo 'checked';}?>>男
					       		</label>
				      		</div>
				    	</div>
				    	<div style="clear:both"></div>

				    <!-- 	<div class="form-group">
				    	<label for="inputEmail3" class="col-sm-2 control-label name3">&nbsp;&nbsp;个人博客:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control set-name" id="inputEmail3" name="name" placeholder="" value="" style="width:300px;">
				    	</div>
				 	</div> -->

				 	<!-- 所在地 -->
				 	<div class="place">
				 	<div class="place1">所在地:&nbsp;&nbsp;</div>
				 		<select name="address" id="" class="place2" style="width:100px" value="selected">
				 			<option value="请选择">请选择</option>
				 			<option value="上海" <?php if($list['0']['address']=="上海"){echo 'selected';}?>>上海</option>
				 			<option value="江苏" <?php if($list['0']['address']=="江苏"){echo 'selected';}?>>江苏</option>
				 			<option value="湖南" <?php if($list['0']['address']=="湖南"){echo 'selected';}?>>湖南</option>
				 			<option value="湖北" <?php if($list['0']['address']=="湖北"){echo 'selected';}?>>湖北</option>
				 		</select>&nbsp;&nbsp;
				 		<select name="address1" id="" style="width:100px">
				 			<option value="请选择">请选择</option>
				 			<option value="杭州" <?php if($list['0']['address1']=="湖北"){echo 'selected';}?>>杭州</option>
				 			<option value="南京" <?php if($list['0']['address1']=="南京"){echo 'selected';}?>>南京</option>
				 			<option value="长沙" <?php if($list['0']['address1']=="长沙"){echo 'selected';}?>>长沙</option>
				 			<option value="武汉" <?php if($list['0']['address1']=="武汉"){echo 'selected';}?>>武汉</option>
				 		</select>	
					</div>
					<div style="clear:both"></div>

					<!-- 生日 -->
					<div class="birthday">
						<div class="birth1">生日:&nbsp;&nbsp;</div>
						<select name="birthday" id="" class="birth2">
							<option value="请选择">请选择</option>
							<option value="1999" <?php if($list['0']['birthday']=="1999"){echo 'selected';}?>>1999</option>
							<option value="1998" <?php if($list['0']['birthday']=="1998"){echo 'selected';}?>>1998</option>
							<option value="1997" <?php if($list['0']['birthday']=="1997"){echo 'selected';}?>>1997</option>
							<option value="1996" <?php if($list['0']['birthday']=="1996"){echo 'selected';}?>>1996</option>
							<option value="1995" <?php if($list['0']['birthday']=="1995"){echo 'selected';}?>>1995</option>
							<option value="1994" <?php if($list['0']['birthday']=="1994"){echo 'selected';}?>>1994</option>
						</select>&nbsp;年&nbsp;&nbsp;
						<select name="birthday1" id="">
							<option value="请选择">请选择</option>
							<option value="1" <?php if($list['0']['birthday1']=="1"){echo 'selected';}?>>1</option>
                            <option value="2" <?php if($list['0']['birthday1']=="2"){echo 'selected';}?>>2</option>
                            <option value="3" <?php if($list['0']['birthday1']=="3"){echo 'selected';}?>>3</option>
                            <option value="4" <?php if($list['0']['birthday1']=="4"){echo 'selected';}?>>4</option>
                            <option value="5" <?php if($list['0']['birthday1']=="5"){echo 'selected';}?>>5</option>
                            <option value="6" <?php if($list['0']['birthday1']=="6"){echo 'selected';}?>>6</option>
                            <option value="7" <?php if($list['0']['birthday1']=="7"){echo 'selected';}?>>7</option>
                            <option value="8" <?php if($list['0']['birthday1']=="8"){echo 'selected';}?>>8</option>
                            <option value="9" <?php if($list['0']['birthday1']=="9"){echo 'selected';}?>>9</option>
                            <option value="10" <?php if($list['0']['birthday1']=="10"){echo 'selected';}?>>10</option>
                            <option value="11" <?php if($list['0']['birthday1']=="11"){echo 'selected';}?>>11</option>
                            <option value="12" <?php if($list['0']['birthday1']=="12"){echo 'selected';}?>>12</option>
						</select>&nbsp;月&nbsp;&nbsp;
						<select name="birthday2" id="">
							<option value="请选择">请选择</option>
							<option value="1" <?php if($list['0']['birthday2']=="1"){echo 'selected';}?>>1</option>
                            <option value="2" <?php if($list['0']['birthday2']=="2"){echo 'selected';}?>>2</option>
                            <option value="3" <?php if($list['0']['birthday2']=="3"){echo 'selected';}?>>3</option>
                            <option value="4" <?php if($list['0']['birthday2']=="4"){echo 'selected';}?>>4</option>
                            <option value="5" <?php if($list['0']['birthday2']=="5"){echo 'selected';}?>>5</option>
                            <option value="6" <?php if($list['0']['birthday2']=="6"){echo 'selected';}?>>6</option>
                            <option value="7" <?php if($list['0']['birthday2']=="7"){echo 'selected';}?>>7</option>
                            <option value="8" <?php if($list['0']['birthday2']=="8"){echo 'selected';}?>>8</option>
                            <option value="9" <?php if($list['0']['birthday2']=="9"){echo 'selected';}?>>9</option>
                            <option value="10" <?php if($list['0']['birthday2']=="10"){echo 'selected';}?>>10</option>
                            <option value="11" <?php if($list['0']['birthday2']=="11"){echo 'selected';}?>>11</option>
                            <option value="12" <?php if($list['0']['birthday2']=="12"){echo 'selected';}?>>12</option>
                            <option value="13" <?php if($list['0']['birthday2']=="13"){echo 'selected';}?>>13</option>
                            <option value="14" <?php if($list['0']['birthday2']=="14"){echo 'selected';}?>>14</option>
                            <option value="15" <?php if($list['0']['birthday2']=="15"){echo 'selected';}?>>15</option>
                            <option value="16" <?php if($list['0']['birthday2']=="16"){echo 'selected';}?>>16</option>
                            <option value="17" <?php if($list['0']['birthday2']=="17"){echo 'selected';}?>>17</option>
                            <option value="18" <?php if($list['0']['birthday2']=="18"){echo 'selected';}?>>18</option>
                            <option value="19" <?php if($list['0']['birthday2']=="19"){echo 'selected';}?>>19</option>
                            <option value="20" <?php if($list['0']['birthday2']=="20"){echo 'selected';}?>>20</option>
                            <option value="21" <?php if($list['0']['birthday2']=="21"){echo 'selected';}?>>21</option>
                            <option value="22" <?php if($list['0']['birthday2']=="22"){echo 'selected';}?>>22</option>
                            <option value="23" <?php if($list['0']['birthday2']=="23"){echo 'selected';}?>>23</option>
                            <option value="24" <?php if($list['0']['birthday2']=="24"){echo 'selected';}?>>24</option>
                            <option value="25" <?php if($list['0']['birthday2']=="25"){echo 'selected';}?>>25</option>
                            <option value="26" <?php if($list['0']['birthday2']=="26"){echo 'selected';}?>>26</option>
                            <option value="27" <?php if($list['0']['birthday2']=="27"){echo 'selected';}?>>27</option>
                            <option value="28" <?php if($list['0']['birthday2']=="28"){echo 'selected';}?>>28</option>
                            <option value="29" <?php if($list['0']['birthday2']=="29"){echo 'selected';}?>>29</option>
                            <option value="30" <?php if($list['0']['birthday2']=="30"){echo 'selected';}?>>30</option>
                            <option value="31" <?php if($list['0']['birthday2']=="31"){echo 'selected';}?>>31</option>
						</select>&nbsp;日
					</div>
					<div style="clear:both"></div>
<!-- <?php echo ($list["0"]["star"]); ?>
<?php
 var_dump($list['0']['star']); ?> -->
					<!-- 星座 -->
					<div class="star">
						<div class="star1">星座:&nbsp;&nbsp;</div>
						<select name="star" id="" class="star2">
							<option value="请选择">请选择</option>
							<option value="水瓶座" <?php if($list['0']['star']=="水瓶座"){echo 'selected';}?>>水瓶座</option>
				            <option value="双鱼座" <?php if($list['0']['star']=="双鱼座"){echo 'selected';}?>>双鱼座</option>
				            <option value="白羊座" <?php if($list['0']['star']=="白羊座"){echo 'selected';}?>>白羊座</option>
				            <option value="金牛座" <?php if($list['0']['star']=="金牛座"){echo 'selected';}?>>金牛座</option>
				            <option value="双子座" <?php if($list['0']['star']=="双子座"){echo 'selected';}?>>双子座</option>
				            <option value="巨蟹座" <?php if($list['0']['star']=="巨蟹座"){echo 'selected';}?>>巨蟹座</option>
				            <option value="狮子座" <?php if($list['0']['star']=="狮子座"){echo 'selected';}?>>狮子座</option>
				            <option value="处女座" <?php if($list['0']['star']=="处女座"){echo 'selected';}?>>处女座</option>
				            <option value="天秤座" <?php if($list['0']['star']=="天秤座"){echo 'selected';}?>>天秤座</option>
				            <option value="天蝎座" <?php if($list['0']['star']=="天蝎座"){echo 'selected';}?>>天蝎座</option>
				            <option value="射手座" <?php if($list['0']['star']=="射手座"){echo 'selected';}?>>射手座</option>
				            <option value="摩羯座" <?php if($list['0']['star']=="摩羯座"){echo 'selected';}?>>摩羯座</option>
						</select>
					</div>
					<div style="clear:both"></div>

					<!-- 职业 -->
					<div class="obj">
						<div class="obj1">职业:&nbsp;&nbsp;</div>
						<select name="job" id="" class="obj2">
							<option value="请选择">请选择</option>
							<option value="白领" <?php if($list['0']['job']=="白领"){echo 'selected';}?>>白领</option>
				            <option value="学生" <?php if($list['0']['job']=="学生"){echo 'selected';}?>>学生</option>
				            <option value="时尚妈咪" <?php if($list['0']['job']=="时尚妈咪"){echo 'selected';}?>>时尚妈咪</option>
				            <option value="模特" <?php if($list['0']['job']=="模特"){echo 'selected';}?>>模特</option>
				            <option value="时尚店主" <?php if($list['0']['job']=="时尚店主"){echo 'selected';}?>>时尚店主</option>
				            <option value="传媒" <?php if($list['0']['job']=="传媒"){echo 'selected';}?>>传媒</option>
				            <option value="艺术" <?php if($list['0']['job']=="艺术"){echo 'selected';}?>>艺术</option>
				            <option value="其他" <?php if($list['0']['job']=="其他"){echo 'selected';}?>>其他</option>
						</select>
					</div>
					<div style="clear:both"></div>

					<!-- 身材信息 -->
					<div class="ziliao">
						<span>身材信息</span><span style="font-weight:normal;font-size:12px;padding-left:10px">^_^ 用心填写这几项信息，会帮助蘑菇街给你推荐合适的衣服和鞋子哦~</span>
					</div><br/><br/>
					<div style="clear:both"></div>

					<!-- 身高 -->
					<div class="form-group">
				    	<label for="inputEmail3" class="col-sm-2 control-label name1">&nbsp;&nbsp;身高:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control set-name1" id="inputEmail3" name="height" placeholder="" value="<?php echo ($list[0][height]); ?>" style="width:140px;height:25px;">
				    	</div>
				 	</div>
				 	<div style="clear:both"></div>

				 	<!-- 体重 -->
				 	<div class="form-group">
				    	<label for="inputEmail3" class="col-sm-2 control-label name2" >&nbsp;&nbsp;体重:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control set-name2" id="inputEmail3" name="weight" placeholder="" value="<?php echo ($list[0][weight]); ?>" style="width:140px;height:25px;">
				    	</div>
				 	</div>
				 	<div style="clear:both"></div>

				 	<!-- 衣服尺寸 -->
					<div class="size">
						<div class="size1">衣服尺寸:&nbsp;&nbsp;</div>
						<select name="close_size" value="<?php echo ($list['close_size']); ?>" id="" class="size2">
							<option value="请选择">请选择</option>
							<option value="50" <?php if($list['0']['close_size']=="50"){echo 'selected';}?>>50</option>
							<option value="60" <?php if($list['0']['close_size']=="60"){echo 'selected';}?>>60</option>
				            <option value="70" <?php if($list['0']['close_size']=="70"){echo 'selected';}?>>70</option>
				            <option value="80" <?php if($list['0']['close_size']=="80"){echo 'selected';}?>>80</option>  
						</select>
					</div>
					<div style="clear:both"></div>

					<!-- 衣服尺寸 -->
					<div class="size">
						<div class="size1">裤子尺寸:&nbsp;&nbsp;</div>
						<select name="trouser_size" value="<?php echo ($list['trouser_size']); ?>" id="" class="size2">
							<option value="请选择">请选择</option>
							<option value="21" <?php if($list['0']['trouser_size']=="21"){echo 'selected';}?>>21</option>
                            <option value="22" <?php if($list['0']['trouser_size']=="22"){echo 'selected';}?>>22</option>
                            <option value="23" <?php if($list['0']['trouser_size']=="23"){echo 'selected';}?>>23</option>
                            <option value="24" <?php if($list['0']['trouser_size']=="24"){echo 'selected';}?>>24</option>
                            <option value="25" <?php if($list['0']['trouser_size']=="25"){echo 'selected';}?>>25</option>
                            <option value="26" <?php if($list['0']['trouser_size']=="26"){echo 'selected';}?>>26</option>
                            <option value="27" <?php if($list['0']['trouser_size']=="27"){echo 'selected';}?>>27</option>
                            <option value="28" <?php if($list['0']['trouser_size']=="28"){echo 'selected';}?>>28</option>
                            <option value="29" <?php if($li2['0']['trouser_size']=="29"){echo 'selected';}?>>29</option>
                            <option value="30" <?php if($list['0']['trouser_size']=="30"){echo 'selected';}?>>30</option>
                            <option value="31" <?php if($list['0']['trouser_size']=="31"){echo 'selected';}?>>31</option> 
						</select>
					</div>
					<div style="clear:both"></div>

					<!-- 鞋子尺码 -->
					<!-- 衣服尺寸 -->
					<div class="size">
						<div class="size1">鞋子尺寸:&nbsp;&nbsp;</div>
						<select name="shose_size" value="<?php echo ($list['shose_size']); ?>" id="" class="size2">
							<option value="请选择">请选择</option>
							<option value="34" <?php if($list['0']['shose_size']=="34"){echo 'selected';}?>>34</option>
                            <option value="35" <?php if($list['0']['shose_size']=="35"){echo 'selected';}?>>35</option>
                            <option value="36" <?php if($list['0']['shose_size']=="36"){echo 'selected';}?>>36</option>
                            <option value="37" <?php if($list['0']['shose_size']=="37"){echo 'selected';}?>>37</option>
                            <option value="38" <?php if($list['0']['shose_size']=="38"){echo 'selected';}?>>38</option>
                            <option value="39" <?php if($list['0']['shose_size']=="39"){echo 'selected';}?>>39</option>
                            <option value="40" <?php if($list['0']['shose_size']=="40"){echo 'selected';}?>>40</option>
						</select>
					</div>
					<div style="clear:both"></div>

					<!-- 其他信息 -->
					<div class="ziliao">
						<span>其他信息</span>
					</div><br/><br/>
					<div style="clear:both"></div>

					<!-- 自我介绍 -->
					<div class="form-group">
				    	<label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:100px">自我介绍:&nbsp;&nbsp;</label>
				    	<div class="col-sm-2">
							<textarea name="qianming" class="form-control set-myself" rows="3" style="width:400px;height:140px"><?php echo ($list[0][qianming]); ?></textarea>
				    	</div>
				 	</div>
				 	<div style="clear:both"></div>

				 	<div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-default sure"style="border:1px solid #f2a600;background: #ffb100;color:#fff">确认修改</button>
					    </div>
				  	</div>

			</div>	
			</div>	
		</div>	
	</div>
	</form>


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