<?php
	require_once 'db.php';
	$acc_query = $MySQLi_CON->query("SELECT * FROM `donation` WHERE `email` = '$_SESSION[userSessionAdmin]'") or die(mysqli_error());
	$acc_fetch = $acc_query->fetch_array();
	$acc_name = $acc_fetch['username'];