<?php
	require_once 'conn.php';
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$b_id = $_POST['b_id'];
	$query = $MySQLi_CON->query("SELECT * FROM `donarregister` WHERE `fname` = '$fname' && `lname` = '$lname' && `email` = '$email' && `b_id` = '$b_id'");
	$validate = $query->num_rows;
	if($validate > 0){
		echo "Success";
	}else{
		echo "Error";
	}