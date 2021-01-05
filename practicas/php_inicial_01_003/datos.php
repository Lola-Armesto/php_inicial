<?php

// Realizando conexion con BBDD
include("../dB_conexion/conexion.php");


// Recogiendo datos del formulario
$matricula = $_POST['matricula'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo']; 
$color = $_POST['color'];
$precio = $_POST['precio'];

/*//Validacion datos en servidor
$aErrores = array();
$aMensajes = array();
 $patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s][0-9]+$/";
 //primer paso: comprobacion si han llegado los datos del formulario
if (!empty($_POST)){
	 //echo "Formulario recibido: </br>";
	 //print_r($_POST);
	 //segundo paso:validar campos
	
	 if(isset($_POST['matricula']) && isset($_POST['marca'])&& isset($_POST['modelo'])&& isset($_POST['color'])&& isset($_POST['precio']))
	 {
		 //matricula
		 if (empty($_POST['matricula'])){
			 $aErrores[]="Especificar matricula";
		 }else{
			  if( preg_match($patron_texto, $_POST['matricula']) ){
                    $aMensajes[] = "Matricula: [".$_POST['matricula']."]";
					
              }  else
                    $aErrores[] = "La matricula debe tener letras y numeros ";
            
		 }
		 //marca
		 if (empty($_POST['marca'])){
			 $aErrores[]="Especificar marca";
		 }else{
			  if( preg_match($patron_texto, $_POST['marca']) ){
                    $aMensajes[] = "Marca: [".$_POST['marca']."]";
					
			  } else
                    $aErrores[] = "La marca debe tener letras y numeros ";
            
		 }
		 //modelo
		 if (empty($_POST['modelo'])){
			 $aErrores[]="Especificar modelo";
		 }else{
			  if( preg_match($patron_texto, $_POST['modelo']) ){
                    $aMensajes[] = "Modelo: [".$_POST['modelo']."]";
					
			  } else
                    $aErrores[] = "El modelo debe tener letras y numeros ";
            
		 }
		 //color
		 if (empty($_POST['color'])){
			 $aErrores[]="Especificar color";
		 }else{
			  if( preg_match($patron_texto, $_POST['color']) ){
                    $aMensajes[] = "Color: [".$_POST['color']."]";
					
			  } else
                    $aErrores[] = "El color debe tener letras  ";
            
		 }
		 //precio
		 if (empty($_POST['precio'])){
			$aErrores[]="Especificar precio";
		 }else{
			 if( preg_match($patron_texto, $_POST['precio']) ){
                    $aMensajes[] = "Precio: [".$_POST['precio']."]";
			  } else
                    $aErrores[] = "El precio debe ser un numero  ";
            
		 }
	 }
	 else
            {
                //echo "<p>No se han especificado todos los datos requeridos.</p>";
            }
            // Si han habido errores se muestran, sino se mostrán los mensajes
        if( count($aErrores) > 0 )
            {
			//echo "<p>ERRORES ENCONTRADOS:</p>";
                // Mostrar los errores:
               for( $contador=0; $contador < count($aErrores); $contador++ ){
				// echo " $aErrores[$contador]. <br/>";}
            }
            else
            {
                // Mostrar los mensajes:
                for( $contador=0; $contador < count($aMensajes); $contador++ ){}
                  //  echo " $aMensajes[$contador].<br/>";
            }
	 
 }
         else
        {
           //echo "<p>No se ha enviado el formulario.</p>";
        }
      // echo "<p><a href='index_ejercicio3.html'>Haz clic aquí para volver al formulario</a></p>";

//echo "$matricula + 'y' + $marca";*/
// Grabando nuevos datos y comprobacion de grabación correcta en BBDD
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
	//echo($matricula.' | '.$marca.' | '.$modelo.' | '.$color.' | '.$precio.' </br>');
	
	//$cadenaJSONe[]=array("errores"=>$aErrores,"matricula"=>$matricula,"marca"=>$marca,"modelo"=>$modelo,"color"=>$color,"precio"=>$precio);
	$cadenaJSON[]=array("matricula"=>$matricula,"marca"=>$marca,"modelo"=>$modelo,"color"=>$color,"precio"=>$precio);
} 
//Creando JSON

$jsonObj = json_encode($cadenaJSON);
//$jsone = json_encode($cadenaJSONe);
echo $jsonObj;

//echo $jsone;

//die($jsonObj);

// Para crear el archivo JSON

//$archivoJson = 'datos.json';
//file_put_contents($archivoJson,$jsonObj);


?>