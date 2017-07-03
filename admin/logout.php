<?php


	session_start();
	session_destroy();
	unset($_SESSION['userSession']);
	header("Location: index");
	exit();

?>