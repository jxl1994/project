<?php
namespace Admin\Controller;
use Think\Controller;
class LstxController extends CommonController {
    public function index(){
    	$userimg = M('user_image');
    	// $info = $userimg->order('uid asc')->order('addtime desc')->select();
    	// $sql = 'select * from user_image order by uid asc , addtime desc';

    	 //获取关键字
        if(!empty($_GET['keyword'])){
            $where = "where username like '%\\".$_GET['keyword']."%'";
            $w = "username like '%\\".$_GET['keyword']."%'";
        }else{
            $where = '';
        }

        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 5;
        // var_dump($num);
        
    	//统计总数
    	$count = $userimg->where($w)->count();
        // var_dump($count);
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);
    	// var_dump($Page);

    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
    	// 分页显示输出
    	$pages = $Page->show();
    	// var_dump($pages);
    	
    	$sql = 'select user_image.*, user.username from user_image left join user on user_image.uid = user.id '.$where.' order by uid asc , addtime desc limit '.$limit;
    	// var_dump($sql);die;
    	$info = $userimg->query($sql);
    	// var_dump($info);die;
    	$this->assign('info',$info);
    	$this->assign('pages',$pages);
    	//解析模板
    	$this->display();
    }
    public function del(){
    	$id = $_GET['id'];
    	$userimg = M('user_image');
    	$user = M('user');
        $info = $userimg->where(array('id'=>$id))->find();
        $info1 = $user->where(array('id'=>$info['uid']))->find();
        if($info['pic'] == $info1['pic']){
        	$res1 = $user->delete($info1['id']);
        	$res = $userimg->delete($id);
        	unlink('./Public'.$info['pic']);
        	if($res && $res1){
        		echo 0;
        	}else{
        		echo 1;
        	}
        }else{
        	$res = $userimg->delete($id);
        	unlink('./Public'.$info['pic']);
	    	if($res){
	    		echo 0 ;
	    	}else{
	    		echo 1;
	    	}
        }
    	
    }
}