<?php
session_start();
include_once 'db.php';



if(isset($_POST['btn-login']))
{
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	
	$query = $MySQLi_CON->query("SELECT email, password FROM doctorregister WHERE email='$email'");
	$row=$query->fetch_array();
	
	if(password_verify($password, $row['password']))
	{
		$_SESSION['userSessionDoctor'] = $row['email'];
		header("Location: account");
	}
	else
	{
		$msg3 = "<div class='alert bg-info' >
					<button class='close' data-dismiss='alert'>&times;</button> Email or Password does not exists !!!
				</div>";
	}
	
	$MySQLi_CON->close();
	
}
?>