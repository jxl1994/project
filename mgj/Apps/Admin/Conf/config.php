<?php
return array(
	//'配置项'=>'配置值'
	//数据库配置信息
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'mgj', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '', // 数据库表前缀 
	'DB_CHARSET'=> 'utf8', // 字符集

	
	'SHOW_PAGE_TRACE' =>true,
	//设置url模式
	'URL_MODEL' => 2,
	//权限管理配置
	'AUTH_CONFIG' => array(
        'AUTH_ON' => true,  // 认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为实时认证；2为登录认证。
        'AUTH_GROUP' => 'think_auth_group', // 用户组数据表名
        'AUTH_GROUP_ACCESS' => 'think_auth_group_access', // 用户-用户组关系表
        'AUTH_RULE' => 'think_auth_rule', // 权限规则表
    ),


);