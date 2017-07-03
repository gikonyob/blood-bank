<?php 
	require_once 'db.php';
	$MySQLi_CON->query("DELETE FROM `donation` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	header("location: record.php");