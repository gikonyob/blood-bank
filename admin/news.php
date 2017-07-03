
<?php

include_once 'db.php';

if(isset($_POST['btncamp']))
{
	$title = $MySQLi_CON->real_escape_string(trim($_POST['title']));
	$body = $MySQLi_CON->real_escape_string(trim($_POST['body']));
	$author = $MySQLi_CON->real_escape_string(trim($_POST['author']));
	$odate = $MySQLi_CON->real_escape_string(trim($_POST['odate']));
	$cdate = $MySQLi_CON->real_escape_string(trim($_POST['cdate']));
	$query = "INSERT INTO camps(title,body,author,odate,cdate) VALUES('$title','$body','$author','$odate','$cdate')";
		
		if($MySQLi_CON->query($query))
		{
			$msg1 = "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Successfully updated the camp details. Please wait you will be redirected to your account shortly
			  	</div>";
				header("refresh:3;account");
					
		}
		else
		{
			$msg1 = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button> Error while updating the camp details
					</div>";
		}
	
	



	}

	$MySQLi_CON->close();

?>


