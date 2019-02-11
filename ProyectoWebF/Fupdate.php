<!DOCTYPE html>
<html lang="en">
	<head>
	  	<title>Actualizar Noticia</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<meta name="description" content="">
	  	<meta name="author" content="">
	  	<link rel="stylesheet" href="/lib/bootstrap.min.css">
	  	<script src="/lib/jquery-1.12.2.min.js"></script>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/blog-home.css" rel="stylesheet">
	 	<script src="/lib/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
		  	<h2>Actualizar Noticia</h2><BR><BR>
		  	<form role="form" action="articulo.php" method="POST" enctype="multipart/form-data">
		  		<div class="form-group">
				    <label for="inputId">Id de la Noticia: </label>
				    <input type="text" REQUIRED class="form-control" id="inputId" name="id">
			  	</div>
		    	<div class="form-group">
			      	<label for="inputCategoria">Categoria</label>
			      	<select id="inputCategoria" REQUIRED class="form-control" name="Categoria">
			        	<option selected>Choose...</option>
			        	<option value="Politica">Politica</option>
			        	<option value="Espectaculos">Espectaculos</option>
			        	<option value="Deportes">Deportes</option>
			      	</select>
			    </div>
			    <div class="form-group">
				    <label for="inputTitulo">Titulo: </label>
				    <input type="text" REQUIRED class="form-control" id="inputTitulo" name="titulo">
			  	</div>
			  	<div class="form-group">
				    <label for="Descripcion">Descripcion: </label>
				    <textarea class="form-control" REQUIRED id="Descripcion" rows="5" name="descripcion"></textarea>
			  	</div>
			  	<div class="form-group">
				    <label for="Noticia">Noticia: </label>
				    <textarea class="form-control" REQUIRED id="Noticia" rows="30" name="noticia"></textarea>
			  	</div>
		    	<div class="form-group">
				    <label for="Imagen">Seleccionar Imagen: </label>
				    <input type="file" class="form-control-file" id="Imagen" name="imagen">
			  	</div>
			  	<div class="form-group">
				    <label for="inputAutor">Autor: </label>
				    <input type="text" REQUIRED class="form-control" id="inputAutor" name="autor">
			  	</div>
		    	<p><button type="submit" name="boton" value="Actualizar"> Actualizar </button></p>
		  	</form>
		</div>
	</body>
</html>
