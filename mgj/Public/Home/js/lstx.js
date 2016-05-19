// alert($);
$(function(){
	$('.sy').click(function(){
	// alert('111');
	var id = $(this).find('.id').text();
		// alert(id);
		var btn = $(this);
		var url = '/Home/Personal/update';
	$.ajax({
        url:url,
        data:{id:id},
        type:'get',
        success:function(data){
            if(data == 0){
            	// location.href = location.href;
            	var lj = btn.parents('.lstx1').find('img').attr('src');

            	$('.photo2').find('img').attr('src',lj);
             	$('.tx').find('img').attr('src',lj);
              
            }
        }
   	})	

	})
	$('.sc').click(function(){
	// alert('111');
	var id = $(this).find('.id').text();
		// alert(id);
		var btn = $(this);
		var url = '/Home/Personal/delete';
	$.ajax({
        url:url,
        data:{id:id},
        type:'get',
        success:function(data){
            if(data == 0){
              btn.parents('.lstx1').remove();
              
            }else{
                alert('不能删除正在使用的头像');
            }
        }
   	})	

	})
})