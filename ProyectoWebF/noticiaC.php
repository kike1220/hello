<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Noticia</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>

  <!-- NAVEGACION- SECCION  -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  
    <div class="col-md-4">
      <div class="container">
        <img src="logo.png" >
        <a class="navbar-brand" href="#">NEWS noticias</a>
      </div>
    </div>

      <div class="col-md-4">
      <div class="container">
        <center><a class="text-white">Más informacion</a></center>
      </div>
    </div>


    <div class="col-md-4">
      <div class="container">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">INICIO
                      <span class="sr-only">(current)</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="deportes.php">DEPORTES</a>
              </li>
                <li class="nav-item">
                  <a class="nav-link" href="politica.php">POLITICA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="espectaculos.php">ESPECTACULOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Login.php">LOGIN</a>
                </li>
            </ul>
          </div>
      </div>
    </div>
   </nav>

    <div class="container">
        <br>
        <br>
        <br> 
            <?php 
              include("Biblioteca.php");
              $db= conectaDB();
              $tabla="Noticias";
              $id=$_GET['id'];
              $band=0;

              $consulta="SELECT * FROM $tabla WHERE Id = $id";
              $result=$db->query($consulta);
              if($result!=null){
                foreach ($result as $valor) {
                  if($band==0){
                    $dato=$valor;
                    $band=1;
                  }
                }
              }
              else{
                print"<p>Error al realizar la consulta</p>";  
              }
              $db=null;
            ?> 
            <div class="card mb-3">
              <?php 
                print"<h1 class=\"card-title\">$dato[Titulo]</h1>";
                print"<img class=\"card-img-top\" src=\"data:image/png;base64,".base64_encode($dato['Imagen'])."\" alt=\"Card image cap\">"; ?>
              <div class="card-body">
                <?php
                  print"<h5 class=\"card-title\">$dato[Descripcion]</h5>";
                  print"<p class=\"card-text\">$dato[Noticia]</p>";
                  print"<p class=\"card-text\"><small class=\"text-muted\">Fecha y Hora de publicación: $dato[Fecha]</small></p>";
                  print"<p class=\"card-text\"><small class=\"text-muted\">Autor: $dato[Autor]</small></p>";
                  print"<p class=\"card-text\"><small class=\"text-muted\">Likes: $dato[Likes]</small></p>";
                  $likes=$dato['Likes'];
                ?>
              </div>
            </div>
          <?php print"<form role=\"form\" action=\"comentario.php?id=$dato[Id]\" method=\"POST\">"; ?>
                <div class="form-group">
                  <label for="comment">Comentar:</label>
                  <textarea class="form-control" REQUIRED rows="3" id="comment" name="comentario"></textarea>
                  <div class="container">
                      <br>
                      <button type="submit" class="btn btn-primary" value="Escribir">Escribir</button>
                      <?php print"<button type=\"button\" class=\"btn btn-primary\" onclick=\"location.href='like.php?id=$dato[Id]&like=$dato[Likes]'\">Me gusta</button>"; ?>
                    </div>
                </div>
            </form>
            
            <?php
                $db1=conectaDB();
                $tabla="Comentarios";
                
                $con="SELECT * FROM $tabla WHERE NoticiaId=$id ORDER BY Id DESC";
                $r=$db1->query($con);
                if($r==null){
                    print"<p>Error</p>";
                }
                else{
                    foreach($r as $v){
                        print"<div class=\"card my-4\">";
                        print"<div class=\"card-body\">";
                        print"<p class=\"font-italic\">Anonimo</p>";
                        print"<p class=\"font-italic\">$v[comentario]</p>";
                        print" </div>";
                        print"</div>";
                    }
                }
            ?>    

    </div>
    <!-- foooter#################################################################################-->
    <footer class="py-5 bg-dark">

      <div class="row">

          <div class="col-md-8">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; NEWS Noticias 2019</p>   
            </div>
          </div>


          <div class="col-md-.5">
              <div class="container">
                <img src="youtube.png" class="img-responsive center-block" />
              </div>
          </div>

          <div class="col-md-.5">
              <div class="container">
                <img src="facebook.png" class="img-responsive center-block" />
              </div>
          </div>

          <div class="col-md-.5">
              <div class="container">
                <img src="gmail.png" class="img-responsive center-block" />
              </div>
          </div>

          <div class="col-md-.5">
              <div class="container">
                <img src="twitter.png" class="img-responsive center-block" />
              </div>
          </div>
      
      </div>
      <!-- /.container -->
    </footer>

    <!--foooter#################################################################################-->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
