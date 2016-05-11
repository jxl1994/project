<?php
namespace Admin\Controller;
use Think\Controller;
class GoodsController extends CommonController {
    //商品的列表
    public function index(){
    	//创建对象
    	$Goods = M('Goods');

        //获取关键字
        if(!empty($_GET['keyword'])){
            $where = "where name like '%\\".$_GET['keyword']."%'";
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
        $sql="select goods.*,detail.num,category.catename from goods left join detail on goods.id = detail.gid left join category on goods.typeid = category.id ".$where." order by goods.id asc limit ".$limit;
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
    //商品的添加
    public function add(){
        //创建表对象
        $cate = M('category');
        $cates = $cate->query('select * from category order by concat(path,id) asc');
        
        foreach ($cates as $k => $v) {
            //计算出分隔多少次
            $c = count(explode(',',$v['path']))-1;
            $cates[$k]['catename'] = str_repeat('-----',$c).$v['catename'];
        }

        //分配变量
        $this->assign('cates',$cates);

    	//解析模板
    	$this->display();
    }
    //执行插入
    public function insert(){
  
        // 创建对象
        // $Goods = M('Goods');
    	$Goods = D('Goods');

        //创建数据
        if(!$Goods->create()){
        	//获取错误信息
        	$info = $Goods->getError();
        	$this->error($info,'',3);
        }
        // var_dump($_POST['pic']);
    
       

        //创建数据
        $Goods->create();
        //执行添加
        $gid=$Goods->add();
        //添加商品详情表
        $detail= D('detail');
        //添加关联id
        $_POST['gid']=$gid;
        //创建数据
        $detail->create();
        //执行添加
        $res=$detail->add();

      

        if($res){
             //添加成功
            $this->success('添加成功',U('Admin/Goods/index'));


        }else{
            //失败
            $this->error('添加失败',U('Admin/Goods/index'));
        }

    }

    //执行删除
    public function delete(){
	       // var_dump();
	        $id = I('get.id');
	        $Goods = M('Goods');
	        //查询图片路径
	        $res =  $Goods->where('id='.$id)->find();

	        // var_dump($res);
	       //查询小图标
             $goods_image=M('goods_image');
             $sql='select * from goods_image where ggid='.$id;
             $result=mysql_query($sql);

             
           
             
             while($row=mysql_fetch_assoc($result)){
                $filename2='./Public'.$row['minpic'];
                if(file_exists($filename2)){  
                
                    unlink($filename2); 
                }else {  
                    echo "图片不存在";  
                }   

             }

	        
		    // var_dump($filename1);  
		    // var_dump($filename2);die; 

	        //删除文件夹下的图片
       		 //拼接文件夹路径
            $filename1='./Public'.$res['pic'];

	     	if(file_exists($filename1)){  
	            unlink($filename1);
	        }else {  
	           	echo "图片路径不正确";  
	        }   
        // 删除信息
      		 $res1 =  $Goods->where('id='.$id)->delete();
       // echo $Goods->_sql();
       //删除详情表
      		 $detail=M('detail');
      		 $res2 =  $detail->where('gid='.$id)->delete();
       		// echo $detail->_sql();die;
       
             if( $res1 && $res2){
                if($result){
                    //查到有小图则执行删除
                    $sql1='delete from goods_image where ggid='.$id;
                    $result1=mysql_query($sql1);
                    $this->success('删除成功',U('Admin/Goods/index'));
                }

             }else{
                $this->error('删除失败',U('Admin/Goods/index'));
             }     
                 
       
    }

    //商品修改
    public function edit(){
        $id = I('get.id');
        //查询出所有的分类
        $cate = M('category');
        $cates = $cate->query('select * from category order by concat(path,id) asc');
        
        foreach ($cates as $k => $v) {
            //计算出分隔多少次
            $c = count(explode(',',$v['path']))-1;
            $cates[$k]['catename'] = str_repeat('-----',$c).$v['catename'];
        }

      	// var_dump($cates);die;
        $Goods = M('Goods');        
        //根据id查询要修改的哪个数据
        
        $info = $Goods->query('select goods.*,category.catename,detail.* from goods left join category on goods.typeid = category.id left join detail on goods.id = detail.gid where goods.id ='.$id);
        // echo $Goods->_sql();
        foreach ($info as $k=> $v) {
        	$arr=$v;
        }
        // var_dump($arr);die;
        //分配变量
        $this->assign('cates',$cates);
        $this->assign('arr',$arr);
        // var_dump($arr);die;
        //解析模板
        $this->display();

    }

    //执行修改
    public function update(){
    	 // var_dump($_POST);die;
    	 $id = $_POST['goodsid'];       
        //更新主表
       	$Goods=M('Goods');
        //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/goods/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);
                $_POST['pic'] = $str;
            }
            //获取原图的路径
            $res = $Goods->find($_POST['goodsid']);
            $pic = $res['pic'];
            // var_dump($pic);die;
            //删除图片
            unlink('./Public'.$pic);
        }
        // var_dump($_POST);die;
        


      
        //创建数据
       	$Goods->create();
        //执行更新
        $res1=$Goods->where(array('id'=>$id))->save();
        // echo $Goods->_sql();die;

        //查询数据库detail表            	   
        $details = M('detail');      
        // die;
        $details->create();      
        $res2 = $details->where(array('gid'=>$id))->save();
        // echo $details->_sql();die;
          //执行添加
        if($res1 || $res2){
             //添加成功
            $this->success('修改成功',U('Admin/Goods/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Goods/index'));
        }
    }
    //添加商品小图
    public function smailpic(){
        // session_start();
        // var_dump($_SESSION);die;
        // var_dump($_GET);die;
        $goodsid=$_GET['ggid'];
        // var_dump($goodsid);
        //分配变量 
        $this->assign('goodsid',$goodsid);  
        //解析模板
        $this->display(); 
    }
    //执行添加小图
    public function Pic_insert(){
        // var_dump($_FILES['pic']);die;
        $id=$_POST['gid'];
        // var_dump($id);die;
        // 创建对象
        // $Goods = M('Goods');
        $Goods = D('goods_image');

        //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/goods/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);die;
                $_POST['pic'] = $str;
            }
           
        }
        // var_dump($_POST);die;
        $sql="insert into goods_image(minpic,ggid) values('{$_POST['pic']}','{$id}')";
        // echo $sql;die;
        $res=mysql_query($sql);
         if($res){
             //添加成功
            $this->success('添加成功',U('Admin/Goods/index'));


        }else{
            //失败
            $this->error('添加失败',U('Admin/Goods/index'));
        }


    }
}