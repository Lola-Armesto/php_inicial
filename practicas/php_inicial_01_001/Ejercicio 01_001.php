<html>
<head></head>
<body>
<p><a href="../index.html">Volver a inicio</p>
<?php
include("../dB_conexion/conexion.php");


// Insertar Datos (Harcodeados)

$sql="INSERT INTO php_inicial_lola (matricula_coche, marca_coche, modelo_coche, color_coche, precio_coche) 
		VALUES ('1212JJJ','SEAT','TOLEDO','ROJO','10000')";

if(mysqli_query($conn,$sql)){ echo('DATOS GRABADOS'); }else{ die('No se han grabado los datos. Intentalo de nuevo');}

// Selección Datos Insertados

$datos = "SELECT * FROM php_inicial_lola";
$consulta = mysqli_query($conn, $datos);
$resultado = mysqli_fetch_array($consulta);
do{
	$matricula=$resultado['matricula_coche'];
	$marca=$resultado['marca_coche'];
	$modelo=$resultado['modelo_coche'];
	$color=$resultado['color_coche'];
	$precio=$resultado['precio_coche'];
	echo($matricula.' | '.$marca.' | '.$modelo.' | '.$color.' | '.$precio.' </br>');
} WHILE($resultado=mysqli_fetch_array($consulta));


?>

</body>
</html>