<?php

error_reporting(0);

include_once 'db.php';

//MySqli Delete Query
$results = $MySQLi_CON->query("DELETE FROM requests WHERE reqdate < (NOW() - INTERVAL 50 DAYS)");

if($results){
    print 'Success! deleted 50-day old records';
}else{
    print 'Error : ('. $MySQLi_CON->errno .') '. $MySQLi_CON->error;
}

?>