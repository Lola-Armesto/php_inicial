<?php
include("../dB_conexion/conexion.php");
$tab = "CREATE TABLE IF NOT EXISTS agenda(
		id_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		nombre_id varchar(10),
		apellidos_id  varchar(80),
		direccion_id varchar(50),
		telefono_id  int(9),
		email_id varchar(30))" ;

		if (mysqli_query($conn, $tab)) {
		 //Mostramos mensaje si la tabla ha sido creado correctamente!
			//echo "Tabla Agenda created successfully";
		} else {
			// Mostramos mensaje si hubo algún error en el proceso de creación
			echo "Error al crear la tabla:  o la tabla ya existe" . mysqli_error($conn);
		}

		if(isset($_POST)){

			$name = $_POST['nom'];
			$ape = $_POST['ape'];
			$dir = $_POST['dir'];
			$phone = $_POST['tel'];
			$mail = $_POST['mail'];

			echo "$mail";


			$sqlcom = "SELECT * FROM agenda WHERE email_id = '".$mail."'";
			$sqlej = mysqli_query($conn,$sqlcom);
			$sqlres = mysqli_fetch_array($sqlej);

			if($sqlres){

				echo "<h3>El usuario: "  + $name + "ya existe</h3>";

			}else{

				$sqlins = "INSERT into agenda (nombre_id,apellidos_id,direccion_id,telefono_id,email_id) VALUES ('".$name."','".$ape."','".$dir."','".$phone."','".$mail."')";
				$sqlinsej = mysqli_query($conn,$sqlins);
				echo "<p><h3>Datos introducidos correctamente<a href = index_crud.html>Volver</a></h3></p>";
				//header("Location: index_crud.html"); 

			}



		}

?>