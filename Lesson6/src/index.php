<?php
	if (empty($_POST)) {
		include_once ("pages/header.php");
	}

	define(GALLERY_TABLE, 'funnycats');
	define(COMMENTS_TABLE, 'cat_comments');
	define(GALLERY_PATH, 'gallery/');

	define(ROOT_DIR, __DIR__);
	define(DIR_LOGS, ROOT_DIR . '/logs/');
	define(DIR_GALLERY, ROOT_DIR . '/'. GALLERY_PATH);
	define(SCENS_DIR, ROOT_DIR . '/scenarios/');

	include('config/connect.php');

	switch ($_GET['page']) {
		case 1:
			include('pages/openImage.php');
			break;

		default:
			include('pages/mainGallery.php');
	}
?>






