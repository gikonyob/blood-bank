<?php

error_reporting(0);

include_once 'db.php';

$chk = $_POST['chk'];
$chkcount = count($chk);

if(!isset($chk))
{
    ?>
    <script>
        alert('At least one checkbox Must be Selected !!!');
        window.location.href = 'manageadmins.php';
    </script>
    <?php
}
else
{
    for($i=0; $i<$chkcount; $i++)
    {

        $del = $chk[$i];
        $sql=$MySQLi_CON->query("DELETE FROM admin WHERE id=".$del);
    }

    if($sql)
    {
        ?>
        <script>
            alert('<?php echo $chkcount; ?> Records were Deleted Successfully !!!');
            window.location.href='manageadmins.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Error while Deleting , TRY AGAIN');
            window.location.href='manageadmins.php';
        </script>
        <?php
    }

}


?>