<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {

    //用户注册，设置用户名密码
    public function zhuce()
    {
       $this->display();
    }

    //执行ajax请求,检测用户名是否已经注册
     public function ajaxRequery()
    {
    	// var_dump($username);
    	$user = M('user');
    	$username = $_GET['username'];
		$res = $user->where(array('username'=>$username))->find();

		//var_dump($res);die();
		if($res){
			//用户已经存在
			echo 1;
		}else{
			//用户不存在
			echo 0;
		}
    }
    //执行注册
    public function registr(){
    	// var_dump($_POST);
    	$password = md5($_POST['password']);
    	$_POST['password'] = $password;
    	$arr = array(
    		'username'=>$_POST['username'],
    		'password'=>$_POST['password']
    		);
    	$user = M('user');
    	$res = $user->add($arr);
        $user_info = M('user_info');
        $arr2 = array(
                'uid'=>$res
            );
        $res2 = $user_info->add($arr2);
    	if($res && $res2){
    		//添加成功
    		$this->success('注册成功',U('Home/User/login'));
    	}else{
    		//失败
    		$this->error('注册失败',U('Home/User/zhuce2'));
    	}
    }
    //用户登录
    public function login(){
    	//解析模板
       $this->display();
    }

    //执行登录
    public function dl(){
    	// var_dump($_POST);
    	$user = M('user');

        $username = I('post.username');
        $password = md5(I('post.password'));
        // var_dump($password);die;
        //查询
        $info = $user->where('username = "'.$username.'" and password = "'.$password.'"')->find();
        // var_dump($info);
        //检测 如果用户存在
        if(!empty($info)){
            session_start();
            $_SESSION['uid'] = $info['id'];
           session('username',$info['username']);
           $this->success('登录成功',U('Home/Index/index'));
        }else{
            $this->error('登录失败',U('Home/User/login'));
        }
    }

    //弹框的登录
    public function tklogin(){
         // var_dump($_POST);die;
        $id = I('post.goodsid');
        $user = M('user');

        $username = I('post.username');
        $password = md5(I('post.password'));
        // var_dump($password);die;
        //查询
        $info = $user->where('username = "'.$username.'" and password = "'.$password.'"')->find();
        // var_dump($info);
        //检测 如果用户存在
        if(!empty($info)){
            session_start();
            $_SESSION['uid'] = $info['id'];
           session('username',$info['username']);
            // var_dump($_SESSION);
           $this->success('登录成功',U('Home/Detail/index/?id='.$id));
        }else{
            $this->error('登录失败',U('Home/Detail/index/?id='.$id));
        }
    }

    //退出登录
    public function logout(){
        setCookie(session_name(),null,time()-1,'/');
            $_SESSION = array();
            session_destroy();
            $this -> success("退出成功",U('Home/Index/index'));

    }

}