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
        //轮播图遍历
        $carousel=M('carousel');
        $res=$carousel->where(array('statu'=>'0'))->order('id desc')->limit(5)->select();
        
        // var_dump($res);die;
        //分配变量
        $this->assign('res',$res);
        $this->assign('links',$links);
        $this->assign('goods1',$goods1);
        $this->assign('goods2',$goods2);
        $this->assign('goods3',$goods3);
        $this->assign('category',$category);
        $this->display();
    }
}