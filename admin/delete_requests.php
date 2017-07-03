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
		window.location.href = 'viewrequests.php';
		</script>
        <?php
	}
	else
	{
		for($i=0; $i<$chkcount; $i++)
		{
			
			$delt = $chk[$i];
			$sql=$MySQLi_CON->query("DELETE FROM requests WHERE id=".$delt);
		}	
		
		if($sql)
		{
			?>
			<script>
			alert('<?php echo $chkcount; ?> Records were deleted successfully !!!');
			window.location.href='viewrequests.php';
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('Error while Deleting , TRY AGAIN');
			window.location.href='viewrequests.php';
			</script>
			<?php
		}
		
	}

	
?>