<?php
	require_once 'conn.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$b_id = $_POST['b_id'];
	$MySQLi_CON->query("INSERT INTO `donarregister` VALUES ('', '$fname', '$lname','$email', '$b_id')");
	?>
