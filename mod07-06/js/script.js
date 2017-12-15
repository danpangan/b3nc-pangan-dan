var equals = false;

function updateDisplay(val) {
	var expression = document.getElementById("mainInput").value;
	var small = document.getElementById("smallText").value;
	var operators = ["+","-","*","/"];
	


	if(val == "=") {
		
		expression = small + "" + expression;
		document.getElementById("mainInput").value = eval(expression);
		document.getElementById("smallText").value = "";

		equals = true;

	} else {

		equals = false;


		var i = operators.indexOf(val);

		if(i > -1) {
			console.log(val);
			document.getElementById("smallText").value = small + "" + expression + "" + val;
			document.getElementById("mainInput").value = 0;
		} else {

			val = expression + "" + val; 
			document.getElementById("mainInput").value = parseFloat(val);
		}

	}
}

function clearAll() {
	document.getElementById("mainInput").value = 0;
	document.getElementById("smallText").value = "";
}

function deleteInput() {
	if(equals == false) {
		var expression = document.getElementById("mainInput").value;
		var strlen = expression.length;

		if(expression.length == 1) {
			document.getElementById("mainInput").value = 0;
		} else {
			document.getElementById("mainInput").value = expression.substr(0, strlen-1);
		}
	}
}