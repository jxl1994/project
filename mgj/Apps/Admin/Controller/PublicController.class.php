<?php
namespace Admin\Controller;
use Think\Controller;
class PublicController extends Controller {
	//生成验证码
	public function createVcode(){
		$Verify = new \Think\Verify();
		$Verify->entry();
	}
}