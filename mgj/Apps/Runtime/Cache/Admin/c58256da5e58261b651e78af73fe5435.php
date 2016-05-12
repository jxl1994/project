<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>蘑菇街后台管理</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Public/Admin/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/Public/Admin/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/Admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/Admin/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/Admin/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html" style='color:#30f;font-size:30px'>蘑菇街后台管理</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo U('Admin/Logout/logout');?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo U('Admin/Index/index');?>"><i class="fa fa-dashboard fa-fw"></i> 后台首页</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user-md fa-fw"></i> 用户管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/User/add');?>">用户添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/User/index');?>">用户列表</a>
                                </li>
                                 <li>
                                    <a href="<?php echo U('Admin/User/trach');?>">回收站</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-bitbucket fa-fw"></i> 分类管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Cate/add');?>">分类添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Cate/index');?>">分类列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-apple  fa-fw"></i> 商品管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Goods/add');?>">商品添加</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Goods/index');?>">商品列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-qq  fa-fw"></i>权限管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/QuanXian/add');?>">添加规则</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/QuanXian/index');?>">规则列表</a>
                                </li>
                                 <li>
                                    <a href="<?php echo U('Admin/QuanXian/Group_add');?>">用户组添加</a>
                                </li>
                                 <li>
                                    <a href="<?php echo U('Admin/QuanXian/Group_index');?>">用户组表</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/QuanXian/User_add');?>">人员分组</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/QuanXian/User_index');?>">人员分组列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa  fa-twitter  fa-fw"></i> 订单管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Order/index');?>">订单浏览</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa  fa-book  fa-fw"></i> 评价管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Pingjia/index');?>">评价浏览</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-truck   fa-fw"></i> 配送管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Post/add');?>">添加配送</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Post/index');?>">配送清单</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-behance-square   fa-fw"></i> 友情链接<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Link/add');?>">添加链接</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Link/index');?>">链接浏览</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-camera-retro  fa-fw"></i> 轮播管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Carousel/add');?>">添加轮播图</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Carousel/index');?>">轮播列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa  fa-shopping-cart   fa-fw"></i> 充值系统<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Recharge/add');?>">去充值</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Recharge/index');?>">账户余额</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                         <li>
                            <a href="#"><i class="fa  fa-fire    fa-fw"></i> 支付方式管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Pay/add');?>">添加支付方式</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Pay/index');?>">浏览支付方式</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa  fa-reddit-square    fa-fw"></i> 广告管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Adver/add');?>">添加广告</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Adver/index');?>">广告列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="#"><i class="fa glyphicon-piggy-bank fa-fw"></i> 活动管理<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo U('Admin/Activity/add');?>">添加活动</a>
                                </li>
                                <li>
                                    <a href="<?php echo U('Admin/Activity/index');?>">活动列表</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>


                     
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                
    <h1 class="page-header">修改活动</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="<?php echo U('Admin/Activity/update');?>" enctype="multipart/form-data">
                                <input type="hidden" name='id' value="<?php echo ($res['id']); ?>">
                                <div class="form-group">                   
                                    <label>新背景图上传</label>
                                    <input type="file" name="pic">
                                
                                </div>
                                <div class="form-group">
                                    <label>活动名称</label>
                                    <input name="name" value="<?php echo ($res['name']); ?>" class="form-control">
                                </div>

                                 <div class="form-group">
                                    <label>折扣</label><br>
                                    <input type="radio" name="zhekou" value='0.5' <?php if($res['zhekou'] == 0.5): ?>checked<?php endif; ?>>全场半价&nbsp;
                                    <input type="radio" name="zhekou" value='0.8' <?php if($res['zhekou'] == 0.8): ?>checked<?php endif; ?>>全场八折&nbsp;
                                    <input type="radio" name="zhekou" value='0.7' <?php if($res['zhekou'] == 0.7): ?>checked<?php endif; ?>>全场七折&nbsp;
                                  
                                </div>
                                 <div class="form-group">
                                    <label>开始月份</label>
                                    <select name="month" class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="1" <?php if($res['month'] == 1): ?>selected<?php endif; ?>>1月</option>
                                        <option value="2" <?php if($res['month'] == 2): ?>selected<?php endif; ?>>2月</option>
                                        <option value="3" <?php if($res['month'] == 3): ?>selected<?php endif; ?>>3月</option>
                                        <option value="4" <?php if($res['month'] == 4): ?>selected<?php endif; ?>>4月</option>
                                        <option value="5" <?php if($res['month'] == 5): ?>selected<?php endif; ?>>5月</option>
                                        <option value="6" <?php if($res['month'] == 6): ?>selected<?php endif; ?>>6月</option>
                                        <option value="7" <?php if($res['month'] == 7): ?>selected<?php endif; ?>>7月</option>
                                        <option value="8" <?php if($res['month'] == 8): ?>selected<?php endif; ?>>8月</option>
                                        <option value="9" <?php if($res['month'] == 9): ?>selected<?php endif; ?>>9月</option>
                                        <option value="10" <?php if($res['month'] == 10): ?>selected<?php endif; ?>>10月</option>
                                        <option value="11" <?php if($res['month'] == 11): ?>selected<?php endif; ?>>11月</option>
                                        <option value="12" <?php if($res['month'] == 12): ?>selected<?php endif; ?>>12月</option>
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label>开始日</label>
                                    <select name="day" class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="1" <?php if($res['day'] == 1): ?>selected<?php endif; ?>>1日</option>
                                        <option value="2" <?php if($res['day'] == 2): ?>selected<?php endif; ?>>2日</option>
                                        <option value="3" <?php if($res['day'] == 3): ?>selected<?php endif; ?>>3日</option>
                                        <option value="4" <?php if($res['day'] == 4): ?>selected<?php endif; ?>>4日</option>
                                        <option value="5" <?php if($res['day'] == 5): ?>selected<?php endif; ?>>5日</option>
                                        <option value="6" <?php if($res['day'] == 6): ?>selected<?php endif; ?>>6日</option>
                                        <option value="7" <?php if($res['day'] == 7): ?>selected<?php endif; ?>>7日</option>
                                        <option value="8" <?php if($res['day'] == 8): ?>selected<?php endif; ?>>8日</option>
                                        <option value="9" <?php if($res['day'] == 9): ?>selected<?php endif; ?>>9日</option>
                                        <option value="10" <?php if($res['day'] == 10): ?>selected<?php endif; ?>>10日</option>
                                        <option value="11" <?php if($res['day'] == 11): ?>selected<?php endif; ?>>11日</option>
                                        <option value="12" <?php if($res['day'] == 12): ?>selected<?php endif; ?>>12日</option>
                                        <option value="13" <?php if($res['day'] == 13): ?>selected<?php endif; ?>>13日</option>
                                        <option value="14" <?php if($res['day'] == 14): ?>selected<?php endif; ?>>14日</option>
                                        <option value="15" <?php if($res['day'] == 15): ?>selected<?php endif; ?>>15日</option>
                                        <option value="16" <?php if($res['day'] == 16): ?>selected<?php endif; ?>>16日</option>
                                        <option value="17" <?php if($res['day'] == 17): ?>selected<?php endif; ?>>17日</option>
                                        <option value="18" <?php if($res['day'] == 18): ?>selected<?php endif; ?>>18日</option>
                                        <option value="19" <?php if($res['day'] == 19): ?>selected<?php endif; ?>>19日</option>
                                        <option value="20" <?php if($res['day'] == 20): ?>selected<?php endif; ?>>20日</option>
                                        <option value="21" <?php if($res['day'] == 21): ?>selected<?php endif; ?>>21日</option>
                                        <option value="22" <?php if($res['day'] == 22): ?>selected<?php endif; ?>>22日</option>
                                        <option value="23" <?php if($res['day'] == 23): ?>selected<?php endif; ?>>23日</option>
                                        <option value="24" <?php if($res['day'] == 24): ?>selected<?php endif; ?>>24日</option>
                                        <option value="25" <?php if($res['day'] == 25): ?>selected<?php endif; ?>>25日</option>
                                        <option value="26" <?php if($res['day'] == 26): ?>selected<?php endif; ?>>26日</option>
                                        <option value="27" <?php if($res['day'] == 27): ?>selected<?php endif; ?>>27日</option>
                                        <option value="28" <?php if($res['day'] == 28): ?>selected<?php endif; ?>>28日</option>
                                        <option value="29" <?php if($res['day'] == 29): ?>selected<?php endif; ?>>29日</option>
                                        <option value="30" <?php if($res['day'] == 30): ?>selected<?php endif; ?>>30日</option>
                                        <option value="31" <?php if($res['day'] == 31): ?>selected<?php endif; ?>>31日</option>


                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>限时</label>
                                    <select name="time" class="form-control">
                                        <option value="0">请选择</option>
                                        <option value="1" <?php if($res['time'] == 1): ?>selected<?php endif; ?>>1天</option>
                                        <option value="2" <?php if($res['time'] == 2): ?>selected<?php endif; ?>>2天</option>
                                        <option value="3" <?php if($res['time'] == 3): ?>selected<?php endif; ?>>3天</option>
                                        <option value="4" <?php if($res['time'] == 4): ?>selected<?php endif; ?>>4天</option>
                                        <option value="5" <?php if($res['time'] == 5): ?>selected<?php endif; ?>>5天</option>
                                        <option value="6" <?php if($res['time'] == 6): ?>selected<?php endif; ?>>6天</option>

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>状态</label>
                                    <select name="status" class="form-control">
                                        <option value="0" <?php if($res['status'] == 0): ?>selected<?php endif; ?>>开启</option>
                                        <option value="1" <?php if($res['status'] == 1): ?>selected<?php endif; ?>>关闭</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-lg btn-block" >修改</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>

            <!-- /.row -->
           
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/Public/Admin/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/Public/Admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/Public/Admin/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->

    <!-- Custom Theme JavaScript -->
    <script src="/Public/Admin/dist/js/sb-admin-2.js"></script>

</body>

</html>