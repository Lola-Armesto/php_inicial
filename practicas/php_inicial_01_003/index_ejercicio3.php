<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		
	</head>
	<body>
	<?php
  if(isset($error))
{
 ?>
 <style>
 input:focus
 {
  border:solid red 1px;
 }
 </style>
 <?php
}
?>
	
		<p>Introduce datos</p>
		<p>Matricula: <input type="text"  name="matricula" id="matricula" placeholder="Introduce matricula"></p>
		<p>Marca: <input type="text" name="marca" id="marca" placeholder="Introduce marca"></p>
		<p>Modelo: <input type="text" name="modelo" id="modelo" placeholder="Introduce modelo"></p>
		<p>Color: <input type="text" name="color" id="color" placeholder="Introduce color"></p>
		<p>Precio: <input type="number" name="precio" id="precio" placeholder="Introduce precio"></p>	
		<p><button onclick="enviar_formulario()">Enviar</button></p>

	

		<p id="resultado"></p>
	
		
		
		<script type="text/javascript" language="javascript">
		
	
		
		
		function enviar_formulario(){
			var matricula = document.getElementById("matricula").value;
			var marca = document.getElementById("marca").value;
			var modelo = document.getElementById("modelo").value;
			var color = document.getElementById("color").value;
			var precio = document.getElementById("precio").value;
			
			
			var ajax = new XMLHttpRequest();/*la variable ajax es un objeto tipo XMLHttpRequest*/
			ajax.open("POST", "datos.php", true);/*enviaremos por post los datos,al archivo php, por lo que en action del formulario ya no es necesario ponerlo y el true significa que es asincrono*/
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("matricula="+matricula+"&marca="+marca+"&modelo="+modelo+"&color="+color+"&precio="+precio);/*en esta parte enviaras tus datos, en donde los que van 
			entre comillas sera el nombre que tendra el valor del dato al que le estas concatenando, si quieres añadir mas datos tendras que poner el amperson y el nombre de la variable
			, en el php recibirias estos datos de la siguiente manera $_POST["correo"];*/
		    ajax.onreadystatechange = function(){
				//console.log(ajax.status);
				//console.log(ajax.readyState);
				
				if(ajax.readyState == 4 && ajax.status == 200){
				//console.log(ajax.responseText);
				/*aqui si ajax.status es igual al codigo de estado, significa que la peticion se ha enviado correctamente y el readyState ==4 
				significa que el servidor termino de devolver la respuesta*/ 
				    var jsonResponse = ajax.responseText;
					var respuesta=JSON.parse(jsonResponse);
					console.log(respuesta);
					genera_tabla(respuesta);
					
					//return false;
					for(x of respuesta){
					
					//console.log('Matricula: '+ x.matricula + ' - ' + 'Marca: ' + x.marca + ' - ' + 'Modelo: ' + x.modelo + ' - ' + 'Color: '  + x.color + '  - ' + 'Precio: ' + x.precio);
					
					}
					
				} 
			}
					
		}
		
function genera_tabla(data) {

		// Obtener la referencia del elemento body
  var body = document.getElementsByTagName("body")[0];

  // Crea un elemento <table> y un elemento <tbody>
  var tabla   = document.createElement("table");
  
  var tblheader = document.createElement("thead");
  var tblBody = document.createElement("tbody");
  var cabecera = document.createElement("tr");
  
		var celda = document.createElement("th");
		var textoCelda = document.createTextNode("MATRICULA");
		celda.appendChild(textoCelda);
		cabecera.appendChild(celda);

		var celda = document.createElement("th");
		var textoCelda = document.createTextNode("MARCA");
		celda.appendChild(textoCelda);
		cabecera.appendChild(celda);
		
		var celda = document.createElement("th");
		var textoCelda = document.createTextNode("MODELO");
		celda.appendChild(textoCelda);
		cabecera.appendChild(celda);
		
		var celda = document.createElement("th");
		var textoCelda = document.createTextNode("COLOR");
		celda.appendChild(textoCelda);
		cabecera.appendChild(celda);
		
		var celda = document.createElement("th");
		var textoCelda = document.createTextNode("PRECIO");
		celda.appendChild(textoCelda);
		cabecera.appendChild(celda);
		
		tblheader.appendChild(cabecera);
  // Crea las celdas
  for (var i = 0; i < data.length; i++) {
    // Crea las hileras de la tabla
    var hilera = document.createElement("tr");

		var celda = document.createElement("td");
		var textoCelda = document.createTextNode(data[i].matricula);
		celda.appendChild(textoCelda);
		hilera.appendChild(celda);
		
		var celda = document.createElement("td");
		var textoCelda = document.createTextNode(data[i].marca);
		celda.appendChild(textoCelda);
		hilera.appendChild(celda);
		
		var celda = document.createElement("td");
		var textoCelda = document.createTextNode(data[i].modelo);
		celda.appendChild(textoCelda);
		hilera.appendChild(celda);
		
		var celda = document.createElement("td");
		var textoCelda = document.createTextNode(data[i].color);
		celda.appendChild(textoCelda);
		hilera.appendChild(celda);
		
		var celda = document.createElement("td");
		var textoCelda = document.createTextNode(data[i].precio);
		celda.appendChild(textoCelda);
		hilera.appendChild(celda);
		

    // agrega la hilera al final de la tabla (al final del elemento tblbody)
    tblBody.appendChild(hilera);
  }
   // posiciona el <thead> debajo del elemento <table>
  tabla.appendChild(tblheader);
  // posiciona el <tbody> debajo del elemento <thead>
  tabla.appendChild(tblBody);
  // appends <table> into <body>
  body.appendChild(tabla);
  // modifica el atributo "border" de la tabla y lo fija a "2";
  tabla.setAttribute("border", "2");

}



	</script>
	
	
			<p><a href="../index.html">Volver a inicio</p>
			
	
	</body>
	



</html>