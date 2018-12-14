
<form action="" method="post">
	<input name="operand1" type="number" value="0" placeholder="first number">
	<select name="operation" type="text">
		<option value="sub">Substract</option>
		<option value="add">Add</option>
		<option value="mul">Multiply</option>
		<option value="div">Divide</option>
	</select>
	<input name="operand2" type="number" value="0" placeholder="second number">
	<input type="submit">
</form>

<?php
	$a = $_POST['operand1'];
	$b = $_POST['operand2'];
	$result;
	switch ($_POST['operation']) {
		case 'sub':
			$result = $a - $b;
			break;

		case 'add':
			$result = $a + $b;
			break;

		case 'mul':
			$result = $a * $b;
			break;

		case 'div':
			$result = (int)$b === 0 ? 'Деление на 0!' : $a / $b;
			break;
	}
	echo "результат операции: {$result}";
?>


