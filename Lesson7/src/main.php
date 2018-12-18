<?php

	define(GALLERY_TABLE, 'funnycats');
	define(COMMENTS_TABLE, 'cat_comments');
	define(GALLERY_PATH, 'gallery/');
	define(PAGES_PATH, 'pages/');

	define(ROOT_DIR, __DIR__);
	define(DIR_LOGS, ROOT_DIR . '/logs/');
	define(DIR_GALLERY, ROOT_DIR . '/public/'. GALLERY_PATH);
	define(SCENS_DIR, ROOT_DIR . '/scenarios/');

	session_start();

	include('config/connect.php');
	$privSession->echoMessage();

	$page = ! empty($_GET['page']) ? $_GET['page'] : 'index';
	$func = ! empty($_GET['func']) ? $_GET['func'] : 'index';

	if ($privSession->UserLevel !== 'user') {
		$page = 'loginForm';
	}

	if (!file_exists(__DIR__ . '/' . PAGES_PATH . $page . '.php')) {
		$page = 'index';
	}

	include(PAGES_PATH . $page . '.php');

	if (function_exists($func)){
		$content = $func();
	}



?>






