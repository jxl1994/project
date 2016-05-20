<?php
namespace Home\Controller;
use Think\Controller;
class DetailController extends Controller {
    public function index(){
    	$id = $_GET['id'];
        // var_dump($_SESSION);
        // var_dump($_GET);die;

          //判断,如果用户登录,把浏览的商品写入数据库
        if($_SESSION['uid']){
            $_SESSION['goodsid']=$_GET['id']; 
            $goodsid=$_SESSION['goodsid'];
            $goods=M('goods');           
            $row=$goods->where(array('id'=>$goodsid))->find();
            // var_dump($row);die;
            $user = M('mark');
            $users=$user->select();
            $arr=array();
            foreach ($users as $k => $v){
                $arr[]=$v['goodsid'];
            }
            // var_dump($arr);die;

            //判断商品id有没有重复
            if(in_array($goodsid,$arr)){
                $data['uid'] = $_SESSION['uid'];
                $data['goodsid']=$_SESSION['goodsid'];
                $data['pic']=$row['pic'];
                $data['price']=$row['price'];
                $data['name']=$row['name'];
                $data['addtime']=date('Y-m-d H:i:s',time());  
                // var_dump($data);die;      
                //创建数据
                $goods->create();
                //执行添加
                $res=$user->data($data)->add();
            }else{
                 //如果重复,让当前的商品id不写入
            }
        }else{
            //如果没有用户登录,记录浏览过的商品id
           $_SESSION['goodsid'][]=$_GET['id'];
           //去除重复出现的商品id,只留一个
           array_unique($_SESSION['goodsid']);
            
        }
    	 //实例化detail详情表
	    	// $d=M("detail");
	    	$goods = M("goods");

	    	$sql = 'select goods.*,detail.* from goods left join detail on goods.id = detail.gid where goods.id='.$id ;
	    	// var_dump($sql);
	    	$list = $goods->query($sql);
	    	// var_dump($list);die;
            


            // 商品小图
            $goods_image = M('goods_image');
            $gimg = $goods_image->where(array('ggid'=>$id))->select();
            $this->assign('gimg',$gimg);

    	// 商品评价
    	$sql = 'select user.*, pingjia.* from pingjia left join user on user.id = pingjia.uid where pingjia.spid = '.$id;
    	// var_dump($sql);
    	$info = M('pingjia')->query($sql);
    	// var_dump($info);
    	//分配变量
    	if(empty($info)){
    		$this->assign('empty','暂无评价');
    	}else{
    		$this->assign('pingjia',$info);
    	}
    	// 统计该商品被收藏的次数
    	$count = 'select count(*) from shoucang where goodsid = '.$id;
    	 // var_dump($count);
    	$sc = M('shoucang')->query($count);
    	
        //分配变量
        // $goods = $d -> find($_GET["id"]);
        $this->assign('list',$list);
        $this->assign('zhekou',$_GET['zhekou']);
        $this->assign('sc',$sc);
        $this->assign('zk',$_GET['zk']);
    	  // var_dump($sc);die;
       $this->display();
    }

    
    public function pdsession(){
    	$uid = $_SESSION['uid'];
    	if($uid){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    
}