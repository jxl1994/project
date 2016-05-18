<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	// 前台首页
    public function index(){
    	//友情链接
    	$link=M('link');
        $links=$link->where(array('status'=>'已审核'))->select();
        //var_dump($res);die;
        //商品遍历
        $good=M('goods');
        $goods1=$good->limit(0,6)->order('id desc')->where(array('statu'=>'上架'))->select();
        //var_dump($goods1);die;
        $goods2=$good->limit(6,6)->order('id desc')->where(array('statu'=>'上架'))->select();
        //var_dump($goods2);die;
        $goods3=$good->limit(12,6)->order('id desc')->where(array('statu'=>'上架'))->select();
        //var_dump($goods3);die;
        //广告
        $adver=M('adver');
        $advers=$adver->limit(5)->where(array('status'=>'已审核'))->select();
         //分类
        // var_dump($advers);die;
        $category=M('category');
    	$data=$category->select();
		$list=array();
		foreach($data as $arr){
            //var_dump($data);die;
            //var_dump($arr);die;
		$list[$arr['pid']][]=$arr;//重新整理数据排序。
        //var_dump($list);die;
			}



        //轮播图遍历
        $carousel=M('carousel');

		// var_dump($num);die;
        $res=$carousel->where(array('statu'=>'0'))->order('id desc')->limit(5)->select();
        // $res1=count($res);
        // var_dump($res);die;
        $good=M('goods');
		$goods=$good->select();
        //分配变量
        $this->assign('res',$res);        
		$this->assign("list",$list);
		$this->assign("goods",$goods);
        $this->assign('advers',$advers);
        $this->assign('links',$links);
        $this->assign('goods1',$goods1);
        $this->assign('goods2',$goods2);
        $this->assign('goods3',$goods3);
        $this->assign('category',$category);
        $this->display();
    }
    //ajax查询
    public function select(){
        $user=M('activity');
        $sql='select * from activity where status=0';
        $res=$user->query($sql);
        foreach ($res as $k => $v) {
            
        }
        //拼接图片存放路径
        $pic=$v['pic'];
        if($res){
            // 查到数据 ,返回图片路径
            echo $pic;
        }else{
            //没查到数据
            echo 0;
        }
        

    }
}