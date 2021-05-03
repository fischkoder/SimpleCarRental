<?php
	session_start();

	$item = $_REQUEST['id'];
	
	if(isset($item)){
		unset($_SESSION['reserve'][$item]);
	}

	header("Location:reservation.php");
?>