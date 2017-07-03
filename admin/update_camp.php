<?php
include_once 'db.php';
$id = $_POST['id'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$em = $_POST['em'];
$od = $_POST['od'];
$cd = $_POST['cd'];
$chkcount = count($id);

{
	$MySQLi_CON->query("UPDATE camps SET title='$fn[$i]', body='$ln[$i]', author='$em[$i]', 
	odate='$od[$i]', cdate='$cd[$i]' WHERE id=".$id[$i]);
}
header("Location: managecamps.php");
?>