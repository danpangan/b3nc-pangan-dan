<?php
	
	require_once('core/init.php');

	$sessionName = Config::get('session/session_name');
	$productId = null;
	$action = null;

	if(!Session::exists($sessionName)) {
		Session::put(Config::get('session/session_name'), md5(uniqid()));
	}
	
	if(isset($_REQUEST['productId'])) { $productId = $_REQUEST['productId']; }
	if(isset($_REQUEST['axn'])) { $action = $_REQUEST['axn']; }

	$cart = new Cart($action, $productId);

	return "<script>alert('hello');</script>";
?>