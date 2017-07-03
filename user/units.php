//MySqli Delete Query
$results = $mysqli->query("DELETE FROM products WHERE added_timestamp < (NOW() - INTERVAL 1 DAY)");

if($results){
    print 'Success! deleted one day old records';
}else{
    print 'Error : ('. $mysqli->errno .') '. $mysqli->error;
}