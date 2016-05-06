// alert($);
		//定义全局变量
		var Cuser = false;
		var Cpwd = false;
		var Crepwd = false;
		//绑定表单事件
		$('form').submit(function(){
		//触发丧失焦点事件
		$('input').trigger('blur');

		//检测是否能够提交
		if(Cuser && Cpwd && Crepwd){
			//提交
			return true;
			
		}
		return false;
	})

	//绑定获取焦点事件  显示提示信息
	$('input[name=username]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');

		//设置文本
		$('.username_code').find('span').html(text).css('color','#ff5783')
		$('.username_code').css('display','block');
		
	})

	//绑定丧失焦点事件
	$('input[name=username]').blur(function(){
		//正则
		var reg = /^\w{6,20}$/;
		//获取用户名
		var username = $(this).val();
		//检测
		var res = reg.test(username);
		if(!res){
			//设置文本
			$('.username_code').css('display','block');
			$('.username_code').find('span').html('用户名格式不正确').css('color','red');
			Cuser = false;
			//停止
			return false;
		}
		var inp = $(this);
		//发送ajax验证用户名是否可用
		$.ajax({
			url:'ajaxRequery',
			data:{username:username},
			type:'get',
			// 同步
			async:false,
			success:function(data){
				//如果用户名可用
				if(data == 0){
					// alert('可用');
					$('.username_code').css('display','none');
					Cuser = true;

				}else{
					// alert('用户名已存在');
					$('.username_code').find('span').html('用户名已存在').css('color','red');
					Cuser = false;
				}
			}
		})
	})

	//密码
	//绑定获取焦点事件  显示提示信息
	$('input[name=password]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');

		//设置文本
		$('.pwd_code').find('span').html(text).css('color','#ff5783')
		$('.pwd_code').css('display','block');
		
	})

	$('input[name=password]').blur(function(){
		//获取密码
		var pass = $(this).val();
		//声明正则
		var reg = /^\w{6,20}$/;
		//验证
		if(reg.test(pass)){
			$('.pwd_code').css('display','none');
			Cpwd = true;
		}else{
			//设置文本
			$('.pwd_code').css('display','block');
			$('.pwd_code').find('span').html('密码格式不正确').css('color','red');
			Cpwd = false;
		}
	})

	
	//确认密码
	//绑定获取焦点事件  显示提示信息
	$('input[name=repassword]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');

		//设置文本
		$('.repwd_code').find('span').html(text).css('color','#ff5783')
		$('.repwd_code').css('display','block');
		
	})
	$('input[name=repassword]').blur(function(){
		//获取确认密码
		var repass = $(this).val();
		//获取密码
		var pass = $('input[name=password]').val();
		//验证
		if(pass == repass && repass != ''){
			$('.repwd_code').css('display','none');
			Crepwd = true;

		}else{
			$('.repwd_code').css('display','block');
			$('.repwd_code').find('span').html('两次密码不一致').css('color','red');
			Crepwd = false;
		}
	})