window.onload = function(){ 
	document.getElementById("me").addEventListener("mouseover", hoverImage);
	document.getElementById("me").addEventListener("mouseout", hoverImageNot);
}
function hoverImage() {
	document.getElementById("me").setAttribute("src","img/myimg2.jpg")
}
function hoverImageNot() {
	document.getElementById("me").setAttribute("src","img/myimg.jpg")
}