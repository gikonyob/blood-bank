
<?php

include_once 'db.php';

if(isset($_POST['btnsignup']))
{
	$fname = $MySQLi_CON->real_escape_string(trim($_POST['fname']));
	$lname = $MySQLi_CON->real_escape_string(trim($_POST['lname']));
	$code = $MySQLi_CON->real_escape_string(trim($_POST['code']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$passwordconfirm = $MySQLi_CON->real_escape_string(trim($_POST['passwordconfirm']));
	
	$new_password = password_hash($password, PASSWORD_DEFAULT);
	
	if($password!=$passwordconfirm){
      	$msg1 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords Do Not Match !
					</div>";
       }else{


	$check_email = $MySQLi_CON->query("SELECT email FROM doctorregister WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if($count==0){
		
		
		$query = "INSERT INTO doctorregister(fname,lname,code,email,password) VALUES('$fname','$lname','$code','$email','$new_password')";
		
		if($MySQLi_CON->query($query))
		{
			$msg1 = "<div class='alert alert-success col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered. The doctor may now login
					</div>";
					//$query3 = $MySQLi_CON->query("SELECT fname,lname,code,email,password FROM doctorregister WHERE email='$email'");
					//$row=$query3->fetch_array();
					//$_SESSION['userSession'] = $row['email'];
					//header("Location: ../index"); // redirects image view page after 5 seconds.
		}
		else
		{
			$msg1 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering !
					</div>";
		}
	}
	else{
		
		
		$msg1 = "<div class='alert alert-danger col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry email address already taken !
				</div>";
			
	}



	}
}
	$MySQLi_CON->close();

?>


