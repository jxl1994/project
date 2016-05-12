<?php
namespace Admin\Controller;
use Think\Controller;
class PostController extends CommonController {
    //配送的列表
    public function index(){
    	//创建对象
    	$Goods = M('send');

        //获取关键字
        if(!empty($_GET['keyword'])){
            $where = "where send.orderid like '%\\".$_GET['keyword']."%'";
        }else{
            $where = '';
        }

        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 5;
        
    	//统计总数
    	$count = $Goods->where($where)->count();
        // var_dump($count);
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);

    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
        // echo $limit;
    	// 分页显示输出
    	$pages = $Page->show();
    	// var_dump($pages);
    	//多表联合查询
        $sql="select orders.id, orders.linkman, orders.address, send.* from orders right join send on orders.id = send.orderid  ".$where." order by send.id asc limit ".$limit;
        //查看sql语句
        // echo $sql;die;
        // var_dump($Goods);die;
        $res=$Goods->query($sql);
        // var_dump($res);               

        // var_dump($res1);die;
        
        	
        // var_dump($res);die;
        // var_dump($pic);die;

       

    	//分配变量
    	$this->assign('Goods',$res);
    	$this->assign('pages',$pages);


    	//解析模板
    	$this->display(); 	
    }
//添加配送方法
    public function add(){
        
    	//解析模板
    	$this->display();
    }
//执行插入
    public function insert(){
        // var_dump($_POST);die;
        // 创建对象
        $Goods = M('send');

        //创建数据
        $Goods->create();
        //执行添加
        $res=$Goods->add();      
        if($res){
             //添加成功
            $this->success('添加成功',U('Admin/Post/index'));


        }else{
            //失败
            $this->error('添加失败',U('Admin/Post/index'));
        }

    }

    //执行删除
    public function delete(){
	       // var_dump();
	        $id = I('get.id');
	        $Goods = M('send');
  
        // 删除信息
      		 $res =  $Goods->where('id='.$id)->delete();
       // echo $Goods->_sql();
              
            if($res){
                
                    $this->success('删除成功',U('Admin/Post/index'));

            }else{
                $this->error('删除失败',U('Admin/Post/index'));
            }     
                 
       
    }

    //配送单修改
    public function edit(){
        $id = I('get.id');
        //查询出所有的分类
        $sends = M('send');             
        //根据id查询要修改的哪个数据
        
        $info = $sends->find($id);
        //分配变量
        $this->assign('sends',$info);
        // var_dump($info);die;
        //解析模板
        $this->display();

    }

    //执行修改
    public function update(){
    	 // var_dump($_POST);die;
    	 $id = $_POST['id'];       
        //创建对象
       	$sends=M('send');
                     
        //创建数据
       	$sends->create();
        //执行更新
        $res=$sends->where(array('id'=>$id))->save();
        // echo $Goods->_sql();die;

        if($res){
             //修改成功
            $this->success('修改成功',U('Admin/Post/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Post/index'));
        }
    }
   
}