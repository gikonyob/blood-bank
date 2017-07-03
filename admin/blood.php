
<?php

include_once 'db.php';

if(isset($_POST['btnblood']))
{
    $bloodgroup = $MySQLi_CON->real_escape_string(trim($_POST['bloodgroup']));
    $camp = $MySQLi_CON->real_escape_string(trim($_POST['camp']));
    $pints = $MySQLi_CON->real_escape_string(trim($_POST['pints']));
    $ddate = $MySQLi_CON->real_escape_string(trim($_POST['ddate']));
    $query = "INSERT INTO donation (bloodgroup,camp,pints,ddate) VALUES('$bloodgroup','$camp','$pints','$ddate')";

    if($MySQLi_CON->query($query))
    {
        $msg1 = "<div class='alert bg-succeed'>
					<button class='close' data-dismiss='alert'>&times;</button>
					Successfully updated blood details. Please wait you will be redirected to your account shortly
			  	</div>";
       header("refresh:3;record");

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


