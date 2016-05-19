<?php
namespace Home\Controller;
use Think\Controller;
class PurseController extends Controller {
	// 前台首页
    public function index(){
        //判断是否登录
        //查看浏览过的商品id
        //前台钱包遍历
        $user=$_SESSION['username'];
        $users=M('user');
        $sql='select * from user where username ="'.$user.'"';
        $row=$users->query($sql);
        $this->assign('row',$row);
        $this->display();
    }
    public function pay(){
        //遍历当前充值金额
        $money=$_POST['money'];
        $this->assign('money',$money);
        $pay=M('pay');
        $pays=$pay->where(array('status'=>'已审核'))->select();
    	$this->assign('pays',$pays);
        //实际充值
        $user=$_SESSION['username'];
        $users=M('user');
        $sql=$users->where('username ="'.$user.'"')->find();
        //判断账户金额,如果账户有钱不能享受首冲
        if($sql['gold'] == 0 && $sql['status']==0){
            $newmoney=$money*0.8;
        }else{
            $newmoney=$money;
        }
       $this->assign('newmoney',$newmoney); 
    	$this->display();
    }
    public function insert(){
    	//充值金额写入数据库
    	$id=$_SESSION['uid'];
    	$user=M('user');
    	$sql=$user->where('id ="'.$id.'"')->find();
    	$gold=$sql['gold'];
    	$money=$_GET['money'];
    	$newmoney=$gold+$money;
      $time=date('Y-m-d H:i:s',time());
  		//写入数据库并把状态修改为1
        $update=array(
            'id'=>$id,
            'gold'=>$newmoney,
            'status'=>1,
            'time'=>$time
            );
        $res=M('user')->save($update);
        if($res){
            $this->success('支付成功',U('Home/Purse/index'));
        }else{
            $this->error('支付失败',U('Home/Purse/index'));
        }
    }
   public function select(){
   		$id=$_SESSION['uid'];
   		$user=M('user');
   		$sql='select * from user where id ='.$id.' AND status = 0';
   		$res=$user->query($sql);
   		if($res){
   			echo 0;
   		}else{
   			echo 1;
   		}
   }
}