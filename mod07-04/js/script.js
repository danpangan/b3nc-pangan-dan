function changeBackgroundColor() {
	var newColor = document.getElementById("newBackgroundColor").value;

	switch(newColor) {
		case "red":
			document.getElementsByClassName("wrapper")[0].style.backgroundColor = "red";
			document.getElementById("theMessage").innerHTML = "Your new background color is red!";
		default:
			break;
	}
}