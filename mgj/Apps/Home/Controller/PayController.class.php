<?php
namespace Home\Controller;
use Think\Controller;
class PayController extends Controller {
	// 前台首页
    public function index(){
    	$total=$_POST['total'];
    	$id=$_SESSION['uid'];
    	$toal=$_GET['total'];
    	// var_dump($toal);die;
    	$m=M('user');
    	$res=$m->where('id ='.$id)->select();
    	foreach ($res as $k => $v) {
    	}
    	$this->assign('toal',$toal);
    	$this->assign('v',$v);
    	$this->assign('total',$total);
        $this->display();
    }
    //支付
    public function zf(){
    	$gold=$_GET['gold'];
    	$total=$_GET['total'];
    	$toal=$_GET['toal'];
    	// var_dump($_GET);die;
    	$uid=$_SESSION['uid'];
    	$user=M('user');
    	$users=$user->where(array('username'=>'admin'))->find();
    	$res=$users['username'];
    	if($gold<$total || $gold < $toal){
    		echo '<script>alert("余额不足,请充值");location="/Home/Purse/pay"</script>';
    	}
	//实例化pdo对象
	
	//开启事务
	$user->startTrans();
	//进行汇款操作
		if(empty($toal)){
			$sql = "update user set gold = gold - ".$total." where id= ".$uid;
			
		}else{
			$sql = "update user set gold = gold - ".$toal." where id= ".$uid;
			// echo $sql;
		}
	$result=mysql_query($sql);
	// var_dump($result);die;	
	//进行收款操作
		if(empty($toal)){
			$sql2 = "update user set gold = gold + '$total' where username = ".'"'.$res.'"';
		}else{
			$sql2 = "update user set gold = gold + '$toal' where username = ".'"'.$res.'"';
		}
	//var_dump($sql2);die;
	$result2=mysql_query($sql2);
	//判断
	//事务提交
	if($result && $result2){
		$user->commit();
		echo '<script>alert("支付成功");location="/Home/Myorder/detail"</script>';
		 }else{
		 	$user->rollback();
		 }
	}
}
