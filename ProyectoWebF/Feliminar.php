<!DOCTYPE html>
<html lang="en">
	<head>
	  	<title>Eliminar Noticia</title>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<meta name="description" content="">
	  	<meta name="author" content="">
	  	<link rel="stylesheet" href="/lib/bootstrap.min.css">
	  	<script src="/lib/jquery-1.12.2.min.js"></script>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		<!-- Custom styles for this template -->
		<link href="css/blog-home.css" rel="stylesheet">
	 	<script src="/lib/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
		  	<h2>Eliminar Noticia</h2><BR><BR>
		  	<form role="form" action="eliminar.php" method="POST">
		    	<div class="input-group">
                    <div class="form-group">
				        <center><label for="inputId">Id </label></center>
				        <input type="text" REQUIRED class="form-control" id="inputId" name="id">
			  	    </div>
			  	    <center>
		    	    <p><button type="submit" name="boton" value="Eliminar"> Eliminar </button></p>
		    	    </center>
                </div>
		  	</form>
		</div>
	</body>
</html>
