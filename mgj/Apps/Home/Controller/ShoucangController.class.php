<?php
namespace Home\Controller;
use Think\Controller;
class ShoucangController extends Controller {
	//添加收藏
	public function add(){
			$sc = M('shoucang');
			$goodsid = $_GET['goodsid'];
			$uid = $_SESSION['uid'];
			$time = date('Y-m-d H:i:s',time());
				$arr = array(
		    		'goodsid'=>$goodsid,
		    		'uid'=>$uid,
		    		'addtime'=>$time
		    		);
				$sql = 'select * from shoucang where uid = '.$uid.' and goodsid = '.$goodsid;
				$info = $sc->query($sql);
				if($info){
					$sql1 = 'delete from shoucang where uid = '.$uid.' and goodsid = '.$goodsid;
					$del = $sc->query($sql1);
					if($del){
						echo 0;
					}
				}else{
					$res = $sc->add($arr);
					if($res){
			    		echo 1;
			    	}
				}
				
			
		
	}
    public function index(){
    	if($_SESSION['uid']){
    		$sc = M('shoucang');
	    	$uid = $_SESSION['uid'];
	    	$sql = 'select shoucang.*, goods.name, goods.pic, goods.price from shoucang left join goods on shoucang.goodsid = goods.id where shoucang.uid = '.$uid;
	    	//var_dump($sql);die;
	    	$info = $sc->query($sql);
	    	$this->assign('sc',$info);
	        $this->display();
    	}else{
    		$this->error('对不起,请登录',U('Home/User/login'));
    	}
    	
    }
}