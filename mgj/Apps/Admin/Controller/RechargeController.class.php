<?php
namespace Admin\Controller;
use Think\Controller;
class RechargeController extends CommonController {
    //充值列表
 public function index(){
        //创建对象
        $user = M('user');

        //获取关键字
        if(!empty($_GET['keyword'])){
            $where = " username like '%\\".$_GET['keyword']."%'";
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
     
        $res=$user->where($where)->limit($limit)->select();
        //查看sql语句
        // echo $user->_sql();
        // var_dump($Goods);die;
    
        // var_dump($res);               
        // var_dump($res1);die;             
        // var_dump($res);die;
        // var_dump($pic);die;

       

        //分配变量
        $this->assign('users',$res);
        $this->assign('pages',$pages);


        //解析模板
        $this->display();   
    }
//添加充值方法
    public function add(){
        
    	//解析模板
    	$this->display();
    }

//ajax验证用户是否存在
     public function select(){
        $name=$_GET['username'];
        $user=M('user');
        $res=$user->where(array('username'=>$name))->find();       
        $status=$res['status'];
        if($res){
        //用户存在
            if($status == 0){
                 echo 0;
            }else{
                echo 2;
            }
        }else{
            //用户不存在
            echo 1;
        }
        
        
    }    
//执行插入
    public function insert(){
        // var_dump($_POST);die;
        // 创建对象
        $name=$_POST['username'];
        $user = M('user');
        $res=$user->where(array('username'=>$name))->find();
        $id=$res['id'];
        // var_dump($id);die;
       
        $time=date('Y-m-d H:i:s',time());
        $data['status']=1;
        $data['time']=$time;               
        $gold=$res['gold'];
        //新的账户金额
        $data['gold']=$_POST['gold']+$gold;
        // var_dump($data);die;
              
         //执行添加
        $res1=$user->where(array('id'=>$id))->data($data)->save();                
        if($res1){
             //添加成功
            $this->success('充值成功',U('Admin/Recharge/index'));

        }else{
            //失败
            $this->error('充值失败',U('Admin/Recharge/index'));
        }

    }

   

    //账户金额修改
    public function edit(){
        $id = I('get.id');
        $users = M('user');                     
        $info = $users->find($id);        
        //分配变量
        $this->assign('golds',$info);
        $this->assign('user',$info);
        // var_dump($info);die;
        //解析模板
        $this->display();

    }

    //执行修改
    public function update(){
         // var_dump($_POST);die;
         $id = $_POST['id'];       
        //创建对象
        $sends=M('user');
        $data['gold']=$_POST['gold'];
        $data['id']=$id;
        // var_dump($data);die;
                     
        //执行更新
        $res=$sends->data($data)->save();
        // echo $Goods->_sql();die;

        if($res){
             //修改成功
            $this->success('修改成功',U('Admin/Recharge/index'));
        }else{
            //失败
            $this->error('修改失败',U('Admin/Recharge/index'));
        }
    }
   
}