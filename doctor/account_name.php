<?php
	require_once 'conn.php';
	$acc_query = $MySQLi_CON->query("SELECT * FROM `donarregister` WHERE `email` = '$_SESSION[userSessionDoctor]'") or die(mysqli_error());
	$acc_fetch = $acc_query->fetch_array();
	$acc_name = $acc_fetch['username'];