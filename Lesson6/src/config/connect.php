<?
	define('IP_ADDR', "192.168.0.99");

	function connect(){
		static $link;
		if (empty($link)){
			$link = mysqli_connect(IP_ADDR, 'root', '', 'gbphp');
		}
		return $link;
	}

	function stringify($str){
		return mysqli_real_escape_string(connect(), strip_tags(trim($str)));
	}
?>