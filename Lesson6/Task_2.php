
<form action="" method="post">
	<input name="operand1" type="number" value="0" placeholder="first number">
	<input name="operand2" type="number" value="0" placeholder="second number">
	<input name="operation" type="submit" value="+">
	<input name="operation" type="submit" value="-">
	<input name="operation" type="submit" value="/">
	<input name="operation" type="submit" value="*">
</form>

<?php
	$a = $_POST['operand1'];
	$b = $_POST['operand2'];
	$result;
	switch ($_POST['operation']) {
		case '-':
			$result = $a - $b;
			break;

		case '+':
			$result = $a + $b;
			break;

		case '*':
			$result = $a * $b;
			break;

		case '/':
			$result = (int)$b === 0 ? 'Деление на 0!' : $a / $b;
			break;
	}
	echo "результат операции: {$result}";
?>


