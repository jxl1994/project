<?php
namespace Admin\Controller;
use Think\Controller;
class QuanXianController extends CommonController {
//权限规则的列表
    public function index(){
    	//创建对象
    	$user = M('think_auth_rule');
         //var_dump($_GET);
         //dump($_GET);
         if(!empty($_GET['keyword'])){
             //建议使用数组形式来创建where条件
             // $where['username'] = array('like','%'.$_GET['keyword'].'%');
             $where=" where title like '%\\".$_GET['keyword']."%'";
         }else{
            $where='';
         }
         //var_dump($where);die;
         //var_dump($where);
        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] :5;
        //var_dump($num);die;      
    	//统计总数
    	$count = $user->where($where)->count();
        //var_dump($count);die;
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);
    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
        //var_dump($limit);die;
    	// 分页显示输出
    	$pages = $Page->show();
    	// var_dump($pages);
    	//查询
    	//$users = $user->limit($limit)->where(array('hs'=>0))->select();
    	$sql='select * from think_auth_rule '.$where.' order by id asc limit '.$limit; 
        //查看sql语句
        $res=$user->query($sql);
        //var_dump($res);die;
    	//分配变量
    	$this->assign('res',$res);
    	$this->assign('pages',$pages);
    	//解析模板
    	$this->display(); 	
    }
//添加新的权限规则
    public function add(){
    	//解析模板
    	$this->display();
    }
//执行插入新的权限
    public function insert(){
        // var_dump($_POST);die;
    	//创建表对象
    	$user = M('think_auth_rule');
    	
    	//创建数据
    	$user->create();
    	//执行添加
    	$res = $user->add();
        // echo $user->_sql();die;
    	if($res){
    		//添加成功
    		$this->success('添加成功',U('Admin/QuanXian/index'));
    	}else{
    		//失败
    		$this->error('添加失败',U('Admin/QuanXian/index'));
    	}
    }
//删除权限
    public function delete(){
        $id=$_GET['id'];
        //var_dump($id);
        //创建对象
        $user=M('think_auth_rule');
        $res=$user->delete($id);
        // echo $user->_sql();die;
        // var_dump($res);
        if($res){
            $this->success('删除成功',U('Admin/QuanXian/index'));
        }else{
            $this->error('删除失败',U('Admin/QuanXian/index'));
        }
    }
   
//权限规则的修改
    public function edit(){
        // var_dump(I('get.id'));
        //创建对象
        $user = M('think_auth_rule');
        //获取id
        $id = I('get.id');
        //读取数据
        $info = $user->where('id = '.$id)->find();
        //echo $user->_sql();
        // var_dump($info);die;
        //分配变量
        $this->assign('info',$info);
        //解析模板
        $this->display();
    }

//权限规则执行修改
    public function update(){
        $id=I('post.id');
        // var_dump($_POST);die;
        $user = M('think_auth_rule');
        $user->create();
        $res=$user->save();
        // echo $user->_sql();die;
        if($res){
            //修改成功
            $this->success('修改成功',U('Admin/QuanXian/index'));
        }else{
            //修改失败
            $this->error('修改失败',U('Admin/QuanXian/index'));
        }
     }
//组权限添加
     public function Group_add(){
        //创建对象
        $user = M('think_auth_rule');
        $res=$user->select();
        // echo $user->_sql();
        // var_dump($res);die;
        //分配变量
        $this->assign('rules',$res);
        //解析模板
        $this->display();
     }
   
//组权限执行添加
     public function Group_insert(){
        // var_dump($_POST);
        //创建表对象
        $user = M('think_auth_group');
        //将数组处理成字符串
        $str=implode(',',$_POST['rules']);
        // var_dump($str);
        //创建数据
        $data['title']=$_POST['title'];
        $data['rules']=$str;
        $data['status']=$_POST['status'];
        // var_dump($data);die;
        //执行添加
        $res = $user->data($data)->add();
        // echo $user->_sql();die;
        if($res){
            //添加成功
            $this->success('添加成功',U('Admin/QuanXian/Group_index'));
        }else{
            //失败
            $this->error('添加失败',U('Admin/QuanXian/Group_index'));
        }
    }

//组权限的列表
    public function Group_index(){
        //创建对象
        $user = M('think_auth_group');
         //var_dump($_GET);
         //dump($_GET);
         if(!empty($_GET['keyword'])){
             //建议使用数组形式来创建where条件
             // $where['username'] = array('like','%'.$_GET['keyword'].'%');
             $where=" where title like '%\\".$_GET['keyword']."%'";
         }else{
            $where='';
         }
         //var_dump($where);die;
         //var_dump($where);
        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] :5;
        //var_dump($num);die;      
        //统计总数
        $count = $user->where($where)->count();
        //var_dump($count);die;
        // 实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //var_dump($limit);die;
        // 分页显示输出
        $pages = $Page->show();
        // var_dump($pages);
        //查询
        //$users = $user->limit($limit)->where(array('hs'=>0))->select();
        $sql='select * from think_auth_group '.$where.' order by id asc limit '.$limit; 
        //查看sql语句
        $res=$user->query($sql);
        // var_dump($sql);
        //分配变量
        $this->assign('res',$res);
        $this->assign('pages',$pages);
        //解析模板
        $this->display();   
    }
//删除用户组
    public function Group_delete(){
        $id=$_GET['id'];
        //var_dump($id);
        //创建对象
        $user=M('think_auth_group');
        $res=$user->delete($id);
        // echo $user->_sql();die;
        // var_dump($res);
        if($res){
            $this->success('删除成功',U('Admin/QuanXian/Group_index'));
        }else{
            $this->error('删除失败',U('Admin/QuanXian/Group_index'));
        }
    }
//用户组修改
    public function Group_edit(){
        // var_dump(I('get.id'));
        //创建对象
        $user = M('think_auth_group');
        //获取id
        $id = I('get.id');
        //读取数据
        $info = $user->where('id = '.$id)->find();
        //echo $user->_sql();
        // var_dump($info);
        //创建对象 查询规则
        $user = M('think_auth_rule');
        $res=$user->select();
        // echo $user->_sql();
        // var_dump($res);die;
        //分配变量
        $this->assign('rules',$res);

        //分配变量
        $this->assign('info',$info);
        //解析模板
        $this->display();
    }
 //用户组执行修改
    public function Group_update(){
        $id=I('post.id');
        // var_dump($_POST);
        //将数组转换成字符串
        $str=implode(',',$_POST['rules']);
        // var_dump($str);die;
        $user = M('think_auth_group');
        $data['title']=$_POST['title'];
        $data['rules']=$str;
        $data['status']=$_POST['status'];
        // var_dump($data);die;
        $res=$user->data($data)->where('id ='.$id)->save();
        // echo $user->_sql();die;
        if($res){
            //修改成功
            $this->success('修改成功',U('Admin/QuanXian/Group_index'));
        }else{
            //修改失败
            $this->error('修改失败',U('Admin/QuanXian/Group_index'));
        }
     }      

}