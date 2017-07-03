
<?php

include_once 'db.php';

if(isset($_POST['btn-register']))
{
	$fname = $MySQLi_CON->real_escape_string(trim($_POST['fname']));
	$lname = $MySQLi_CON->real_escape_string(trim($_POST['lname']));
	$gender = $MySQLi_CON->real_escape_string(trim($_POST['gender']));
	$mobile = $MySQLi_CON->real_escape_string(trim($_POST['mobile']));
	$b_id = $MySQLi_CON->real_escape_string(trim($_POST['b_id']));
	

     $check_lastname = $MySQLi_CON->query("SELECT lname FROM donarregister WHERE lname='$lname'");
     $count=$check_lastname->num_rows;

	if($count==0){
		
		
		$query = "INSERT INTO donarregister(fname,lname,mobile,gender,b_id)
 					VALUES('$fname','$lname','$mobile','$gender','$b_id')";
		
		if($MySQLi_CON->query($query))
		{
            $msg1 =  "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Recipient is successfully registered.
			  	</div>";
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
					<strong>Sorry !</strong>  Last Name already exists. Please Try another one
			  </div>
			  ";
			
	}


	}

	$MySQLi_CON->close();

?>


