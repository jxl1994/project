<?php
namespace Home\Controller;
use Think\Controller;
class MyorderController extends Controller {
       public function index(){

        $mod = M("order_detail");
        $address_user = M("address_user");

        $uid = $_SESSION['uid'];
        $cart = M('cart');
        $goods = M('goods');
        
        $sql = 'select cart.*, cart.id as cid, goods.* from cart left join goods on cart.goodsid = goods.id where cart.uid = '.$uid;
        $info1 = $cart->query($sql);

        // $sql = 'select send.*, address_user.uid from send left join address_user on send.id = address_user.uid where send.id='.$uid;
        $sql1 = 'select * from address_user where uid='.$uid;
         // var_dump($sql1);die;
        $info2 = $address_user->query($sql1);
        $res=$address_user->where('uid='.$uid)->select();
        // var_dump($info2);die;

        // var_dump($info1);die;
        $this->assign('cart',$info1);

        //分配变量
        $this->assign('info2',$info2);

    	//解析模板
        $this->display('Myorder/index');
    }

   //添加
    public function add(){
        //解析模板
        $this->display();
    }


    //执行插入
    public function insert(){
        // var_dump($_POST);die;
        // $id=$_SESSION['uid'];
        //创建表对象 
       $address_user=M('address_user');
       $res=$address_user->find($_POST['address']);
       // var_dump($res);

       $time=time();
       $p['time']=date('Y-m-d H:i:s',$time);
       $p['send']=$_POST['way'];
       $p['total']=$_POST['total'];
       $p['uid']=$res['uid'];
       $p['linkman']=$res['linkman'];
       $p['phone']=$res['phone'];
       $p['uid']=$res['uid'];
       $p['address']=$res['address'];
       $p['status']=1; 
       // var_dump($p);die;
        //添加订单表
       $order=M('orders');
       $res1=$order->data($p)->add();
       // echo $order->_sql();
       // var_dump($res1);die;
       //搜索购物车表
       $order_detail=M('order_detail');
       $cart=M('cart');
       $res=$cart->where('uid='.$_SESSION['uid'])->select();
       $cart->where('uid='.$_SESSION['uid'])->delete();
       foreach ($res as $key => $v) {
           // var_dump($v);
           $pp['orderid']=$res1;
           $pp['goodsid']=$v['goodsid'];
           $pp['num']=$v['gnum'];
           $pp['uid']=$_SESSION['uid'];
           // var_dump($pp);
           $order_detail->data($pp)->add();
           $pp=null;
       }
       //var_dump($res);die;

        // var_dump($arr);die;
        if($res){
            //添加成功
            $this->success('添加成功',U('Home/Pay/index',array('total'=>$p['total'])));
        }else{
            //失败
            $this->error('添加失败',U('Home/Myorder/index'));
        }
    }

    public function detail(){
        //实例化订单详情
        // var_dump($_SESSION);die;
        $order_detail= M("order_detail");
        $orders = M('orders');
        $uid = $_SESSION['uid'];
        // var_dump($uid);die;

        $info = $orders->where('uid='.$_SESSION['uid'])->select();
        // var_dump($info);
        // $res=$order_detail->where('uid='.$uid)->select();
        // var_dump($res);
        $this->assign("detail",$info);
        // $this->assign("orders",$orders);
        $this->display();
     }


     public function details(){
        $order_detail = M('order_detail');
        $id = $_GET['id'];
        $res=$order_detail->where('orderid='.$id)->select();
        // var_dump($res);die;
        // var_dump($id);die;
   
        // $sql = 'select orders.*, order_detail.goodsid from orders left join order_detail on orders.id = order_detail.orderid where orders.id='.$id;
        // // var_dump($sql);die;
        // $shoplist=$orders->query($sql);
        // var_dump($shoplist);die;
        //分配变量
        $this->assign("detail",$res);

        $this->display();
     }

    // //删除订单
        public function del(){
            //创建对象
            $order_detail = M("order_detail");

            // $id = $_GET['id'];
            $oid = $_GET['oid'];
            $gid = $_GET['gid'];

            $info = $order_detail->where(array('orderid'=>$oid,'goodsid'=>$gid))->delete();
            // var_dump($info);die;
            
            
            if($info){
                //删除成功
                $this->success('删除成功',U('Home/Myorder/detail'));
            }else{
                $this->error('删除失败',U('Home/Myorder/detail'));
            }
        }
    
}