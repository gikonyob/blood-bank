<?php
	require_once 'conn.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$b_id = $_POST['b_id'];
	$MySQLi_CON->query("UPDATE `donarregister` SET `fname` = '$fname', `lname` = '$lname', `email` = '$email', `b_id` = '$b_id' WHERE `id` = '$_REQUEST[id]'");