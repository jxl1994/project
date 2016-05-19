// alert($);
$(function(){
	$('.but1').click(function(){
		// alert('1111');
		var url = '/Home/Detail/pdsession';
		$.ajax({
                url:url,
                type:'get',
                success:function(data){
                    // console.log(data);
                    if(data == 0){
                      $('#win').css('display','block');
                    }else{
                    	text = $('.but1').find('a').attr('lj');
                    	$('.but1').find('a').attr('href',text);
                    }
                }
           })
	})
	$('.but2').click(function(){
		// alert('1111');
		var url = '/Home/Detail/pdsession';
		$.ajax({
                url:url,
                type:'get',
                success:function(data){
                    // console.log(data);
                    if(data == 0){
                      $('#win').css('display','block');
                    }else{
                    	text = $('.but2').find('a').attr('lj');
                    	$('.but2').find('a').attr('href',text);
                    }
                }
           })
	})
	$('.sc').click(function(){
		var url = '/Home/Detail/pdsession';
		$.ajax({
                url:url,
                type:'get',
                success:function(data){
                    if(data == 0){
                      $('#win').css('display','block');
                    }else{

                    	var url = '/Home/Shoucang/add';
						// alert(sc);
						var goodsid = $('.sc1').attr('goodsid');
						$.ajax({
							url:url,
							data:{goodsid:goodsid},
			                type:'get',
			                success:function(data){
			                    if(data == 0){
			                     	$('.sc1').css('border','1px solid #ccc');
			                    	var ycount = $('.sc1').find('.count').text();
			                    	// alert(ycount);
			                     	var xcount = Number(ycount) - 1;
			                     	$('.sc1').find('.count').text(xcount);

			                    }else{
			                    	
			                     	$('.sc1').css('border','1px solid #ef2f23');
			                     	var ycount = $('.sc1').find('.count').text();
			                    	// alert(ycount);
			                     	var xcount = Number(ycount) + 1;
			                     	$('.sc1').find('.count').text(xcount);
			                    }
			                }
						})
                    	
                    }
                }
           })
		
	})
	$('.h').find('.close').click(function(){
		$('#win').css('display','none');
	})
	$(function(){
		//获取可视区域的高度
		var dH = $(document).height();
		// alert(cH);
		var dW = $(document).width();
		// alert(cW);
		$('#win').css('height',dH);
		$('#win').css('width',dW);
	})
})
