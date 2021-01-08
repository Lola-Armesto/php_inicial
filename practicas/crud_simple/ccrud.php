<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen">
</head>
	<body>
			<?php
				include("../dB_conexion/conexion.php");
				include("tabla.php");

						$sqlcom = "SELECT * FROM agenda ";
						$sqlej = mysqli_query($conn,$sqlcom);
						

						if($sqlej){
								echo "<table style ='border:2px solid black'>";
								echo "<thead >";
									echo" <tr style = 'border:1px solid black'>
											<th >Nombre</th>
											<th>Apellidos</th>
											<th>Direccion</th>
											<th>Telefono</th>
											<th>Email</th>
											<th></th>
											<th></th>

										  </tr>";
								echo "</thead>";
								

							while($sqlres = mysqli_fetch_array($sqlej)){
								$cod = $sqlres['id_id'];
								$nom = $sqlres['nombre_id'];
								$ape = $sqlres['apellidos_id'];
								$dir = $sqlres['direccion_id'];
								$phone = $sqlres['telefono_id'];
								$mail = $sqlres['email_id'];



								echo "<tbody style = 'border:1px solid black'>";
									echo" <tr style = 'border:1px solid black'>
												<td style = 'border:1px solid black'>".$nom." </td>
											 	<td style = 'border:1px solid black'>".$ape." </td>
											 	<td style = 'border:1px solid black'>".$dir." </td>
											 	<td style = 'border:1px solid black'>".$phone." </td>
												<td style = 'border:1px solid black'>".$mail."</td>
												<td><a href = 'ucrud.php?var = ".$cod."'>Modificar</a></td>
												<td><a href = 'dcrud.php?var = ".$cod."'>Eliminar</a></td>
											</tr>"; 
								echo "</tbody>";

							}
							
							echo "</table>";
						}else{ echo "No hay registros";}

								
			?>	
	<p><a href="../index.html">Volver a inicio</p>
	
	</body>
	



</html>