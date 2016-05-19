<?php
namespace Home\Controller;
use Think\Controller;
class AddressController extends Controller {
    public function index(){
        $uid = $_SESSION['uid'];
        $user = M('user');
        $info = $user->where(array('id'=>$uid))->select();
        // var_dump($info);
        $pic = $info[0]['pic'];
        // var_dump($pic);die;
            if($pic==null){
                $this -> assign("pic","Home/images/tx.jpg");
            }else{
                $this -> assign("pic",$pic);
            }
    	$address_user = M('address_user');
    	
	    // 	//加载模板
	    $this->display();
    }

    public function add(){

        $this->display();
    }

    public function insert(){
        $address_user = M('address_user');
        // var_dump($_POST);die;
        $time=date('Y-m-d H:i:s',time());
        $p['address']=$_POST['address'];
        $p['linkman']=$_POST['linkman'];
        $p['phone']=$_POST['phone'];
        // $p['sendid']=$_POST['way'];
        // $p['total']=$row['gnum']*$row['price'];
        // $p['total']=$row['price']*$row['num'];
        // $p['time']=$time;
        $p['uid']=$_SESSION['uid'];
        $res=$address_user->data($p)->add();

        // $this->assign('$res',$res);
        

        // var_dump($res);die;
        if($res){
            //添加成功
            $this->success('添加成功',U('Home/Address/detail'));
        }else{
            //失败
            $this->error('添加失败',U('Home/Address/index'));
        }
    }

    public function detail(){
        $address_user= M("address_user");
        // var_dump($_POST);die;
        // $send = M('send');
        $uid = $_SESSION['uid'];

         // $sql = 'select send.*, address_user.uid from send left join address_user on send.id = address_user.uid where send.id='.$uid;
        $sql = 'select * from address_user where uid='.$uid;
         // var_dump($sql);die;
         $info = $address_user->query($sql);
        $res=$address_user->where('uid='.$uid)->select();
        // var_dump($res);die;
        // var_dump($info);die;
        // $this->assign('address_user',$address_user);
        // $this->assign("orders",$orders);
        // var_dump($uid);die;
        $this->assign('info',$info);
        $this->display('Address/detail');
     }
     
     public function edit(){
        //创建对象
        $address_user = M('address_user');
        //获取id
        $id = I('get.id');
        // var_dump($id);die;
        //读取数据
         $info = $address_user->where(' address_user.id ='.$id)->find();
        // echo $address_user->_sql();die;

        //分配变量
        $this->assign('info',$info);
        $this->display();
     }

    // 执行修改
    public function update(){
      
    // $address_user = M("address_user");
         //获取id
        // // $id = I('get.id');
        $address_user = M('address_user');
        
        //读取数据
         $info1 = $address_user->where(' address_user.id ='.$id)->find();
        // echo $address_user->_sql();die;


        //创建数据
        $address_user->create();
        //执行更新
        $res = $address_user->save();

        //分配变量
        $this->assign('info1',$info1);

         if($res){
            //添加成功
            $this->success('修改成功',U('Home/Address/detail'));
        }else{
            //失败
            $this->error('修改失败',U('Home/Address/edit'));
        }
    }

     //执行删除
    public function del(){
       // var_dump();
        $id = I('get.id');
        // var_dump($id);die;
        $address_user = M('address_user');
        $info = $address_user->find($id);
       // var_dump($info);die;
       $res =  $address_user->where('id='.$id)->delete();

      
       //执行添加
        if($res){
             //添加成功
            $this->success('删除成功',U('Home/Address/detail'));
        }else{
            //失败
            $this->error('删除失败',U('Home/Address/index'));
        }
    }


}