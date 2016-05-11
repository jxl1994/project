<?php
namespace Admin\Controller;
use Think\Controller;
class PingjiaController extends CommonController {
    public function index(){
    	$pj = M('pingjia');
    	// $info = $pj->select();
    	// $sql='select think_auth_group_access.*, user.*, think_auth_group.* from user left join think_auth_group_access on think_auth_group_access.uid = user.id  join think_auth_group on think_auth_group_access.group_id = think_auth_group.id limit '.$limit; 
    	// $_GET['keyword'] = 'a';
    	if(!empty($_GET['keyword'])){
             //建议使用数组形式来创建where条件
             // $where['username'] = array('like','%'.$_GET['keyword'].'%');
             $where=" where goods.name like '%\\".$_GET['keyword']."%'";
         }else{
            $where='';
         }
        // var_dump($where);die;
         //var_dump($where);
        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] :5;
        //var_dump($num);die;      
    	//统计总数
    	$count = $pj->where($where)->count();
        // var_dump($count);die;
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);
    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
        //var_dump($limit);die;
    	// 分页显示输出
    	$pages = $Page->show();
        
    	$sql = 'select pingjia.*, user.username, user.id as userid, goods.id as gid, goods.name , orders.id as oid from pingjia left join user on pingjia.uid = user.id  left join goods on pingjia.spid = goods.id left join orders on pingjia.orderid = orders.id order by pingjia.id desc '.$where.' limit '.$limit;
    	// var_dump($sql);die;
        // echo $sql;
    	$info = $pj->query($sql);
    	// var_dump($info);

    	//分配变量
    	$this->assign('pj',$info);
    	$this->assign('pages',$pages);

    	//解析模板
    	$this->display();
    }
    public function delete(){
    	// var_dump(I('get.id'));die;
        //获取id
        $id = I('get.id');
        //创建对象模型
        //var_dump($id);
        $pj = M('pingjia');
         //创建对象 执行删除
         $res = $pj->table('pingjia')->delete($id);    
        //判断 并给ajax返回数据
        if($res){
            $this->success('删除成功',U('Admin/Pingjia/index'));
         }else{
            $this->error('删除失败',U('Admin/Pingjia/index')); 
         }
    }
} 