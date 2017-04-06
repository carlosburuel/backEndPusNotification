<?php
	$host = 'localhost';
	$db_user = 'root';
	$db_password = '';
	$db_name = 'fcm_db';

	$conn = mysqli_connect($host, $db_user, $db_password, $db_name);
	if($conn)
		echo "Conexion satisfactoria\n";
	else
		echo "Conexion con error\n";
?>