<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    //显示
    public function index(){
    	// echo '1111111';
        //解析模板
        $this->display();
    }
    //验证用户信息
    public function login(){
         // var_dump($_POST);

        $user = M('user');

        $username = I('post.username');
        $password = I('post.password');
        $pass=md5($password);
        // var_dump($pass);die;
        //查询
        $info = $user->where('username = "'.$username.'" and password = "'.$pass.'"')->find();
         // echo $user->_sql();
         // var_dump($info);
        //检测 如果用户存在
        if(!empty($info)){
            session_start();
            $_SESSION['uid'] = $info['id'];
           session('username',$info['username']);
            // var_dump($_SESSION);
           $this->success('登录成功',U('Admin/Index/index'),3);
        }else{
            $this->error('登录失败','',3);
        }
    }
}