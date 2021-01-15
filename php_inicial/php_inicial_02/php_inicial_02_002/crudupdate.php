<?php

include_once("../../dB_conexion/conexion.php");
include_once("../utilities/helper.php");
include_once("../utilities/tabla.php");
	
	//VALIDACION DATOS LADO SERVIDOR

/*$error ='';
//CHECK REQUEST
if(empty($_POST)){$error[] = '<p>No se han encontrado datos</p>';}
if(!isset($_POST['name'],$_POST['surname'],$_POST['dir'],$_POST['phone'],$_POST['mail'])){$error+= '<p>No se han recibido todos los datos requeridos</p>';}

//CHECK VALUES
if(empty($_POST['name'])){$error.= '<p>El campo nombre no puede estar vacío</p>';}
if(empty($_POST['surname'])){$error.= '<p>El campo apellidos no puede estar vacío</p>';}
if(empty($_POST['dir'])){$error.= '<p>El campo direccion no puede estar vacío</p>';}
if(empty($_POST['phone'])){$error.= '<p>El campo teléfono no puede estar vacío</p>';}
if(empty($_POST['mail'])){$error.= '<p>El campo email no puede estar vacío</p>';}

if(!empty($error)){send_err(-1,$error);exit;}*/



// Recogiendo datos del formulario

$mail = $_POST['mail'];

$sql_mail="SELECT * FROM agenda WHERE email_id = '".$mail."'";
$ej_mail = mysqli_query($db_conn,$sql_mail);
$res_mail = mysqli_fetch_array($ej_mail);

$cod = $res_mail['id_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$dir = $_POST['dir']; 
$phone = $_POST['phone'];
$mail = $_POST['email'];

	
$up = "UPDATE agenda SET nombre_id = '".$name."', apellidos_id = '".$surname."', direccion_id = '".$dir."', telefono_id = '".$phone."', email_id = '".$mail."' WHERE id_id = '".$cod."'";
$upej = mysqli_query($db_conn,$up);

	$selup = "SELECT * FROM agenda WHERE id_id = '$cod'";
	$ejup = mysqli_query($db_conn,$selup);
	$resup = mysqli_fetch_array($ejup);

	$nname = $resup['nombre_id'];
	$nsurname =$resup['apellidos_id'];
	$ndirection =$resup['direccion_id'];
	$nphone = $resup['telefono_id'];
	$nmail = $resup['email_id'];

	$newJSON[] = array("nombre"=>$nname,"apellidos"=>$nsurname,"direccion"=>$ndirection,"telefono"=>$nphone,"correo"=>$nmail);
	$nJSON = json_encode($newJSON);
	 echo $nJSON;



			
			

?>