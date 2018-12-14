<?php

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$linked_id = $_GET['id'];
		$author = stringify( $_POST['author']);
		$text = stringify($_POST['text']);

		$sql = "INSERT INTO " . COMMENTS_TABLE . " (linked_id, author, text, date) 
					VALUES ('$linked_id', '$author', '$text', NOW())";

		mysqli_query(connect(), $sql);
		header('Location: ?page=1&id=' . $_GET['id']);
		exit;
	}

	$id = (int) $_GET['id'];
	$itemQuery = "SELECT caption, filename, views FROM " . GALLERY_TABLE . " WHERE id = {$id}";
	$query = "UPDATE funnycats SET views = views + 1 WHERE id = {$id}";
	mysqli_query(connect(), $query);

	$record = mysqli_fetch_all (mysqli_query(connect(), $itemQuery), MYSQLI_ASSOC)[0];
?>

	<h2><?=$record['caption']?></h2>
	<p>Views: <?=$record['views']?></p>
	<div class="singlImgCont">
		<img src="<?=GALLERY_PATH . $record['filename']?>"><br>
	</div>
	<a href="?page=0"> Go Back >> </a>

	<div class="commentsLayout" id="reviewsLayout">
		<?php
			$comms = GetCommentsOnCurrentId($id);
			while ($comment = mysqli_fetch_assoc($comms)) {
				echo<<<comment
				<div id="rev_{$comment['id']}" class="review approved">
					<strong>{$comment['author']}</strong>
					<p>{$comment['text']}</p>
				</div>
comment;

			}

		?>
	</div>

	<div class="centerBlock">
		<form action="" method="post">
			<label for="author">Автор:</label>
			<input id="author" name="author" type="text">

			<label for="comment">Комментарий:</label>
			<textarea id="comment" name="text" type="text"></textarea>

			<button id="sendReview">Отправить</button>
		</form>

	</div>



</body>
</html>

<?php
	function GetCommentsOnCurrentId($id) {
		$itemQuery = "SELECT id, author, text FROM ". COMMENTS_TABLE ." WHERE linked_id = {$id}";
		$records = mysqli_query(connect(), $itemQuery);
		return $records;
	}
?>