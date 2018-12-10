<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>
<body>

<h2> Цап Фырюшу за бочушу! =Р </h2>

<div class="mainContainer">



<?php

	define(DIR_LOGS, 'logs/');
	define(DIR_GALLERY, 'gallery/');
	define(GALLERY_TABLE, 'funnycats');

	require_once('./sync.php');
	require_once('./logTime.php');

	$link = mysqli_connect('localhost', 'root', '', 'gbphp');
	$galDirectory = __DIR__ . '/' . DIR_GALLERY;

	syncWithTable($link, GALLERY_TABLE, $galDirectory);


	foreach (getDBRecordList($link, GALLERY_TABLE) as $value) {
		echo formGalElement($value, DIR_GALLERY);
	}

	logTimeStamp();

	mysqli_close($link);

	function formGalElement($record, $galDirectory) {
		$imgsrc = $galDirectory . $record['filename'];
		$hlink = "/openImage.php?" . http_build_query($record) . "&galDir={$galDirectory}";
		return "<a href=\"{$hlink}\" class=\"imageItem\"><img src=\"{$imgsrc}\"></a>";
	}
	
?>



</div>




</body>
</html>




