<?php
namespace Admin\Controller;
use Think\Controller;
class NoticeController extends CommonController {
    //用户的列表
    public function index(){
    	//创建对象
    	$notice = M('notice');
        // var_dump($_GET);
        // dump($_GET);
        //获取关键字
        if(!empty($_GET['keyword'])){
            //建议使用数组形式来创建where条件
            // $where['username'] = array('like','%'.$_GET['keyword'].'%');
            $where = "name like '%".$_GET['keyword']."%'";
        }else{
            $where = '';
        }

        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 5;
        
    	// //统计总数
    	$count = $notice->where($where)->count();
    	// // 实例化分页类
    	$Page = new \Think\Page($count,$num);
    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
    	// 分页显示输出
    	$pages = $Page->show();

        // $list = $notice->select();
        $list = $notice->order("time desc")->limit($limit)->select();
        // var_dump($list);die;

    	//分配变量
        $this->assign("list",$list);
    	// $this->assign('list',$list);
    	$this->assign('pages',$pages);

    	//解析模板
    	$this->display(); 	
    }
    //用户的添加
    public function add(){

    	//解析模板
    	$this->display();
    }
    //执行插入
    public function insert(){
    	//创建表对象
    	$notice = M('notice');

    	//创建数据
    	$notice->create();
        $time=date('Y-m-d H:i:s',time());
        $p['time']=$time;
        $p['name']=$_POST['name'];
        $p['content']=$_POST['content'];
        
    	//执行添加
    	// $uid = $notice->add();
    	$res=$notice->data($p)->add();
        // var_dump($res);die;

        // $this->assign("list",$list);
    	if($res){
    		//添加成功
    		$this->success('添加成功',U('Admin/Notice/index'));
    	}else{
    		//失败
    		$this->error('添加失败',U('Admin/Notice/index'));
    	}
    }

 

    //执行删除
    public function delete(){
       // var_dump();
        $id = I('get.id');
        $notice = M('notice');
        $info = $notice->find($id);
       //  //拼接path
       //  $path = $info['path'].$info['id'].',';
       //  // 删除子类信息
       $res =  $notice->where('id='.$id)->delete();

      
       //执行添加
        if($res){
             //添加成功
            $this->success('删除成功',U('Admin/Notice/index'));
        }else{
            //失败
            $this->error('删除失败',U('Admin/Notice/index'));
        }
    }

    //用户修改
    public function edit(){
        //var_dump(I('get.id'));die;
        //创建对象
        $notice = M('notice');
        //获取id
        $id = I('get.id');
        //读取数据
         $info = $notice->where(' notice.id ='.$id)->find();
        // echo $user->_sql();die;

        //分配变量
        $this->assign('info',$info);
        //解析模板
        $this->display();
    }

    //执行修改
    public function update(){
        //var_dump($_POST);die;
        $id = $_POST['id'];  
        //var_dump($id);die;     
        //更新主表
        $notice = M('notice');

        $info = $notice->where('id = '.$id)->find();
        //var_dump($_POST);die;
      
        //创建数据
        $notice->create();
        //执行更新
        $res = $notice->save();
        // $res = $notice->where('id = '.$_POST['id'])->save();
        // var_dump($_POST);die;

        //  $res2 = $userinfo->where(array('uid'=>$id))->save();
        // var_dump($_POST);die;

         //判断 并给ajax返回数据
       if($res){
            //添加成功
            $this->success('修改成功',U('Admin/Notice/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Notice/index'));
        }

    }

    public function ajaxRequest(){
        //只处理ajax请求
    }
}