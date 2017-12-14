function identifyThis() {
	var num = document.getElementById("numberInput").value;


	if(num%2 == 0) {
		document.getElementById("theMessage").innerHTML = "It is an even number!";
		document.getElementsByClassName("wrapper")[0].style.backgroundColor = "green";
	} else {	
		document.getElementById("theMessage").innerHTML = "It is an odd number!";
		document.getElementsByClassName("wrapper")[0].style.backgroundColor = "red";
	}
}