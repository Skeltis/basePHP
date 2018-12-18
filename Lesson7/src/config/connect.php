<?
	define('IP_ADDR', "192.168.0.99");
	define('MAIN_DB', "gbphp");

	include_once('Connection.php');
	include_once('DB_DataProvider.php');
	include_once('UserSession.php');

	$dbLink = new Connection(IP_ADDR, MAIN_DB, 'root', '');
	$funnyCats = new DB_DataProvider($dbLink, 'funnycats');
	$catComments = new DB_DataProvider($dbLink, 'cat_comments');
	$users = new DB_DataProvider($dbLink, 'users');
	$salt = 'DerSalz';

	$privSession = new UserSession();

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