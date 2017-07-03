<?php
include("db.php");
if(isset($_GET['q']) && $_GET['q']!="") :
    $data = mysqli_real_escape_string($db,$_GET['q']);
    $keyword =  trim(preg_replace('/\s+/',' ',$data));
    $sql=$db->query("SELECT distinct b_id FROM `donarregister` WHERE b_id LIKE '%$keyword%' limit 10");
    $count=mysqli_num_rows($sql);
    if($count!=0) :
        $json_data=array();
        foreach ($sql as $key => $value):
            $json_data[] = $value['b_id'];
        endforeach;
        echo json_encode($json_data);
    else :
        echo 0;
    endif;
endif;
?>