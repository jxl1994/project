<?php
namespace Home\Controller;
use Think\Controller;
class PersonalController extends Controller {
    public function index(){
        // session_start();
         // $id = $_SESSION['mgj']['id'];
        $id = $_SESSION['uid'];
        // var_dump($id);
        $mod = M('user_info');


        $list=$mod->query("select * from user left join user_info on user.id = user_info.uid where user.id={$id}");
        // var_dump($list);die;


        // echo $mod->_sql();die;
        $pic = $list[0]['pic'];
        // var_dump($pic);die;
    		if($pic==null){
    			$this -> assign("pic","Home/images/tx.jpg");
    		}else{
    			$this -> assign("pic",$pic);
    		}

    		// var_dump($list);die;
    		 // var_dump($pic);die();

    		//分配变量
    		$this->assign("list",$list);
        	$this->display();

    }
    //用户的添加
    public function add(){
    	//解析模板
    	$this->display();
    }
    //执行插入
    public function insert(){
    	//创建表对象
    	//var_dump($_POST);
    	$user = M('user_info');
        $res=$user->where('uid='.$_SESSION['uid'])->find();
         // var_dump($res);die;
        if($res){
            //数据存在 执行修改
            $users = M('user_info');
            $users->create();
            $ress=$users->where('uid='.$_SESSION['uid'])->save();
            //echo $users->_sql();
            if($ress){
            //添加成功
                $this->success('修改成功',U('Home/Personal/index'));
            }else{
            //失败
                $this->error('修改失败',U('Home/Personal/index'));
        }
            //var_dump($ress);
        }else{
            //数据不存在 执行添加
            // add
            $users = M('user_info');
            $_POST['uid']=$_SESSION['uid'];
            $users->create();
            $ress=$users->add();
            //var_dump($ress);
            if($ress){
            //添加成功
                $this->success('添加成功',U('Home/Personal/index'));
            }else{
                //失败
                $this->error('添加失败',U('Home/Personal/index'));
            }
        }
    	
    }

    //修改头像 
 
    public function photo(){
        $user = M('user');
        $user_image = M('user_image');
        $uid = $_SESSION['uid'];
        $sql = 'select * from user where id='.$uid;
        $info = $user->query($sql);

        $this->assign('pic',$info);


        // 分页
        //获取每页显示的数量
        $num = !empty($_GET['num']) ? $_GET['num'] : 8;
        // var_dump($num);
        
        //统计总数
        $count = $user_image->where(array('uid'=>$uid))->count();
        // var_dump($count);
        // 实例化分页类
        $Page = new \Think\Page($count,$num);
        // var_dump($Page);

        //获取limit
        $limit = $Page->firstRow.','.$Page->listRows;
        // 分页显示输出
        $pages = $Page->show();
        // var_dump($pages);

        // 历史头像
        $head = $user_image->where(array('uid'=>$uid))->order('addtime desc')->limit($limit)->select(); 
        // var_dump($head);die;
        $this->assign('head',$head);
        $this->assign('pages',$pages);
        $this->display();

    }
    //执行插入
    public function head(){
        $uid = $_SESSION['uid'];
        //处理图片上传
        if($_FILES['img']['error'] == 0){
            $upload = new \Think\Upload();// 实例化上传类    
            $upload->maxSize   =   3145728 ;// 设置附件上传大小   
            $upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath = './Public';//手动设置网站根目录
            $upload->savePath  =   '/Uploads/head/'; // 设置附件上传目录    
            $info   =   $upload->upload();    // 上传文件 
            // var_dump($info); die;   
            if(!$info) {// 上传错误提示错误信息        
                $this->error($upload->getError());    
            }else{// 上传成功       
                // $this->success('上传成功！'); 
                $str = $info['img']['savepath']. $info['img']['savename'];
                // var_dump($str);die();
                $_POST['img'] = $str;
            }
        }
        // var_dump($_POST);
       
        $time=date('Y-m-d H:i:s',time());
        $img=$_POST['img'];
        $user = M('user');
        $userinfo = M('user_image');
        if(!empty($img)){
            $arr1 = array(
                'uid'=>$uid,
                'pic'=>$img,
                'addtime'=>$time
                );
            $res1 = $userinfo->add($arr1);

            // var_dump($img);die;
            $sql = 'select pic from user where id = '.$uid;
            if($sql){
                $sql1 = "update user set pic = '{$img}' where id = {$uid}";
            }else{
                $sql1 = "insert into user(`pic`) values('{$img}') where id = {$uid}"; 
            }
            
            $res2 = $user->query($sql1);
            // var_dump($res);die;
            if($res1 || $res2){
                //添加成功
                $this->success('修改成功',U('Home/Personal/photo'));
            }else{
                //失败
                $this->error('修改失败',U('Home/Personal/photo'));
            }
        }else{
            $this->error('请选择要上传的头像',U('Home/Personal/photo'));
        }
        
    }
    //头像修改
    public function update(){
        $id = $_GET['id'];
        $userimg = M('user_image');
        $user = M('user');
        $info = $userimg->where(array('id'=>$id))->find();
        $sql = "update user set pic = '{$info[pic]}' where id = {$info['uid']} ";
        $res = $user->query($sql);
        if($res){
            echo 0;
        }


    }
    // 头像删除
    public function delete(){
         $id = $_GET['id'];
         $userimg = M('user_image');
         $user = M('user');
         $info = $userimg->where(array('id'=>$id))->find();
        $info1 = $user->where(array('id'=>$info['uid']))->find();
        if($info['pic'] == $info1['pic']){
            echo 1;
        }else{
            $res = $userimg->delete($id);
            unlink('./Public'.$info['pic']);
            if($res){
                echo 0;
            }
        }
    }

        public function xgmm(){
            $uid = $_SESSION['uid'];
            $user = M('user');
            $info = $user->where(array('id'=>$uid))->find();
            // var_dump($info);die;
            $pic = $info['pic'];
            if($pic==null){
                $this -> assign("pic","Home/images/tx.jpg");
            }else{
                $this -> assign("pic",$pic);
            }
            $this->display();
        }

    // 确认修改密码
        public function up(){
            $uid = $_SESSION['uid'];
            // var_dump($_POST);
            //实例化
            $mod=M("user");
            $newpass=md5($_POST['newpass']);
            $arr = array('password'=>$newpass);
            // var_dump($data);die;
            $res = $mod->where(array('id'=>$uid))->save($arr);
            if($res){
                $this->success("修改成功,请重新登录",U("Home/User/login"));
                }else{
                    $this->error("修改失败",U('Home/Personal/xgmm'));
                }
        }



    // ajax验证
        public function ajaxRequery(){
            $oldpass = md5($_POST['oldpass']);
            $uid = $_SESSION['uid'];
            $user = M('user');
            $info = $user->where(array('id'=>$uid))->find();
            if($oldpass == $info['password']){
                echo 0;

            }else{
                echo 1;
            }
        }

}



 