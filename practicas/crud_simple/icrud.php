<?php
	include("../dB_conexion/conexion.php");
	include("tabla.php");

		if(isset($_POST)){

			$name = $_POST['nom'];
			$ape = $_POST['ape'];
			$dir = $_POST['dir'];
			$phone = $_POST['tel'];
			$mail = $_POST['mail'];

			$sqlcom = "SELECT * FROM agenda WHERE email_id = '".$mail."'";
			$sqlej = mysqli_query($conn,$sqlcom);
			$sqlres = mysqli_fetch_array($sqlej);

			if($sqlres){

				$name = $sqlres['nombre_id'];

				echo "
							<script language='javascript'>
				alert('Este contacto ya existe')
				window.location.href='index_crud.php'
				</script>";

				}else{

					$sqlins = "INSERT into agenda (nombre_id,apellidos_id,direccion_id,telefono_id,email_id) VALUES ('".$name."','".$ape."','".$dir."','".$phone."','".$mail."')";
					$sqlinsej = mysqli_query($conn,$sqlins);
					echo "<p><h3>Datos introducidos correctamente<a href = index_crud.php>Volver</a></h3></p>";
					//header("Location: index_crud.html"); 


				}

			



		}

?>