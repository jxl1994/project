<?php
namespace Home\Controller;
use Think\Controller;
class ListController extends Controller {
	// 前台首页
    public function lb(){
    	$l=M('category');
    	$data=$l->select();
		$list=array();
		foreach($data as $arr){
		$list[$arr['pid']][]=$arr;//重新整理数据排序。
			}
		$good=M('goods');
		//$goods=$good->select();
		//显示分类下的商品
		if(isset($_GET['id'])){
				$sql="SELECT * FROM goods WHERE typeid IN(SELECT id FROM category WHERE pid={$_GET['id']}) or typeid={$_GET['id']}";
			}else{
				//代表默认显示所有商品
				$sql="SELECT * FROM goods";
			}
			$result = $good->query($sql);
			
		//var_dump($result);die;
		$this->assign("list",$list);
		$this->assign("result",$result);
        $this->display();
    }
}