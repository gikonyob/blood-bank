<?php
include_once 'db.php';
$id = $_POST['id'];
$st = $_POST['st'];
$id = $_POST['id'];
$iu = $_POST['iu'];
$chk = $_POST['chk'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	$MySQLi_CON->query("UPDATE requests SET status='$st[$i]',issueddate='$id[$i]',issuedunits='$iu[$i]' WHERE id=".$id[$i]);
}
header("Location: viewrequests.php");
?>