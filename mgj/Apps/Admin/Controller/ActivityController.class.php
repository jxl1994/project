<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController {
    //活动的列表
    public function index(){
    	//创建对象
    	$user = M('activity');

        //获取关键字
        if(!empty($_GET['keyword'])){
            $where = "  name like '%\\".$_GET['keyword']."%'";
        }else{
            $where = '';
        }

        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 5;
        
    	//统计总数
    	$count = $user->where($where)->count();
        // var_dump($count);
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);

    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
        // echo $limit;
    	// 分页显示输出
    	$pages = $Page->show();
    	// var_dump($pages);
    	//查询
        $res=$user->where($where)->select();
        // echo $user->_sql();
        // var_dump($res);die;

       

    	//分配变量
    	$this->assign('res',$res);
    	$this->assign('pages',$pages);


    	//解析模板
    	$this->display(); 	
    }
//添加活动方法
    public function add(){
        
    	//解析模板
    	$this->display();
    }


//执行插入并修改商品表中热销商品折扣价
    public function insert(){
     
        //创建对象
        $activity=M('activity');
        $activity->create();
        // var_dump($_POST);die;


        $res2=$activity->add();
        if($res2){
            $this->success('添加成功',U('Admin/Activity/index'));
        }else{
            $this->error('添加失败',U('Admin/Activity/index'));
        }
       


       
    }

   

//活动方案修改
    public function edit(){
        $id = I('get.id');
        $users = M('activity');                     
        $info = $users->find($id);
        $this->assign('res',$info);
        // var_dump($info);die;
        //解析模板
        $this->display();

    }

    //执行修改
    public function update(){
    	// var_dump($_POST);die;
    	 $id = $_POST['id']; 
        //创建对象
        $activity=M('activity');
        
       	// var_dump($data);die;
                     
        //执行更新
        $activity->create();
        $res=$activity->where('id ='.$id)->save();
        // echo $Goods->_sql();die;
        if($res){
             //修改成功
            $this->success('修改成功',U('Admin/Activity/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Activity/index'));
        }
    }
//删除活动
    public function delete(){
        $id=$_GET['id'];
        // var_dump($id);die;
        //创建对象
        $activity=M('activity');
   
        $res1=$activity->where('id ='.$id)->delete();
        if($res1){
            $this->success('删除成功',U('Admin/Activity/index'));
        }else{
            //失败
            $this->error('删除失败',U('Admin/Activity/index'));
        }
    }
   
}