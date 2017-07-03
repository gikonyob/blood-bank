<?php 
	require_once 'db.php';
	$MySQLi_CON->query("DELETE FROM `requests` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	header("location: request.php");