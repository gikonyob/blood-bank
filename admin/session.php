<?php
	session_start();
	if(!ISSET($_SESSION['userSessionAdmin'])){
		header("location: index.php");
	}
?>	