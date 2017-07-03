
<?php

include_once 'db.php';


if(isset($_POST['btn-register']))
{
	$fname = $MySQLi_CON->real_escape_string(trim($_POST['fname']));
	$lname = $MySQLi_CON->real_escape_string(trim($_POST['lname']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$con_password = $MySQLi_CON->real_escape_string(trim($_POST['con_password']));
	
	$new_password = password_hash($password, PASSWORD_DEFAULT);

	if($password!=$con_password){
        $msg1 = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						 Passwords Do Not Match ! Try Again
					</div>";
       }else{


	$check_email = $MySQLi_CON->query("SELECT email FROM admin WHERE email='$email'");
	$count=$check_email->num_rows;
	
	if($count==0){
		
		
		$query = "INSERT INTO admin(fname,lname,email,password) VALUES('$fname','$lname','$email','$new_password')";
		
		if($MySQLi_CON->query($query))
		{
			$msg1 = "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Successfully registered. Click <a href='index'>here</a> to login. 
			  	</div>";
					//$query3 = $MySQLi_CON->query("SELECT fname,lname, email, password FROM admin WHERE email='$email'");
					//$row=$query3->fetch_array();
					//$_SESSION['userSession'] = $row['email'];
					//header("Location: ../index"); // redirects image view page after 5 seconds.
		}
		else
		{
			$msg1 = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button> Error while registering !!!
					</div>";
		}
	}
	else{
		
		
		$msg1 = "<div class='alert bg-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  Email or Mobile Number already exists. Please Try another one
			  </div>
			  ";
			
	}



	}
}
	$MySQLi_CON->close();

?>


