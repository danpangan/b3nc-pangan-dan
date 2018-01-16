<?php
	require_once('assets/lib/twelve_days.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE-Edge">
	
	<title><?php echo getTitle(); ?> Lyrics</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>

	<div class="container">
<?php

	$list = '';

	echo "<img src='assets/images/gift1.png'>";

	for($x=0; $x<12; $x++) {
		$days = getLyrics($x);
		$day = $days[0];
		$gift = $days[1];


		if($x == 0)
			$list = $gift;
		else if($x == 1)
			$list = $gift . ", and " . $list;
		else {
			$list = $gift . ", " . $list;
		}

		echo "<div id='day" . ($x+1) . "'>";
		echo "<img src=''/>";
		echo "<h2 class='day" . ($x+1) . "'>On the $day day of Christmas my true love sent to me,</h2>";

		$listItems = explode(", ", $list);

		$z=$x+1;

		foreach($listItems as $listItem) {
			echo "<h3 class='day" . ($x+1) . "' id='gift$z'>$listItem</h3>";
			$z--;
		}

		echo "<br>";
		echo "</div>";
	}
?>



		<button value="2" onclick="appendLyrics(this.value);" id="clickMe">Click me</button>

	</div>

	<script type="text/javascript" src="assets/js/lib/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="assets/js/script.js"></script>

</body>
</html>