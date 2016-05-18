// alert($);
 $(function(){
        //获取btn
        $('.but1').click(function(){
            //alert('222');
           var v = $(this).parents('.b2').find('.sid').html();
           // alert(v);
           //发送ajax
           
           var btn = $(this);
           $.ajax({
                url:'update?num=-1',
                data:{gid:v},
                type:'get',
                success:function(data){

                  // alert(data);
                      btn.parents('.b2').find('span').text(data);
                  var yxj = btn.parents('.b2').find('.xj').text();
                  var price = btn.parents('.b2').find('.price').text();
                  var xj = data * price;
                  btn.parents('.b2').find('.xj').text(xj);
                  var ytotal = btn.parents('table').find('.total').text();
                  var total = ytotal - yxj;
                  var xtotal = total + xj;
                  btn.parents('table').find('.total').text(xtotal);
                    // console.log(data);
                   
                }
           })
        })
        //获取btn
        $('.but2').click(function(){
            // alert('222');
           var v = $(this).parents('.b2').find('.sid').html();
           // alert(v);
           //发送ajax
           
           var btn = $(this);
           $.ajax({
                url:'update?num=1',
                data:{gid:v},
                type:'get',
                success:function(data){
                	btn.parents('.b2').find('span').text(data);
                	var yxj = btn.parents('.b2').find('.xj').text();
                	var price = btn.parents('.b2').find('.price').text();
                	var xj = data * price;
                	btn.parents('.b2').find('.xj').text(xj);
                	var ytotal = btn.parents('table').find('.total').text();
                	var total = ytotal - yxj;
                	var xtotal = total + xj;
                	btn.parents('table').find('.total').text(xtotal);
                   
                }
           })
        })
		$('.delete').click(function(){
			// alert('1111');
			 var v = $(this).parents('.b2').find('.sid').html();
           // alert(v);
           var xj = $(this).parents('.b2').find('.xj').text();
           var total = $(this).parents('table').find('.total').text();
            var btn = $(this);
           $.ajax({
                url:'delete',
                data:{gid:v},
                type:'get',
                success:function(data){
                    if(data == 0){
                     
                      var newtotal = total-xj;
                      btn.parents('table').find('.total').text(newtotal);
                      btn.parents('.b2').remove();
                      
                    }else{
                        alert('删除失败');
                    }
                }
           })
		})
		$('.qingkong').click(function(){
			 // alert('1111');
            var btn = $(this);
           $.ajax({
                url:'delete',
                type:'get',
                success:function(data){
                    // console.log(data);
                    if(data == 0){
                      
                      btn.parents('table').find('.total').text('0');
                      btn.parents('table').find('.b2').remove();
                      
                    }else{
                        alert('删除失败');
                    }
                }
           })
		})
    })