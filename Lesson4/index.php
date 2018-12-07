<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="./styles.css">
	<title>Document</title>
</head>
<body>

<div class="mainContainer">

	<?php

	define(DIR_LOGS, 'logs/');
	define(DIR_GALLERY, 'gallery/');

	$images = getImageList();

	foreach ($images as $value) {
		echo formGalElement(DIR_GALLERY . $value);
	}

	logTimeStamp();

	function getImageList() {
		return array_slice(scandir(__DIR__ . '/' . DIR_GALLERY), 2);
	}

	function formGalElement($href) {
		return "<a href=\"{$href}\" class=\"imageItem\" target=\"_blank\"><img src=\"{$href}\"></a>";
	}

	function logTimeStamp() {
		// Create timestamp
		$date = date('m/d/Y h:i:s a', time());
		$logs = __DIR__ . '/' . DIR_LOGS;

		$currLog = "log1.txt";
		$logList = array_slice(scandir($logs), 2);		//get files in log folder
									//TODO: Check filenames with regex
		if (count($logList) > 0) {
			// Getting last file by number
			// TODO: Check in cycle instead to avoid gaps in numeration (or mb it's better this way?)
			usort($logList, "cmpWrapper");
			$currLog = $logList[count($logList) - 1];
		}

		// Count lines in current file
		$linecount = 0;
		$handle = fopen($logs . '/' . $currLog, "a+");
		while(!feof($handle)){
			$line = fgets($handle);
			$linecount++;
		}

		// Replace current file with a new one, if line count is above threshold
		if ($linecount > 10) {
			fclose($handle);
			$currLog = 'log' . ((int)substr($currLog, 3) + 1) . '.txt';
			$handle = fopen($logs . '/' . $currLog, "w");
		}
		fwrite($handle, "{$date}: Gallery opened! ".PHP_EOL);
		fclose($handle);
	}

	function cmpWrapper($a, $b) {
		return cmp((int)substr($a, 3), (int)substr($b, 3));
	}

	function cmp($a, $b) {
		if ($a === $b) {
			return 0;
		}
		return ($a < $b) ? -1 : 1;
	}
	?>

</div>




</body>
</html>




