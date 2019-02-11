<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Noticias</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/blog-home.css" rel="stylesheet">
	</head>
	<body>
		<center>
			<table border="2">
				<thead class="thead-dark">  
					<tr>
						<th>Id</th>
						<th>Categoria</th>
						<th>Titulo</th>
						<th>Descripción</th>
						<th>Noticia</th>
						<th>Imagen</th>
						<th>Autor</th>
						<th>Fecha</th>
						<th>Likes</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						include("Biblioteca.php");
						$db = conectaDB();
						$table = "Noticias";
						$consulta = "SELECT * FROM $table";
						$result = $db->query($consulta);
						foreach($result as $valor){
						    print "<tr>";
						    print "<td> $valor[Id]</td>";
						    print "<td>$valor[Categoria]</td>";
						    print "<td>$valor[Titulo]</td>";
						    print "<td>$valor[Descripcion]</td>";
						    print "<td>$valor[Noticia]</td>";
						    print "<td><img width=100px; height=100px; src=\"data:image/png;base64,".base64_encode($valor['Imagen'])."\"></td>";
						    print "<td>$valor[Autor]</td>";
						    print "<td>$valor[Fecha]</td>";
						    print "<td>$valor[Likes]</td>";
						    print "</tr>";
						}

					?>
					<center><a href="menu.html">Regresar al menu</a></center>
				</tbody>
			</table>
		</center>
	</body>
</html>