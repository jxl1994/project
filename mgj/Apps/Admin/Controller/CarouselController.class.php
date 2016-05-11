<?php
namespace Admin\Controller;
use Think\Controller;
class CarouselController extends CommonController {
    //轮播的列表
    public function index(){
    	//创建对象
        $Goods = M('carousel');

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
        $sql="select carousel.*,category.catename from carousel left join category on carousel.cateid = category.id ".$where." order by carousel.id desc limit ".$limit;
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
//添加轮播图
    public function add(){
        //创建表对象
        $cate = M('category');
        $cates = $cate->select();
        foreach ($cates as $k => $v) {
            //计算出分隔多少次
            $c = count(explode(',',$v['path']))-1;
            $cates[$k]['catename'] = str_repeat('-----',$c).$v['catename'];
        }
        // var_dump($cates);die;
        //分配变量
        $this->assign('cates',$cates);

        //解析模板
        $this->display();
    }
//执行插入
    public function insert(){
        // var_dump($_POST);die;
        // 创建对象
        $Goods = M('carousel');
         //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/carousels/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['pic']['savepath']. $info['pic']['savename'];
                // var_dump($str);
                $_POST['pic'] = $str;
            }
          
        }
        // var_dump($_POST);die;
        //创建数据
        $Goods->create();
        //执行添加
        $res=$Goods->add();
        // 创建对象  
        if($res){
             //添加成功
            $this->success('添加成功',U('Admin/Carousel/index'));


        }else{
            //失败
            $this->error('添加失败',U('Admin/Carousel/index'));
        }

    }

    //执行删除
    public function delete(){
	       // var_dump();
	        $id = I('get.id');
	        $Goods = M('carousel');
            //查询图片路径
            $res =  $Goods->where('id='.$id)->find();
             //拼接文件夹路径
            $filename='./Public'.$res['pic'];

            if(file_exists($filename)){  
                unlink($filename);
            }else {  
                echo "图片路径不正确";  
            }   
  
        // 删除信息
      		 $res =  $Goods->where('id='.$id)->delete();
       // echo $Goods->_sql();
              
            if($res){
                
                    $this->success('删除成功',U('Admin/Carousel/index'));

            }else{
                $this->error('删除失败',U('Admin/Carousel/index'));
            }     
                 
       
    }

//轮播图修改
    public function edit(){
        $cateid = I('get.cateid');
        $id=I('get.id');
        // var_dump($_GET);die;


        //查询出所有的分类
        $cate = M('category');
        $cates = $cate->query('select * from category where id != '.$cateid.' order by concat(path,id) asc');
        
        foreach ($cates as $k => $v) {
            //计算出分隔多少次
            $c = count(explode(',',$v['path']))-1;
            $cates[$k]['catename'] = str_repeat('-----',$c).$v['catename'];
        }
        // var_dump($cates);
        //分配变量
        $this->assign('cates',$cates);
        $sends = M('carousel');             
        //根据id查询要修改的哪个数据
        
        $info = $sends->find($id);
        //分配变量
        $this->assign('sends',$info);
        // var_dump($info);die;
        //解析模板
        $this->display();

    }

    //执行修改
    public function update(){
    	// var_dump($_POST);die;
    	$id = $_POST['id'];
          //创建对象
        $sends=M('carousel');
         //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/carousels/'; // 设置附件上传目录    
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
            $res = $sends->find($_POST['id']);
            $pic = $res['pic'];
            // var_dump($pic);die;

            //删除图片
            unlink('./Public'.$pic);
        }
        // var_dump($_POST);die;

       
      
                     
        //创建数据
       	$sends->create();
        //执行更新
        $res=$sends->where(array('id'=>$id))->save();
        // echo $Goods->_sql();die;

        if($res){
             //修改成功
            $this->success('修改成功',U('Admin/Carousel/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Carousel/index'));
        }
    }
   
}