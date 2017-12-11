<?php
	require_once('core/init.php');

	include('head.php');

	/*if(Session::exists('home')) {
		echo Session::flash('home');
	}*/

	$user = new User();
?>



<body>

<?php
	if(!$user->isLoggedIn()) {

		include('login.php');

	} else {

		include('header.php');
		echo "<main>";
	
		if(isset($_REQUEST['page'])) {
			$page = $_REQUEST['page'];
		} else {

			$page = 'dashboard';

		}
		include($page .'.php');
		echo "</main>";
	}


	include('scripts.php');
?>

</body>
</html>