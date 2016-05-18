<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends Controller {
    // 加入购物车
    public function add(){
        $goodsid = $_GET['id'];
        //var_dump($goodsid);die;
        $uid = $_SESSION['uid'];
        $cart = M('cart');
        $info = $cart->where(array('uid'=>$uid,'goodsid'=>$goodsid))->select();
        foreach($info as $k => $v){
          $gwc['gnum']=$v['gnum'];
        }
        // var_dump($info);die;
        // var_dump($gwc['gnum']);
        if($info){
          $gnum = $gwc['gnum']+1;
          // var_dump($gnum);die;
          $arr = array('gnum'=>$gnum);
          $res = $cart->where(array('uid'=>$uid,'goodsid'=>$goodsid))->save($arr);
        }else{
          $gnum = 1;
          $time=date('Y-m-d H:i:s',time());
          $arr = array(
              'goodsid'=>$goodsid,
              'uid'=>$uid,
              'gnum'=>$gnum,
              'addtime'=>$time
            );
          $res = $cart->add($arr);
        }
        
        // var_dump($res);die;
          if($res){
            //添加成功
            $this->success('添加成功',U('Home/Cart/index'));
         }else{
            //失败
            $this->error('添加失败',U('Home/Detail/index'));
          }
    }
	// 购物车页
    public function index(){
    	$uid = $_SESSION['uid'];
      $cart = M('cart');
      $goods = M('goods');
      $info = $cart->where(array('uid'=>$uid))->select();
      if($info){
        $sql = 'select cart.*, cart.id as cid, goods.* from cart left join goods on cart.goodsid = goods.id where cart.uid = '.$uid;
        $info1 = $cart->query($sql);
        // var_dump($info1);die;
        $this->assign('cart',$info1);
    		$this->display();
    	}else{
    		$this->display('cart');
    	}
    	
  	}
    // 修改数量
    public function update(){
        // var_dump($_GET);
        $gid = $_GET['gid'];
        $num = $_GET['num'];
        $uid = $_SESSION['uid'];
        $cart = M('cart');
        $info = $cart->where(array('goodsid'=>$gid,'uid'=>$uid))->select();
        // var_dump($info);
        foreach($info as $k => $v){
          $gwc['gnum']=$v['gnum'];
           $gwc['id']=$v['id'];
        }
        $sql = 'select num from detail where gid = '.$gid;
        $info1 = M('detail')->query($sql);
        // var_dump($info1);
        foreach($info1 as $k => $v){
          $kc['num']=$v['num'];
        }
        $gnum = $gwc['gnum']+$num;
        if($gnum<=1){
          $gnum = 1;
        }
         if($gnum>=$kc['num']){
           $gnum = $kc['num'];
        }
       // var_dump($gnum);
        // $sql1 = 'update cart set gnum = '.$gnum.' where id = '.$gwc['id'];
        // var_dump($sql1);die;
        // $res = $cart->query($sql1);
        $arr = array('gnum'=>$gnum);
        $res = $cart->where(array('id'=>$gwc['id']))->save($arr);
        // var_dump($res);die;
       echo $gnum;
        
    }
    public function delete(){
        if(isset($_GET['gid'])){
            //删除单个商品
            $gid = $_GET['gid'];
            $uid = $_SESSION['uid'];
            $cart = M('cart');
            $res = $cart->where(array('goodsid'=>$gid,'uid'=>$uid))->delete();
            if($res){
              echo 0;
            }else{
              echo 1;
            }
            
        }else{
            $uid = $_SESSION['uid'];
            //清空购物车
            $cart = M('cart');
            $res = $cart->where(array('uid'=>$uid))->delete();
            if($res){
              echo 0;
            }else{
              echo 1;
            }
        }
    }


}