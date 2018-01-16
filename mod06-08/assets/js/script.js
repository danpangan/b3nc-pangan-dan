function appendLyrics(day) {
	$('h3').css("color", "black");
	$('h2.day' + day).css("color", "red");
	$('h2.day' + day).delay(1000).fadeIn(function(){

	var containerHeight = $('.container').height();
	/*$('.container').css("height", containerHeight + 800 + "px");*/

		srollToDay(day);
		setTimeout(function(newIndex){

			var posts = $('h3.day' + day);
			posts.each(function( index ) {
			    var $th = $(this);
			    var giftId = $th.attr("id");
			    setTimeout(function() {
			    	$('div#day' + day + ' img').attr("src", "assets/images/" + giftId + ".png");
			    	$('h2').css("color", "black");
			    	$('h3').css("color", "black");
			    	$th.css("color", "red");
			        $th.fadeIn(600);   // Removed arguments.callee

			    }, index * 1800);
			});

		}, 3600);
	});

	var newDay = parseInt(day) + 1;
	document.getElementById("clickMe").value = newDay;

}

function srollToDay(day){

	// Store hash
	var hash = "#day" + day;

	// Using jQuery's animate() method to add smooth page scroll
	// The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	$('html, body').animate({
		scrollTop: $(hash).offset().top
	}, 800, function(){

		// Add hash (#) to URL when done scrolling (default click behavior)
		window.location.hash = hash;
	});

}
