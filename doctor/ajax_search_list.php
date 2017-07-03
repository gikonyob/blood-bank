<?php
include("db.php");
include ("ajax_search_list.php");
if(isset($_GET['q']) && $_GET['q']!="") :
    $data = mysqli_real_escape_string($MySQLi_CON,$_GET['q']);
    $keyword =  trim(preg_replace('/\s+/',' ',$data));
    $sql=$MySQLi_CON->query("SELECT distinct email FROM `donarregister` WHERE email LIKE '%$keyword%' limit 10");
    $count=mysqli_num_rows($sql);
    if($count!=0) :
        $json_data=array();
        foreach ($sql as $key => $value):
            $json_data[] = $value['email'];
        endforeach;
        echo json_encode($json_data);
    else :
        echo 0;
    endif;
endif;
?>