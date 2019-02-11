<?php
    if(isset($_POST['btn']) ){
?>
<?php
        include("Biblioteca.php");
        $db=conectaDB();
        $table="administrador";
        
        $correo = $_POST['email'];
        $password = $_POST['password'];
        
        $consulta = "SELECT * FROM $table";
        $result = $db->query($consulta);
        if($result==null){
            print "<p> Error al buscar </p>";
        }else{
            foreach($result as $valor){
                if($valor['email']==$correo && $valor['password']==$password){
                        header('Location: menu.html');    
                }
                else{
                    print"<div class=\"alert alert-danger\">";
                    print"<strong>Error!</strong> Correo Electronico o Contraseña incorrecta </div>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  	<title>Login de Administrador</title>
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

		<!-- Custom styles for this template -->
		<link href="css/blog-home.css" rel="stylesheet">
	 	<script src="/lib/bootstrap.min.js"></script>
	</head>
	<body>

	<div class="container">
	      <center>	<h2>LOGIN</h2><BR><BR>    </center>
	  	<form role="form" method="POST">
	  	    <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input type="password" class="form-control" id="pwd" placeholder="Password" name="password">
            </div><BR><BR>
	        <center><button type="submit" class="btn btn-default" name="btn">LOGIN</button>
	        <button type="submit" class="btn btn-default" formaction="index.php" name="btn1">REGRESAR AL MENU</button></center>
	  	</form>
	</div>
	</body>
</html>
