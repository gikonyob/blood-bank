<?php
	session_start();
	if(!ISSET($_SESSION['userSessionDoctor'])){
		header("location: index.php");
	}
?>	