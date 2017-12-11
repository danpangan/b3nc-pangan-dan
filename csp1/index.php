<?php 
	
	require_once('core/init.php');
	include('head.php'); 

	if(isset($_REQUEST['page'])) {
		$page = $_REQUEST['page'];
	} else {
		$page = 'home';
	}

?>
<body>

<?php 
	include('header.php'); 
	include($page .'.php'); 
	include('footer.php'); 
	include('scripts.php'); 
?>

</body>
</html>