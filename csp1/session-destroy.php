<?php
	
	require_once('core/init.php');

	$sessionName = Config::get('session/session_name');

	if(Session::exists($sessionName)) {
		Session::delete(Config::get('session/session_name'));
	}

	header('Location: index.php');
?>