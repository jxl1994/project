<?php 

// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){    
	$verify = new \Think\Verify();    
	return $verify->check($code, $id);
}

//处理上传图片
function dealPic(){
	// echo 'llllll';
    // var_dump($_FILES);
	//处理图片上传
	if($_FILES['pic']['error'] == 0){
		$upload = new \Think\Upload();// 实例化上传类    
    	$upload->maxSize   =   3145728 ;// 设置附件上传大小   
    	$upload->exts      =   array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
    	$upload->rootPath = './Public';//手动设置网站根目录
    	$upload->savePath  =   '/Uploads/goods/'; // 设置附件上传目录
        
    	$info   =   $upload->upload();    // 上传文件     
    	if(!$info) {// 上传错误提示错误信息        
    		die($upload->getError());
    	}else{// 上传成功       
    		// $this->success('上传成功！'); 
    		$str = $info['pic']['savepath']. $info['pic']['savename'];
    		// var_dump($str);die;
       
    		return ($_POST['pic'] = $str);
    	}
	}
}



 ?>