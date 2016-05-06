// alert($);
// $('.ss').css('display','none');
$(window).scroll(function(){
	//获取页面Y轴的滚动距离
	var sT = $(window).scrollTop();
	//获取可视区域的高度
	var cH = $(window).height();
	if(sT>cH){
		$('.ss').css('display','block');
	}else{
		$('.ss').css('display','none');
	}
})