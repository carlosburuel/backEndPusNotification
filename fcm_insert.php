<?php
	//Remover reportes
	error_reporting(0);
	require "init.php";
	$fcm_token = $_POST["fcm_token"];

	$sql = "insert into fcm_info values('".$fcm_token."');";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
?>