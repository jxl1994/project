<?php
namespace Home\Controller;
use Think\Controller;
class PingjiaController extends Controller {
	// 前台首页
    public function index(){
        $oid = $_GET['oid'];
        $gid = $_GET['gid'];
        // var_dump($_GET['oid']);
        //创建对象
        $pingjia=M('pingjia');
        $res=$pingjia->where(array('spid ='.$gid,'orderid'=>$oid))->select();
        if($res){
            $this->error('已评价',U('Home/Myorder/detail'));
        }
    	$sql = 'select order_detail.*, goods.* from order_detail left join goods on order_detail.goodsid = goods.id where order_detail.goodsid = '.$gid.' and order_detail.orderid = '.$oid;
    	// var_dump($sql);
    	$info = M('orders')->query($sql);
    	 // var_dump($info);die;
    	//分配变量
    	$this->assign('info',$info);
        $this->display();
    }
    public function add(){
    	// var_dump($_POST);die();
    	$pj = M('pingjia');
        $uid = $_SESSION['uid'];
    	$time=date('Y-m-d H:i:s',time());
    	$arr = array(
    		'uid'=>$uid,
    		'spid'=>$_POST['spid'],
    		'orderid'=>$_POST['orderid'],
    		'content'=>$_POST['content'],
    		'status'=>$_POST['pj'],
    		'time'=>$time
    	);
    	$res = $pj->add($arr);
    	if($res){
    		//添加成功
    		$this->success('评价成功',U('Home/Index/index'));
    	}else{
    		//失败
    		$this->error('评价失败',U('Home/Pingjia/index'));
    	}

    }
}