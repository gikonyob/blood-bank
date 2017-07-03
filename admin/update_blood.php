<?php
include_once 'db.php';
$id = $_POST['id'];
$bg = $_POST['bg'];
$un = $_POST['un'];
$camp = $_POST['camp'];
$chk = $_POST['chk'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
    $MySQLi_CON->query("UPDATE bloodunits SET bloodgroup='$bg[$i]', units='$un[$i]', camp='$camp[$i]' WHERE id=".$id[$i]);
}
header("Location: manageblood.php");
?>