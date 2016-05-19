<?php
namespace Home\Controller;
use Think\Controller;
class MarkController extends Controller {
    // 前台首页
    public function index(){
    	//判断有没有用户登录
    	if($_SESSION['uid']){
	    	$mark=M('mark');
	    	$res=$mark->where(array('uid'=>$_SESSION['uid']))->select();	
	        $this->assign('res',$res);
    	}else{
    		//打印出浏览过的商品id
    		$ids=array_unique($_SESSION['goodsid']);
    		$mark=M('goods');
    		$res=array();
    		//循环遍历出商品相关信息
    		foreach($ids as $k => $v){
    			$res[]=$mark->where('id ='.$v)->find();
          $time=date('Y-m-d H:i:s',time());
          $res[$k]['addtime']=$time;	
    		}
        //var_dump($res);die;
    		$this->assign('res',$res);
    	}
        $this->display();
    }
    //删除
    public function delete(){
    	$id=$_GET['id'];  	
   		$user=M('mark');
   		$sql='delete from mark where id ='.$id;
   		$res=$user->query($sql);
   		if($res){
   			echo 0;
   		}else{
   			echo 1;
   		}
    		
    }
}