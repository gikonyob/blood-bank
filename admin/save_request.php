<?php
	require_once 'db.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$b_id = $_POST['b_id'];
	$units = $_POST['units'];
	$reqdate = $_POST['reqdate'];
	$issuedunits = $_POST['issuedunits'];
	$issueddate = $_POST['issueddate'];

	$MySQLi_CON->query("INSERT INTO `requests` VALUES ('$fname', '$lname','$b_id'),'$units','$reqdate','$issuedunits','$issueddate')");
	?>
