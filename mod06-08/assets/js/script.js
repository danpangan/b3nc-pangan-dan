function appendLyrics(day) {
	$('h2#day' + day).css("display", "inline");
	var newDay = parseInt(day) + 1;
	document.getElementById("clickMe").value = newDay;

}
