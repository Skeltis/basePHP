<?php

	function logTimeStamp() {
		// Create timestamp
		$date = date('m/d/Y h:i:s a', time());
		$logs = __DIR__ . '/' . DIR_LOGS;

		$currLog = "log1.txt";
		$logList = array_slice(scandir($logs), 2);

		if (count($logList) > 0) {
			usort($logList, "cmpWrapper");
			$currLog = $logList[count($logList) - 1];
		}

		$linecount = 0;
		$handle = fopen($logs . '/' . $currLog, "a+");
		while(!feof($handle)){
			$line = fgets($handle);
			$linecount++;
		}

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