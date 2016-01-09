<?php


	require_once 'core/init.php';

	session_unset();
	session_destroy();
	header("location: homepage.php");

?>