<?php
	require_once 'db.php';
	$camp = $_POST['camp'];
	$ddate = $_POST['ddate'];
	$bloodgroup = $_POST['bloodgroup'];
	$pints = $_POST['pints'];
	$MySQLi_CON->query("UPDATE `donation` SET `camp` = '$camp', `ddate` = '$ddate', `bloodgroup` = '$bloodgroup', `pints` = '$pints' WHERE `id` = '$_REQUEST[id]'");