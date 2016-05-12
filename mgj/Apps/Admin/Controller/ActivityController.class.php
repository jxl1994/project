<?php
namespace Admin\Controller;
use Think\Controller;
class ActivityController extends CommonController {
    //配送的列表
    public function index(){
    	//创建对象
    	$user = M('activity');

        //获取关键字
        if(!empty($_GET['keyword'])){
            $where = "  name like '%\\".$_GET['keyword']."%'";
        }else{
            $where = '';
        }

        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 5;
        
    	//统计总数
    	$count = $user->where($where)->count();
        // var_dump($count);
    	// 实例化分页类
    	$Page = new \Think\Page($count,$num);

    	//获取limit
    	$limit = $Page->firstRow.','.$Page->listRows;
        // echo $limit;
    	// 分页显示输出
    	$pages = $Page->show();
    	// var_dump($pages);
    	//查询
        $res=$user->where($where)->select();
        // echo $user->_sql();
        // var_dump($res);die;

       

    	//分配变量
    	$this->assign('res',$res);
    	$this->assign('pages',$pages);


    	//解析模板
    	$this->display(); 	
    }
//添加活动方法
    public function add(){
        
    	//解析模板
    	$this->display();
    }


//执行插入并修改商品表中热销商品折扣价
    public function insert(){
        // var_dump($_FILES);
        // var_dump($_POST);die;
        $a=$_POST['zhekou'];
        // var_dump($a);

        // 创建对象
        $goods=M('goods');
        $res=$goods->where(array('rexiao'=>'热销'))->select();
        //批量修改商品折扣后的价格
        foreach ($res as $k => $v) {
          $res[$k]['zhekou']=$v['price']*$a;
          $data['zhekou']=$res[$k]['zhekou'];
          // var_dump($data);die;
          $res1=$goods->where(array('id'=>$res[$k]['id']))->data($data)->save();
          

        }

        // var_dump($res1);

         //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/activitys/'; // 设置附件上传目录    
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

        //创建对象
        $activity=M('activity');
        $activity->create();
        // var_dump($_POST);die;


        $res2=$activity->add();
        if($res2){
            $this->success('添加成功',U('Admin/Activity/index'));
        }else{
            $this->error('添加失败',U('Admin/Activity/index'));
        }
       


       
    }

   

//活动方案修改
    public function edit(){
        $id = I('get.id');
        $users = M('activity');                     
        $info = $users->find($id);
        $this->assign('res',$info);
        // var_dump($info);die;
        //解析模板
        $this->display();

    }

    //执行修改
    public function update(){
    	// var_dump($_POST);die;
    	 $id = $_POST['id']; 
        //创建对象
        $activity=M('activity');
         //处理图片上传
        if($_FILES['pic']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/activitys/'; // 设置附件上传目录    
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
            $res = $activity->find($_POST['id']);
            $pic = $res['pic'];
            // var_dump($pic);die;
            //删除图片
            unlink('./Public'.$pic);
        }      

       	$data['name']=$_POST['name'];
       	$data['id']=$id;
        $data['status']=$_POST['status'];
        $data['zhekou']=$_POST['zhekou'];
        $data['pic']=$_POST['pic'];
        $data['month']=$_POST['month'];
        $data['day']=$_POST['day'];
        $data['time']=$_POST['time'];


       	// var_dump($data);die;
                     
        //执行更新
        $res=$activity->data($data)->save();
        // echo $Goods->_sql();die;

        if($res){
             //修改成功
            $this->success('修改成功',U('Admin/Activity/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Activity/index'));
        }
    }
//删除活动
    public function delete(){
        $id=$_GET['id'];
        // var_dump($id);die;
        //创建对象
        $activity=M('activity');
        //查询出图片路径
        $res =  $activity->where('id='.$id)->find();
        $pic=$res['pic'];

        //删除文件夹下的图片
         //拼接文件夹路径
        $filename='./Public'.$pic;

            if(file_exists($filename)){  
                unlink($filename);
            }else {  
                echo "图片路径不正确";  
            }   

        $res1=$activity->where('id ='.$id)->delete();
        if($res1){
            $this->success('删除成功',U('Admin/Activity/index'));
        }else{
            //失败
            $this->error('删除失败',U('Admin/Activity/index'));
        }
    }
   
}