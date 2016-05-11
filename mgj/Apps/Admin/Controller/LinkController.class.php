<?php
namespace Admin\Controller;
use Think\Controller;
class LinkController extends Controller {
    //链接列表
    public function index(){
        //创建对象
        $user = M('link');
        if(!empty($_GET['keyword'])){
             //建议使用数组形式来创建where条件
             // $where['username'] = array('like','%'.$_GET['keyword'].'%');
             $where=" where name like '%\\".$_GET['keyword']."%' ";
         }else{
            $where='';
         }
         //var_dump($where);die;
         //var_dump($where);
        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] :5;
        //var_dump($num);die;      
        //统计总数
        $count = $user->where($where)->count();
        //var_dump($count);die;
        // 实例化分页类
        $Page = new \Think\Page($count,$num);
        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        //var_dump($limit);die;
        // 分页显示输出
        $pages = $Page->show();
        // var_dump($pages);
        //查询
        //$users = $user->limit($limit)->where(array('hs'=>0))->select();
        $sql='select * from link '.$where.' order by id asc limit '.$limit;
        //var_dump($sql);die; 
        //查看sql语句
        $res=$user->query($sql);
        //var_dump($res);die;
        //分配变量
        $this->assign('res',$res);
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
        //var_dump($_POST);die;
        //创建表对象
        $user = M('link');
        //处理图片上传
        if($_FILES['pic']['error'] == 0){
             $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/links/'; // 设置附件上传目录    
            $info   =   $upload->upload(); 
            //var_dump($info);die;   // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['logo']['savepath']. $info['logo']['savename'];
                $_POST['logo'] = $str;
                //var_dump($str);die;
            }   
        }
        $time=date('Y-m-d H:i:s',time());
		$data['logo']=$_POST['logo'];
		$data['name']=$_POST['name'];
		$data['address']=$_POST['address'];
		$data['status']=$_POST['status'];
		$data['addtime']=$time;        
		// var_dump($data);

        
        //执行添加
        //执行插入
        $res = $user->data($data)->add();
        if($res){
            //添加成功
            $this->success('添加成功',U('Admin/Link/index'));
        }else{
            //失败
            $this->error('添加失败',U('Admin/Link/index'));
         }
     
    }

    	//用户修改
    public function edit(){
        // var_dump(I('get.id'));
        //创建对象
        $user = M('link');
        //获取id
        $id = I('get.id');
        //读取数据
        $info = $user->where('link.id = '.$id)->find();
        //echo $user->_sql();die;
        //var_dump($info);die;
        //处理爱好 字段
        // $hobby = explode(',',$info['hobby']);
        //分配变量
        $this->assign('info',$info);
        // $this->assign('hobby',$hobby);
        //解析模板
        $this->display();
    }

    	//执行修改
    public function update(){
        //$id = $_POST['id'];
        //var_dump($_POST);die;     
        //更新主表
        $user = M('link');
        //处理图片上传
        if($_FILES['logo']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/links/'; // 设置附件上传目录    
            $info   =   $upload->upload(); 
            //var_dump($info);die;
         // 上传文件     
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['logo']['savepath']. $info['logo']['savename'];
                // var_dump($str);
                $_POST['logo'] = $str;
            }
            //获取原图的路径
            $res = $user->find($_POST['id']);
            $pic = $res['logo'];
            //var_dump($pic);die;
            //删除图片
            unlink('./Public'.$pic);
        }
        //var_dump($_POST);die;
        //创建数据
         $user->create();
         //执行更新
         $res = $user->save();
         //var_dump($res);die;
         //判断 并给ajax返回数据
       if($res){
            //修改成功
            $this->success('修改成功',U('Admin/Link/index'));
        }else{
            //修改失败
            $this->error('修改失败',U('Admin/Link/index'));
        }

     }

   
    //执行删除
    public function delete(){
        //var_dump(I('get.id'));die;
        //获取id
        $id = I('get.id');
        $user = M('link');
	    //查询图片路径
	    $res =  $user->where('id='.$id)->find();
	    // var_dump($res);die;



        //删除文件夹下的图片
       	//拼接文件夹路径
        $filename1='./Public'.$res['logo'];

	    if(file_exists($filename1)){  
	         unlink($filename1);
	    }else{  
	         echo "图片路径不正确";  
	    }  
        //创建对象模型
        //var_dump($id);
        
        $m = new \Think\Model();//
        // //创建对象 执行删除
         $one = $m->table(__LINK__)->delete($id);    
        // //判断 并给ajax返回数据
        if($one){
            $this->success('删除成功',U('Admin/Link/index'));
         }else{
            $this->error('删除失败',U('Admin/Link/index')); 
         }
    }

    

     
}