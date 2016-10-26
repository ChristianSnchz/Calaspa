<?php
	
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$pais = $_POST["tarjeta"];
	
	$boundary = uniqid('np');		
		
	$cabecera = "MIME-VERSION: 1.0\r\n";
	$cabecera .= "Content-type: multipart/mixed;boundary=". $boundary . "\r\n";
	$cabecera .= "From: {$correo}";
		
	
	$cuerpo .= "\r\n\r\n--" . $boundary . "\r\n";
	$cuerpo .= "Content-type: text/plain";
	$cuerpo .= "charset= utf-8\r\n";
	$cuerpo .= "Content-Transfer-Encoding: 8bit\r\n";
	//$cuerpo .= "\r\n";
	$cuerpo .=";";
	$cuerpo .= $nombre;
	$cuerpo .=";";
	$cuerpo .=$correo;
	$cuerpo .=";";
	$cuerpo .=$telefono;
	$cuerpo .=";";
	$cuerpo .= $tarjeta;
	$cuerpo .=";";
	$cuerpo .="\r\n";
	
	$cuerpo .= "\r\n\r\n--" . $boundary . "--";
	
	mail("calaspaextranjeros@gmail.com","[1er Formulario Calaspa]",$cuerpo,$cabecera);
	header("location:gracias.html");
	
?>

	
