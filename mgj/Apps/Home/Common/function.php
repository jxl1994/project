<?php 



//处理上传图片
function mysf($back,$w,$h,$path="./Public/Uploads/activitys",$pre="s_"){
        //1.回去图片后后缀
        $suffix = ltrim(strrchr($back,'.'),'.');
        if($suffix == 'jpg'){
            $suffix = 'jpeg';
        }
        //2制作变量函数
        $create  = 'imagecreatefrom'.$suffix;
        //调用
        $img = $create($back);
        //获取要缩放图片的宽高
        list($width,$height) = getimagesize($back);

        //计算等比例缩放公式
        if(($w/$width) > ($h/$height)){
            //比较高图片
            $dh = $height * ($w/$width);
            $dw = $w;
        }else{
            //比较宽的图片
            $dw = $width * ($h/$height);
            $dh = $h;
        }

        //创建画布
        $s_img = imagecreatetruecolor($dw,$dh);

        //将缩放图片拷贝到新画布上
        imagecopyresampled($s_img,$img,0,0,0,0,$dw,$dh,$width,$height);

        //制作图片路径 保存图片

        if(!file_exists($path)){
            mkdir($path);
        }
        //能获原图片
        $name = basename($back);
        $path = $path.'/'.$pre.$w.'_'.$h.'_'.$name;
        //制作保存的变量函数
        $type = 'image'.$suffix;
        //调用
        $result = $type($s_img,$path,90);
        //释放
        imagedestroy($s_img);
        imagedestroy($img);
        return $path;

    }


 ?>