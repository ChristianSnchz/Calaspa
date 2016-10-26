<?php
	
	$nombre = $_POST["nombre"];
	$correo = $_POST["correo"];
	$telefono = $_POST["telefono"];
	$paquete = $_POST["paquete"];
	$pais = $_POST["pais"];
	$precio = $_POST["precio"];
	$agente = $_POST["agente"];
	
	$boundary = uniqid('np');		
	
	$nameFile = $_FILES['archivo']['name'];
	$sizeFile = $_FILES['archivo']['size'];
	$typeFile = $_FILES['archivo']['type'];
	$tempFile = $_FILES["archivo"]["tmp_name"];
	
	$cabecera = "MIME-VERSION: 1.0\r\n";
	$cabecera .= "Content-type: multipart/mixed;boundary=". $boundary . "\r\n";
	$cabecera .= "From: {$correo}";
		
	$cuerpo = "\r\n\r\n--" . $boundary . "\r\n";
	$cuerpo .= "Content-Type: application/octet-stream;";
	$cuerpo .= "name=" . $nameFile . "\r\n";
	$cuerpo .= "Content-Transfer-Encoding: base64\r\n";
	$cuerpo .= "Content-Disposition: attachment;";
	$cuerpo .= "filename=" .$nameFile . "\r\n";
	$cuerpo .= "\r\n";

	$fp = fopen($tempFile,"rb");
	$file = fread($fp,$sizeFile);
	$file = chunk_split(base64_encode($file));
	
	$cuerpo .= "$file\r\n";
	$cuerpo .= "\n\n";
	
	$cuerpo .= "\r\n\r\n--" . $boundary . "\r\n";
	$cuerpo .= "Content-type: text/plain";
	$cuerpo .= "charset= utf-8\r\n";
	$cuerpo .= "Content-Transfer-Encoding: 8bit\r\n";
	$cuerpo .= "\r\n";
	$cuerpo .= "\r\n Nombre: " . $nombre;
	$cuerpo .= "\r\n Correo: " . $correo;
	$cuerpo .= "\r\n Telefono: " . $telefono;
	$cuerpo .= "\r\n Paquete: " . $paquete;
	$cuerpo .= "\r\n Pais: " . $pais;
	$cuerpo .= "\r\n Precio: " . $precio;
	$cuerpo .= "\r\n Agente: " . $agente;
	$cuerpo .= "\r\n";	
	$cuerpo .= "\r\n\r\n--" . $boundary . "--";
	
	mail("cala.spa.ccs@gmail.com","[PAQUETE]",$cuerpo,$cabecera);
	header("location:g.html");
	
?>
