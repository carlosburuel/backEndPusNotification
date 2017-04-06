<?php
	//Remover reportes
	error_reporting(0);
	require 'init.php';
	$message = $_POST["message"];
	$title = $_POST["title"];
	$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
	$server_key = "AAAANe0O7Oo:APA91bFaMzSW8n_aV5keb1ahOA4LyVTmNfrfr8JPi9ZLMZG2A_WRH6fl_00dfDqxrDUjghhNMaM1PVNoeIxmoFmZkzJ_h7OuQQyTrbVfcUQvVetk6dNEXwWQwxtadIdgNwRTlPXDuqGy";
	$sql = "SELECT fcm_token FROM fcm_info";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_row($result);
	$key = $row[0];

	//Modificacion de pruebas
	$message = "Titulo de push 2";
	$title = "Lady masajes";
	$key =	"f2Qogi5DQhc:APA91bGP5bHKorYrFffpvn-CqrfA0lXU6jvvt1RSyvrWRzL4vD33tNRtLK6isNYBhJ0yDz8asiMa_qXCwjzaKHOVRrraelKh5q-5kwV7ImxWpRHZ6dbOV6Bv9vm0j8HpxSamfHgvg3kI";


	//Cabecera
	$headers = array('Authorization:key='.$server_key, 'Content-Type:application/json');

	//Campos
	$fields =
	array('to' => $key,
		'notification'=> array('title' => $title, 'body'=> $message, 'sound'=> "default", 'priority'=> "high")
	);

	$payload = json_encode($fields);

	//Configuracion de CURL
	$curl_session = curl_init();
	curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
	curl_setopt($curl_session, CURLOPT_POST, true);
	curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
	curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);

	$result = curl_exec($curl_session);
	mysqli_close($conn);
	echo "Se envio";
?>