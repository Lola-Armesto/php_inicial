<?php

// Realizando conexion con BBDD
include("../dB_conexion/conexion.php");

// Recogiendo datos del formulario
$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo']; 
$color = $_POST['color'];
$precio = $_POST['precio'];

// Grabando nuevos datos y comprobacion de grabación correcta en BBDD
$sql="INSERT INTO php_inicial_lola (matricula_coche, marca_coche, modelo_coche, color_coche, precio_coche) VALUES ('".$matricula."','".$marca."','".$modelo."','".$color."','".$precio."')";
$ej=mysqli_query($db_conn,$sql);

// Listado datos BBDD sin filtro
$datos = "SELECT * FROM php_inicial_lola";
$consulta = mysqli_query($db_conn, $datos);
$resultado = mysqli_fetch_array($consulta);
$cadenaJSON = array();
while($resultado=mysqli_fetch_array($consulta)){
	
	$matricula=$resultado['matricula_coche'];
	$marca=$resultado['marca_coche'];
	$modelo=$resultado['modelo_coche'];
	$color=$resultado['color_coche'];
	$precio=$resultado['precio_coche'];
	//echo($matricula.' | '.$marca.' | '.$modelo.' | '.$color.' | '.$precio.' </br>');
	
	$cadenaJSON[]=array("matricula"=>$matricula,"marca"=>$marca,"modelo"=>$modelo,"color"=>$color,"precio"=>$precio);
	
} 
//Creando JSON
$jsonObj = json_encode($cadenaJSON);
echo $jsonObj;
//die($jsonObj);

// Para crear el archivo JSON

//$archivoJson = 'datos.json';
//file_put_contents($archivoJson,$jsonObj);


?>