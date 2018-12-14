<h2> Галлерея </h2>

<div class="mainContainer">



	<?php

	require_once(SCENS_DIR . 'sync.php');
	require_once(SCENS_DIR . 'logTime.php');

	syncWithTable(connect(), GALLERY_TABLE, DIR_GALLERY);


	foreach (getDBRecordList(connect(), GALLERY_TABLE) as $value) {
		echo formGalElement($value, GALLERY_PATH);
	}

	logTimeStamp();


	function formGalElement($record, $galDirectory) {
		$imgsrc = $galDirectory . $record['filename'];
		$hlink = "?page=1&id=" . $record['id'];
		return "<a href=\"{$hlink}\" class=\"imageItem\"><img src=\"{$imgsrc}\"></a>";
	}

	?>



</div>