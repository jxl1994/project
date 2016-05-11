<?php
namespace Admin\Controller;
use Think\Controller;
class OrderController extends CommonController {
    public function index(){
        $mod = M("orders");
        //获取关键字
        if(!empty($_GET['keyword'])){
            $where = "where user.username like '%\\".$_GET['keyword']."%'";
        }else{
            $where = '';
        }

        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 5;
        
    	//统计总数
    	$count = $mod->where($where)->count();
        // var_dump($count);
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);

    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
        // echo $limit;
    	// 分页显示输出
    	$pages = $Page->show();
    	// var_dump($pages);
    	// echo $pages;
        //查询所有数据
        $sql= 'select orders.*,user.username from orders left join user on orders.uid = user.id '.$where.' order by orders.id desc limit '.$limit;
        // var_dump($list);die;
        // echo $sql;
        $list=$mod->query($sql);
      
        // var_dump($res);die;
        //分配变量
        $this->assign("list",$list);
		$this->assign("status",array("","新订单","已发货","已收货","订单完成"));
		$this->assign('pages',$pages);


    	//解析模板
    	$this->display();
    }
   
    	// 修改订单状态
		public function edit(){
			//var_dump($_POST);die;
			//创建对象
			$orders = M("orders");
			// $data['status']=$row['id'];
			$id = $_GET['id'];

           	 $info = $orders->where(' orders.id ='.$id)->find();
           	//var_dump($info);die;
			//分配变量
     		$this->assign('info',$info);

     		//解析模板
     		$this->display();
		}

		//执行修改
		public function update(){
			// var_dump($_POST);
			//更新主表
			$orders = M("orders");
			 //获取id
       		//var_dump($_POST['id']);die;
       		$orders->create();
			$res=$orders->save();
			// var_dump($res);die;
			//var_dump($info);die;
			if($res){
	            //添加成功
	            $this->success('修改成功',U('Admin/Order/index'));
	        }else{
	            $this->error('修改失败',U('Admin/Order/index'));
	        }
		}

		// //删除订单
		public function del(){
			//创建对象
			$orders = M("orders");
			$id = $_GET['id'];
			$res =  $orders->where('id='.$id)->delete();							
			if($res){
	            //删除成功
	            $this->success('删除成功',U('Admin/Order/index'));
	        }else{
	        	$this->error('删除失败',U('Admin/Order/index'));
	        }
		}

		public function detail(){
			// var_dump($_GET['id']);die;
			//实例化订单详情
			$o = M("order_detail");
			$id = $_GET['id'];
			// var_dump($id);
			$sql = 'select order_detail.*, orders.*, goods.* from order_detail left join orders on order_detail.orderid = orders.id left join goods on order_detail.goodsid = goods.id where orders.id = '.$id;
			// var_dump($sql);die;

			$shoplist = $o->query($sql);
			// var_dump($shoplist);die;

			//分配变量
			$this->assign("shoplist",$shoplist);
			// $this->assign("user",$user[$uid]);
			$this->assign("array",$array[$id]);
			$this->assign("status",array("","新订单","已发货","已收货","订单完成"));
			$this->assign("arr",$arr[$id]);
			//加载模板
			$this->display("Order/detail");
		}
}