<?php
	require_once 'db.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $b_id = $_POST['b_id'];
    $units = $_POST['units'];
    $reqdate = $_POST['reqdate'];
    $issuedunits = $_POST['issuedunits'];
    $issueddate = $_POST['issueddate'];
    $query = $MySQLi_CON->query("SELECT * FROM `requests` WHERE `fname` = '$fname' && `lname` = '$lname'  && `b_id` = '$b_id' && `units` = '$units'&& `reqdate` = '$reqdate'&& `issueddate` = '$issueddate'&& `issuedunits` = '$issuedunits'");
	$validate = $query->num_rows;
	if($validate > 0){
		echo "Success";
	}else{
		echo "Error";
	}