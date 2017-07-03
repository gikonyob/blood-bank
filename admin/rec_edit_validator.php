<?php
	require_once 'db.php';
    $camp = $_POST['camp'];
    $ddate = $_POST['ddate'];
    $bloodgroup = $_POST['bloodgroup'];
    $pints = $_POST['pints'];
	$query = $MySQLi_CON->query("SELECT * FROM `donation` WHERE `camp` = '$camp' && `ddate` = '$ddate' && `bloodgroup` = '$bloodgroup' && `pints` = '$pints'");
	$validate = $query->num_rows;
	if($validate > 0){
		echo "Success";
	}else{
		echo "Error";
	}