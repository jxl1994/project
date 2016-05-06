<?php 
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model{
	//自动验证的数组
	protected $_validate = array(
		array('vcode','require','验证码必须填写!'),
		array('vcode','check_verify','验证码输入错误!',0,'function',3),
		array('name','require','商品标题必须填写!'),
		array('price','number','商品价格必须为数字!'),
	);

	protected $_auto = array(
		array('pic','dealPic',3,'function')

		);
}

	





 ?>