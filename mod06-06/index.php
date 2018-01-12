<!DOCTYPE html>
<html>
<head>
	<title></title>

	<style type="text/css">

		span {
			margin: -2px 0;
			width: 50px;
			height: 50px;
			display: inline-block;
		}

		.black {
			background-color: #000;
		}

		img {
			width: 50px;
			height: 50px;
		}

		/*#x-1-y-0 img {
			width: 50px;
			height: 50px;
			content: url(images/pawn-white.png);
		}*/


	</style>

</head>
<body>

<?php
		for($x=0; $x<8; $x++) {
			for($y=0; $y<8; $y++) {

				if((($x%2 == 0) 
				&& ($y%2 == 0)) 
				|| (($x%2 == 1) 
				&& ($y%2 == 1))) {
					$class='';
				} else {
					$class='black';
				}

				echo "<span class='" . $class . "' id='x-" . $x . "-y-" . $y . "' onclick='alert(this.id)''><img src=''/></span>";
			}
			echo "<br>";
		}

	echo '<br>';

	$a = 1;
	$b = 2;
	$c = $a;

	echo 'Numbers before swap:<br>';
	echo '$a = ' . $a . '<br>';
	echo '$b = ' . $b . '<br>';

	$a = $b;
	$b = $c;
	echo 'Numbers after swap:<br>';
	echo '$a = ' . $a . '<br>';
	echo '$b = ' . $b . '<br>';

	echo '<br>';

	$a = 2;
	$b = 3;

	echo 'Numbers before swap:<br>';
	echo '$a = ' . $a . '<br>';
	echo '$b = ' . $b . '<br>';

	$a = $b = $b;
	//$b = ;
	echo 'Numbers after swap:<br>';
	echo '$a = ' . $a . '<br>';
	echo '$b = ' . $b . '<br>';


	$colors = array("red", "green", "blue");

	foreach ($colors as $color => $val) {
		echo $color . "=" . $val;
	}

	echo "<br><br><br><br><br>";

	$item = [
		['product' => 'Lenovo Laptop', 'price' => 600.00, 'quantity' => 100],
		['product' => 'Asus Tablet', 'price' => 1000, 'quantity' => 10],
		['product' => 'Acer AIO', 'price' => 300.00, 'quantity' => 50 ],
		['product' => 'HP Laptop', 'price' => 400.00, 'quantity' => 1],
		['product' => 'Dell Desktop', 'price' => 350.00, 'quantity' => 20]
	];
?>

<script src="js/jquery-3.2.1.min.js"></script>
<script>
	$(document).ready(function(){

		/*if($('img').attr("src","")) {
			$('img').css("display","none");
		}*/
		$('#x-1-y-0 img').attr("src", "images/pawn-black.png");
		$('#x-1-y-1 img').attr("src", "images/pawn-white.png");
		$('#x-1-y-2 img').attr("src", "images/pawn-white.png");
		$('#x-1-y-3 img').attr("src", "images/pawn-white.png");
		$('#x-1-y-4 img').attr("src", "images/pawn-white.png");
		$('#x-1-y-5 img').attr("src", "images/pawn-white.png");
		$('#x-1-y-6 img').attr("src", "images/pawn-white.png");
		$('#x-1-y-7 img').attr("src", "images/pawn-white.png");

		/*if($('img').attr("src","")) {
			$('img').css("display","none");
		}*/

	});
	

</script>

</body>
</html>