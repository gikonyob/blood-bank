<?php

header('Content-Type: application/json');

include_once 'db.php';

$query = "SELECT bloodgroup , SUM(pints) as pints FROM donation GROUP BY bloodgroup ORDER BY bloodgroup ";

$result = $MySQLi_CON->query($query);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

$result->close();

$MySQLi_CON->close();

print json_encode($data);

?>