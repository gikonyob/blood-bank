<?php
	require_once 'db.php';
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $b_id = $_POST['b_id'];
    $units = $_POST['units'];
    $reqdate = $_POST['reqdate'];
    $issuedunits = $_POST['issuedunits'];
    $issueddate = $_POST['issueddate'];
	$MySQLi_CON->query("UPDATE `requests` SET `fname` = '$fname', `lname` = '$lname', `b_id` = '$b_id', `units` = '$units',`reqdate` = '$reqdate',`issuedunits` = '$issuedunits',`issueddate` = '$issueddate', WHERE `id` = '$_REQUEST[id]'");