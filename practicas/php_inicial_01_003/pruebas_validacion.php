<?php
include("../dB_conexion/conexion.php");
$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo']; 
$color = $_POST['color'];
$precio = $_POST['precio'];
/*$errores = array();

if (!empty($_POST)){
	if(empty($_POST["matricula"])){
        $errores[] = "El nombre es requerido";
	}
	if(empty($_POST["marca"]) || strlen($_POST["marca"]) < 3){
        $errores[] = "La marca es requerida y ha de ser mayor a 3 caracteres";
    }
	if(empty($_POST["modelo"]) || strlen($_POST["modelo"]) < 3){
        $errores[] = "La marca es requerida y ha de ser mayor a 3 caracteres";
    }
	if(empty($_POST["color"]) || strlen($_POST["color"]) < 3){
        $errores[] = "La marca es requerida y ha de ser mayor a 3 caracteres";
    }
	if(empty($_POST["precio"]) || strlen($_POST["precio"]) < 3){
        $errores[] = "La marca es requerida y ha de ser mayor a 3 cifras";
    }
}*/	
	$sql="INSERT INTO php_inicial_lola (matricula_coche, marca_coche, modelo_coche, color_coche, precio_coche) VALUES ('".$matricula."','".$marca."','".$modelo."','".$color."','".$precio."')";
	$ej=mysqli_query($conn,$sql);

// Listado datos BBDD sin filtro
	$datos = "SELECT * FROM php_inicial_lola";
		$consulta = mysqli_query($conn, $datos);
		$resultado = mysqli_fetch_array($consulta);
		$cadenaJSON = array();
		
	while($resultado=mysqli_fetch_array($consulta)){
	
		$matricula=$resultado['matricula_coche'];
		$marca=$resultado['marca_coche'];
		$modelo=$resultado['modelo_coche'];
		$color=$resultado['color_coche'];
		$precio=$resultado['precio_coche'];
		
	$cadenaJSON[]=array("matricula"=>$matricula,"marca"=>$marca,"modelo"=>$modelo,"color"=>$color,"precio"=>$precio);
	$jsonObj = json_encode($cadenaJSON);
	echo $jsonObj;



?>