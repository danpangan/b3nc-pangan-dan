<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script src="js/jquery.mobile.custom.min.js"></script>
<script src="js/main.js"></script>

<script type="text/javascript">
	
	function getWidth() {

		$(document).ready(function(){

			var winWidth = $('.container').width();

			alert(winWidth);

		});
	}

	$(document).ready(function(){
		$('.button-collapse').sideNav({
		menuWidth: 300, // Default is 300
		edge: 'left', // Choose the horizontal origin
		closeOnClick: false, // Closes side-nav on <a> clicks, useful for Angular/Meteor
		draggable: true // Choose whether you can drag to open on touch screens
		});
		
		// START OPEN
		$('.button-collapse').sideNav();	
		$('.carousel').carousel({dist: -150});
		$('.modal').modal();
		$('.materialboxed').materialbox();
	});

	

</script>