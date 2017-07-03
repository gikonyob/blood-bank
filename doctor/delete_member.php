<?php 
	require_once 'conn.php';
	$MySQLi_CON->query("DELETE FROM `donarregister` WHERE `id` = '$_REQUEST[id]'") or die(mysqli_error());
	header("location: member.php");