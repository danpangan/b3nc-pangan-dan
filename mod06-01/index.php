<?php

function numSum($num1, $num2) {
	return 'The sum is: ' . ($num1 + $num2) . '<br>';
}

function numDiff($num1, $num2) {
	return 'The difference is: ' . ($num1 - $num2) . '<br>';
}

function numProd($num1, $num2) {
	return 'The product is: ' . ($num1 * $num2) . '<br>';
}

function numQuot($num1, $num2) {
	return 'The quotient is: ' . ($num1 / $num2) . '<br>';
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title>Welcome to PHP Programming</title>
</head>
<body>

<?php
	
	$num1 = 150;
	$num2 = 33.5;

	echo numSum($num1, $num2);
	echo numDiff($num1, $num2);
	echo numProd($num1, $num2);
	echo numQuot($num1, $num2);

	$members = array('Kato', 'Shem', 'Angeli', 'Ali', 'Carmela');

	foreach ($members as $member) {
		echo $member . '<br>';
	}

?>

</body>
</html>