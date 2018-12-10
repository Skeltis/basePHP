<?php

	// Indexing gallery folder
	function getImageList($galDirectory) {
		return array_slice(scandir($galDirectory), 2);
	}

	function getDBRecordList ($link, $tableName) {
		$result = mysqli_query($link, "SELECT id, caption, filename, views FROM {$tableName} ORDER BY views DESC");
		
		$records = [];
		if ($result) {
			$records = mysqli_fetch_all ($result, MYSQLI_ASSOC);
		}
		return $records;
	}

	function getDBImageList ($link, $tableName) {
		$result = mysqli_query($link, "SELECT id, filename FROM {$tableName}");
		
		$records = [];
		if ($result) {
			$records = mysqli_fetch_all ($result, MYSQLI_ASSOC);
			$records = array_column($records, 'filename', 'id');
		}
		return $records;
	}

	// Checking database if table exists
	function checkTableExists($link, $tableName) {
		return count(mysqli_fetch_assoc(mysqli_query($link, "SHOW TABLES LIKE '{$tableName}'"))) === 1;
	}
	
	// if not - create one
	function createGallery($link, $tableName) {
		$query = 
		"CREATE TABLE gbphp.{$tableName}
		( 
			id INT(4) NOT NULL AUTO_INCREMENT , 
			caption VARCHAR(100) NOT NULL , 
			filename VARCHAR(256) NOT NULL , 
			size DOUBLE NOT NULL , 
			views INT(8) NOT NULL , 
			PRIMARY KEY (id)
		) ENGINE = InnoDB";
		mysqli_query($link, $query);
	}

	//sync table records with file list
	function syncWithTable($link, $tableName, $galDirectory) {
		if (!checkTableExists($link, $tableName)) {					// Check if gallery exists
			createGallery($link, $tableName);
		}		
		
		$records = getDBImageList($link, $tableName);				// get all table records
		$files = getImageList($galDirectory);						// get all files on server
		
		// clear all records, that aren't exist physically
		foreach (array_diff($records, $files) as $id => $value) {
			mysqli_query($link, "DELETE FROM {$tableName} WHERE id = {$id}");
		}
		
		// add all records, that aren't yet mentioned in DB
		foreach (array_diff($files, $records) as $id => $value) {
			$catId = $id + 1;
			$filesize = filesize($galDirectory . $value) / 1024;
			$insertQuery = 
				"INSERT INTO {$tableName} (caption, filename, size, views) 
				VALUES ('Funny Cat #{$catId}', '{$value}', '{$filesize}', '0')";		
			
			mysqli_query($link, $insertQuery);
		}
	}

?>