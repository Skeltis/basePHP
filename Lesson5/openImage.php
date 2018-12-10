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



<?php
$link = mysqli_connect('localhost', 'root', '', 'gbphp');
$query = "UPDATE funnycats SET views = views + 1 WHERE id = {$_REQUEST['id']}";
mysqli_query($link, $query);
mysqli_close($link);
?>

	<h2><?=$_REQUEST['caption']?></h2>
	<p>Views: <?=$_REQUEST['views']?></p>
	<div class="singlImgCont">
		<img src="<?=$_REQUEST['galDir'] . $_REQUEST['filename']?>"><br>
	</div>
	<a href="index.php"> Go Back >> </a>



</body>
</html>
