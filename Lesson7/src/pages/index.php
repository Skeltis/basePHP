<link rel="stylesheet" href="styles.css">
<?php

include('userprofile.php');
?>

<h2> Галлерея </h2>

<div class="mainContainer">

	<?php

	require_once(SCENS_DIR . 'sync.php');
	require_once(SCENS_DIR . 'logTime.php');

	syncWithTable($dbLink->getConnection(), GALLERY_TABLE, DIR_GALLERY);

	foreach ($funnyCats->getAllRecords('1', ['*' => '*'], 'views', false) as $value) {
		echo formGalElement($value, GALLERY_PATH);
	}

	logTimeStamp();

	function formGalElement($record, $galDirectory) {
		$imgsrc = $galDirectory . $record['filename'];
		$hlink = "?page=openImage&id=" . $record['id'];
		return "<a href=\"{$hlink}\" class=\"imageItem\"><img src=\"{$imgsrc}\"></a>";
	}

	?>



</div>