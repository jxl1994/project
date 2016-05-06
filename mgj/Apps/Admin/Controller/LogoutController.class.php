<?php
namespace Admin\Controller;
use Think\Controller;
class LogoutController extends Controller {
    public function index(){
            $this -> display('logout');
        }
    public function logout(){
            setCookie(session_name(),null,time()-1,'/');
            $_SESSION = array();
            session_destroy();
            $this -> success("退出成功",U('Admin/login/index'));
        }
}