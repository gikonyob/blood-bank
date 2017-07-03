<?php
include_once 'db.php';
$id = $_POST['id'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$em = $_POST['em'];
$bg = $_POST['bg'];
$ld = $_POST['ld'];
$nd = $_POST['nd'];
$lc = $_POST['lc'];
$chk = $_POST['chk'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	$MySQLi_CON->query("UPDATE donarregister SET fname='$fn[$i]', lname='$ln[$i]', email='$em[$i]', b_id='$bg[$i]',
	last_donation_date='$ld[$i]', number_of_donations='$nd[$i]', last_donation_camp='$lc[$i]' WHERE id=".$id[$i]);
}
header("Location: viewusers.php");
?>