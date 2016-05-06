// alert($);
		//定义全局变量
		var Cemail = false;
		//绑定表单事件
		$('form').submit(function(){
		//触发丧失焦点事件
		$('input').trigger('blur');

		//检测是否能够提交
		if( Cemail){
			//提交
			return true;
			
		}
		return false;
	})

	//绑定获取焦点事件  显示提示信息
	$('input[name=email]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');
		//设置文本
		$('.email_code').css('display','block');
		$('.email_code').find('span').html(text).css('color','#ff5783');
	})

	//邮箱验证
	$('input[name=email]').blur(function(){
		//获取确认密码
		var email = $(this).val();
		//声明正则
		var reg = /^\w+@\w+\.(com|cn|com\.cn|net|org)$/;
		//验证
		if(reg.test(email)){
			//正确
			$('.email_code').css('display','none');
			Cemail = true;
		}else{
			//错误
			$('.email_code').find('span').html('邮箱格式不正确').css('color','red');
			
		}
	})


$('.huoqu').click(function(){
	var text = $(this).attr('lj')
	$('form').attr('action',text);
})
$('.tj').click(function(){
	var text = $(this).attr('lj')
	$('form').attr('action',text);
})

	