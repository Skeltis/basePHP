<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$catComments->addItem([
			'linked_id' => $_GET['id'],
			'author' => $privSession->UserName,
			'text' => $_POST['text'],
			'date' => date("Y-m-d")
		]);
		header('Location: ?page=openImage&id=' . $_GET['id']);
		exit;
	}

	$id = (int) $_GET['id'];
	$record = $funnyCats->getItemByID($id);
	$funnyCats->updateRecordById($id, 'views', 'views + 1');

?>
	<link rel="stylesheet" href="styles.css">

	<h2><?=$record['caption']?></h2>
	<p>Views: <?=$record['views']?></p>
	<div class="singlImgCont">
		<img src="<?=GALLERY_PATH . $record['filename']?>"><br>
	</div>
	<a href="?page=0"> Go Back >> </a>

	<div class="commentsLayout" id="reviewsLayout">
		<?php
			$comms = $catComments->getAllRecords(
					"linked_id = {$id}", [
						'id' => '',
						'author' => '',
						'text' => ''
					]
			);
			foreach($comms as $value) {
				echo<<<comment
				<div id="rev_{$value['id']}" class="review approved">
					<strong>{$value['author']}</strong>
					<p>{$value['text']}</p>
				</div>
comment;
			}

		?>
	</div>

	<div class="centerBlock">
		<form action="" method="post">
			<p for="author">Автор: <?= $privSession->UserName ?></p>

			<label for="comment">Комментарий:</label>
			<textarea id="comment" name="text" type="text"></textarea>

			<button id="sendReview">Отправить</button>
		</form>

	</div>
