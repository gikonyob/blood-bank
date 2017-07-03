<?php
	require_once 'db.php';
	$camp = $_POST['camp'];
	$ddate = $_POST['ddate'];
	$bloodgroup = $_POST['bloodgroup'];
	$pints = $_POST['pints'];
	$MySQLi_CON->query("INSERT INTO `donation` VALUES ('$camp', '$ddate','$bloodgroup', '$pints')");
	?>
