// alert($);
$(function(){
	// alert('1111');
	$(function(){
		// alert('111');
		//获取可视区域的高度
		var dH = $(document).height();
		// alert(dH);
		var dW = $(document).width();
		// alert(cW);
		$('#tk').css('height',dH);
		$('#tk').css('width',dW);
	})
	$('.but').click(function(){
		// alert('1111');
		$('#tk').css('display','block');
	})
	$('.close').click(function(){
		$('#tk').css('display','none');
	})
})