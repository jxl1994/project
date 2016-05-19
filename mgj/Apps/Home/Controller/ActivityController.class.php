<?php
namespace Home\Controller;
use Think\Controller;
class ActivityController extends Controller {
	// 前台首页
    public function index(){
    	
    	$id=$_GET['id'];
        // var_dump($id);die;
       

    	//查询图片路径
    	$img=M('carousel');
    	$res=$img->where('id ='.$id)->find();
    	// var_dump($res);die
        //查询关联活动id
        $aid=$res['activityid'];
    	//原图片路径
    	$pic=$res['pic'];
    	//原图片存储的路径
    	$y_pic='./Public'.$pic;
    	// var_dump($y_pic);die;
    	//缩放后存储位置
    	$a=strrchr($pic,'/');
    	$b=ltrim($a,'/');
    	// var_dump($b);
    	//拼接新的路劲
    	$path='/Uploads/activitys/s_1000_20_'.$b;
    	$newpic='./Public/Uploads/activitys/s_1000_20_'.$b;
    	// var_dump($newpic);die;
        //创建对象
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
            
        // var_dump($result);

    	
         //查询活动表
        $list=M('activity');
        $re=$list->where(array('id'=>$aid,'status'=>0))->find();
        if($re){
            // echo '有这个活动';
            $status=$re['status'];
             // var_dump($re);die;
            //活动折扣
            $zhekou=$re['zhekou'];
            // var_dump($zhekou);die;
            $zk=$zhekou*10;
            $year=date('Y');
            $m=date('m');
            $d=date('d');
            //判断活动是否过时
            if(($re['month']<= $m) &&($re['day']<$d) ){
               $status=1; 
            }
            //处理月份
            if($re['month'] < 10){
                $month='0'.$re['month'];
            }else{
                $month=$re['month'];
            }
            //处理日期
             if($re['day'] < 10){
                $day='0'.$re['day'];
            }else{
                $day=$re['day'];
            }
            //限时天数         
            $newday=$day+$xianshi;
            //拼接活动结束的时间
            $newtime=$year.'-'.$month.'-'.$day;
            // echo $newtime;die;
            //判断是否过期需要打折
            if($status==0){
                foreach ($result as $k => $v) {
                   $result[$k]['zhekou']=$v['price']*$zhekou;
                }
            }
            // var_dump($result);die;

            // echo $xianshi;die;
        }else{
            // echo '没有这个活动';
            $status=1;
        }
       

                

    	//图片缩放
    	mysf($y_pic,1000,20);   	    	
    	$l=M('category');
    	$data=$l->select();
		$list=array();
		foreach($data as $arr){
		$list[$arr['pid']][]=$arr;//重新整理数据排序。
			}
        $this->assign('jz',$newtime);    
		$this->assign('id',$aid);
        $this->assign('status',$status);
        $this->assign('zk',$zk);      
		$this->assign('pic',$path);	
		$this->assign("list",$list);
		$this->assign("result",$result);
        $this->display();
    }
}