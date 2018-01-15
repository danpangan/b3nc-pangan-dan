<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Copatible" content="IE=Edge">

	<title>Multiplication Table</title>

	<style type="text/css">
		table {
			margin: 50px auto;
			border-collapse: collapse;
		}
		table tr td {
			width: 50px;
			height: 50px;
			border: 1px solid #000;
			text-align: center;
			line-height: 50px;
			cursor: pointer;
		}
		table tr:nth-child(1) td,
		table tr td:nth-child(1) {
			background-color: #aaa;
			font-weight: bold;
		}
	</style>
</head>
<body>

	<div>
		<form name="tableInput" method="post" onsubmit="validate()">
			<input type="number" name="inputNum" min="2" max="20" placeholder="Enter Table Range">
			<input type="submit" name="" value="Submit">
		</form>
	</div>

<?php

	if(isset($_POST['inputNum'])) {

		$inputNum = $_POST['inputNum'];
		$className = '';

		echo "<table>";
		for($x=0; $x<=$inputNum; $x++) {
			echo "<tr>";
			for($y=0; $y<=$inputNum; $y++) {
				if(($x==0) || ($y==0)) {
					if(($x==0) && ($y!=0)) {
						$className = 'yClass';
					} elseif(($x!=0) && ($y==0)) {
						$className = 'xClass';
					}
					echo '<td id="x-'. $x . '-y-' . $y .'" class="' . $className . '" onclick="getId(this.id)">' . ($x + $y) . '</td>';
				} else {
					echo '<td id="x-' . $x . '-y-' . $y . '" class="" onclick="getId(this.id, ' . $inputNum . ')">' . ($x * $y) . '</td>';
				}
			}
			echo "</tr>";
		}
		echo "</table>";
	}

?>

	<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
	<script type="text/javascript">

		var xClass = false;
		var yClass = false;
		var xClassId;
		var yClassId;

		
		function getId(id, input = null) {
			/*alert(id);*/
			var className = $('#' + id).attr('class');
			/*alert(className);*/

			if(className=='') {
				xClass = false;
				yClass = false;

				clearTable();
				getMultipliers(id, input);
			} else {
				getProduct(id);
			}
		}

		function clearTable() {
			$('td').css("background-color","#fff");
			$('tr:nth-child(1) td, tr td:nth-child(1)').css("background-color","#aaa");

		}

		function getMultipliers(id, input) {

			var product = $('#' + id).html();
			var products = [];

			for(x=1; x<=input; x++) {
				for(y=1; y<=input; y++) {

					var otherId = 'x-' + x + '-y-' + y;
					var otherProduct = $('#' + otherId).html();

					if(otherProduct == product) {
						products.push(otherId);
					}
				}
			}

			for(i=0; i<products.length; i++) {

				var prodId = products[i].split('-');
				var xPos = parseInt(prodId[1]) + 1;
				var yPos = parseInt(prodId[3]) + 1;

				for(var row=0; row<yPos; row++) {
					$('tr:nth-child(' + xPos + ') td:nth-child(' + (row+1) + ')').css("background-color","pink");
				}
				
				for(var col=0; col<xPos; col++) {
					$('tr:nth-child(' + (col+1) + ') td:nth-child(' + yPos + ')').css("background-color","pink");
				}

				$('tr:nth-child(1) td:nth-child(' + yPos + ')').css("background-color", "red");
				$('tr:nth-child(' + xPos + ') td:nth-child(1)').css("background-color", "red");
				$('#' + products[i]).css("background-color", "red");
			}
		}

		function getProduct(id) {

			/*clearTable();*/

			var xFactor;
			var yFactor;
			var msg;
			var checkId = id.split('-');

			if((xClass == false) && (yClass == false)){
				clearTable();
			}

			if(checkId[3] == 0) {

				yClassId = id;
				yFactor = $('#' + id).html();
				yClass = true;

				msg = "Y Multiplier is selected.";
				if(xClass == false) {
					msg += " Please select X Multiplier.";
				}

				clearTable();
				$('#' + id).css("background-color", "red");

			} else if(checkId[1] == 0) {

				xClassId = id;
				xFactor = $('#' + id).html();;
				xClass = true;

				msg = "X Multiplier is selected";
				if(yClass == false) {
					msg += " Please select Y Multiplier.";
				}

				clearTable();
				$('#' + id).css("background-color", "red");
			}

			alert(msg);

			if((xClass == true) && (yClass == true)) {

				xClassId = xClassId.split('-');
				yClassId = yClassId.split('-');

				xPos = parseInt(yClassId[1]) + 1;
				yPos = parseInt(xClassId[3]) + 1;

				for(var row=0; row<yPos; row++) {
					$('tr:nth-child(' + xPos + ') td:nth-child(' + (row+1) + ')').css("background-color","pink");
				}

				for(var col=0; col<xPos; col++) {
					$('tr:nth-child(' + (col+1) + ') td:nth-child(' + yPos + ')').css("background-color","pink");
				}

				$('tr:nth-child(1) td:nth-child(' + yPos + ')').css("background-color", "red");
				$('tr:nth-child(' + xPos + ') td:nth-child(1)').css("background-color", "red");
				$('#x-' + (xPos-1) + '-y-' + (yPos-1)).css("background-color", "red");

				xClass = false;
				yClass = false;
			}
		}

	</script>
</body>
</html>