
<?php

include_once 'db.php';

if(isset($_POST['bttn-update']))
{
	$b_id = $MySQLi_CON->real_escape_string(trim($_POST['b_id']));
	$last_donation_date = $MySQLi_CON->real_escape_string(trim($_POST['last_donation_date']));
	$last_donation_camp = $MySQLi_CON->real_escape_string(trim($_POST['last_donation_camp']));
	$number_of_donations = $MySQLi_CON->real_escape_string(trim($_POST['number_of_donations']));
		
		
		$query = "INSERT INTO donarregister(b_id,last_donation_date,last_donation_camp,number_of_donations)
 					VALUES('$b_id','$last_donation_date','$last_donation_camp','$number_of_donations')";
		
		if($MySQLi_CON->query($query))
		{
			$msg1 = "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Successfully updated the donor's profile
			  	</div>";
		}
		else
		{
			$msg1 = "<div class='alert bg-info'>
						<button class='close' data-dismiss='alert'>&times;</button> Error while updating !!!
					</div>";
		}
	


	

	$MySQLi_CON->close();
}
?>


