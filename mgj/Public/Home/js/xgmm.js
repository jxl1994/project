// alert($);
$(function(){
	//定义全局变量
		var Coldpass = false;
		var Cnewpass = false;
		var Cnewrepass = false;
		//绑定表单事件
		$('form').submit(function(){
		//触发丧失焦点事件
		$('input').trigger('blur');

		//检测是否能够提交
		if(Coldpass && Cnewpass && Cnewrepass){
			//提交
			return true;
			
		}
		return false;
	})
	//绑定获取焦点事件  显示提示信息
	$('input[name=oldpass]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');

		//设置文本
		$('.form-group').find('span[name=oldpass]').html(text).css('color','#ff5783');
	})
	//绑定丧失焦点事件
	$('input[name=oldpass]').blur(function(){
		//获取原密码
		var oldpass = $(this).val();
		var inp = $(this);
		//发送ajax验证用户名是否可用
		$.ajax({
			url:'ajaxRequery',
			data:{oldpass:oldpass},
			type:'post',
			// 同步
			async:false,
			success:function(data){
				//如果用户名可用
				if(data == 0){
					// alert('可用');
					$('.form-group').find('span[name=oldpass]').html('√').css('color','green');
					Coldpass = true;

				}else{
					// alert('用户名已存在');
					$('.form-group').find('span[name=oldpass]').html('原密码不正确').css({color:'#ff5783'});
					Coldpass = false;
				}
			}
		})
	})
	//绑定获取焦点事件  显示提示信息
	$('input[name=newpass]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');

		//设置文本
		$('.form-group').find('span[name=newpass]').html(text).css('color','#ff5783');
	})

	$('input[name=newpass]').blur(function(){
		//获取密码
		var newpass = $(this).val();
		//声明正则
		var reg = /^\w{6,20}$/;
		//验证
		if(reg.test(newpass)){
			$('.form-group').find('span[name=newpass]').html('√').css('color','green');
				Cnewpass = true;

		}else{
			$('.form-group').find('span[name=newpass]').html('新密码格式不正确').css({color:'#ff5783'});
				Cnewpass = false;
		}
	})

	//确认密码
	//绑定获取焦点事件  显示提示信息
	$('input[name=newrepass]').focus(function(){
		//获取文本
		var text = $(this).attr('readme');

		//设置文本
		$('.form-group').find('span[name=newrepass]').html(text).css('color','#ff5783');
	})

	$('input[name=newrepass]').blur(function(){
		//获取确认密码
		var newrepass = $(this).val();
		//获取密码
		var newpass = $('input[name=newpass]').val();
		//验证
		if(newpass == newrepass && newrepass != ''){
			$('.form-group').find('span[name=newrepass]').html('√').css('color','green');
			Cnewrepass = true;

		}else{
			$('.form-group').find('span[name=newrepass]').html('两次密码不一致').css({color:'#ff5783'});
			Cnewrepass = false;
		}
	})

})