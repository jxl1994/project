<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	//功能类似构造方法 率先执行的方法
	public function _initialize(){
		//用户的登录检测
		$id = session('uid');
		// var_dump($id);
		//判断
		if(empty($id)){
			$this->error('请先登录',U('Admin/Login/index'));
		}
		// $AUTH = new \Think\Auth();
		// // var_dump(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME);
		// //类库位置应该位于ThinkPHP\Library\Think\
		// if(!$AUTH->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('uid'))){
  //          $this->error('没有权限',U('Admin/Login/index'));
		// }
	
	}
}