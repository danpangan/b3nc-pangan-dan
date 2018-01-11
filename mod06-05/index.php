<!DOCTYPE html>
<html>
<head>
	<title></title>


<style type="text/css">
	table {
		border-collapse: collapse;
	}

	table tr td {
		padding: 5px;
		border: 2px solid #000; 
		text-align: center; 
	}

	table tr:nth-child(1),
	table tr td:nth-child(1) {
		background-color: #aaa;
	}

</style>
</head>
<body>

<?php

	/*$result = "";
	
	for($x=1; $x<11; $x++) {
		$result = $result . $x;
		if($x != 10) {
			$result = $result . "-";
		}
	}

	echo $result;*/

/*	for($x=0; $x<10; $x++) {
		for($y=0; $y<10; $y++) {
			echo "* ";
		}
		echo "<br>";
	}
*/

	for($x=10; $x>0; $x--) {
		for($z=$x; $z<10; $z++) {
			echo "&nbsp;";
		}
		for($y=0; $y<$x; $y++) {
			echo "*";
		}
		echo "<br>";
	}

	echo "<table>";

	for($x=1; $x<=10; $x++) {
		echo "<tr>";
		for($y=1; $y<=10; $y++) {
			echo "<td id='x-" . $x . "-y-" . $y ."' onclick='getFactors(this.id)'>" . $x*$y . "</td>";
		}
		echo "</tr>";
	}

	echo "<table><br>";

	for($i=3; $i<=50; $i++) {
		if($i % 3 == 0) {
			echo $i . "Fizz<br>";
		}

		if($i % 5 == 0) {
			echo $i . "Buzz<br>";
		}

		if(($i % 5 == 0) && ($i % 3 == 0)) {
			echo $i . "FizzBuzz<br>";
		}
	}

?>

<script src="js/jquery-3.2.1.min.js"></script>

<script>
	function getFactors(id) {

		/*$("tr:nth-child(1)").css("background-color","#aaa");*/

		var prodId = id.split("-");

		var x = prodId[1];
		var y = prodId[3]; 
		
		for(row = 1; row<=x; row++) {
			$("tr:nth-child(" + row + ") td:nth-child(" + y + ")").css("background-color", "pink")
		}
		for(col = 1; col <=y; col++) {
			$("tr:nth-child(" + x + ") td:nth-child(" + col + ")").css("background-color", "pink")
		}

		$("tr:nth-child(1) td:nth-child(" + y + ")").css("background-color", "red")
		$("tr:nth-child(" + x + ") td:nth-child(1)").css("background-color", "red")
		$("#" + id).css("background-color", "red")
	}

	function clearTable() {
		
	}
</script>

</body>
</html>