<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="js/jquery-3.2.1.js"></script>

<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/footable.js"></script>

<script type="text/javascript">
	
	// Initialize collapse button
  $(".button-collapse").sideNav();
  // Initialize collapsible (uncomment the line below if you use the dropdown variation)
  //$('.collapsible').collapsible();

  $(document).ready(function() {
    $('select').material_select();
  });

  $('.footable').footable({
	  calculateWidthOverride: function() {
	    return { width: $(window).width() };
	  }
	}); 
</script>