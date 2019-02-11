<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Noticias de Oaxaca Espectaculos</title>
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>

  <!-- NAVEGACION- SECCION  -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <img src="logo.png" >
      <center><a class="navbar-brand" href="#">ESPECTACULOS</a></center>
    </div>
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link" href="#">ESPECTACULOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Login.php">LOGIN</a>
            </li>
          </ul>
        </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">

      <!-- Blog Entries Column -->

      <div class="col-md-8">
        <h1 class="my-4">Noticias
          <small>Espectaculos</small>
        </h1>
        <?php
            include("Biblioteca.php");
            $db = conectaDB();
            $tabla = "Noticias";
            $cont=0;
            
            $consulta= "SELECT * FROM $tabla ORDER BY Likes DESC";
            $result = $db->query($consulta);
            if($result!=null){
                foreach($result as $valor){
                    if($valor['Categoria']=="Espectaculos"){
                        if($cont==0){$dato1=$valor; $cont=$cont+1;}
                        else{
                            if($cont==1){$dato2=$valor; $cont=$cont+1;}
                            else{
                                if($cont==2){$dato3=$valor; $cont=$cont+1;}
                                else{
                                    if($cont==3){$dato4=$valor; $cont=$cont+1;}
                                    else{
                                        if($cont==4){$dato5=$valor; $cont=$cont+1;}
                                        else{
                                            if($cont==5){$dato6=$valor; $cont=$cont+1;}
                                            else{
                                                if($cont==6){$dato7=$valor; $cont=$cont+1;}
                                                else{
                                                    if($cont==7){$dato8=$valor; $cont=$cont+1;}
                                                    else{
                                                        if($cont==8){$dato9=$valor; $cont=$cont+1;}
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                print"<p> Error al realizar la consulta </p>";
            }
        ?>
        <!-- Codigo de Carrusel-->
        <div id= "carouselExampleIndicators" class= "carousel slide" data-ride= "carousel"> 
          <ol class= "carousel-indicators" > 
            <li data-target= "#carouselExampleIndicators" data-slide-to= "0" class= "active" ></li> 
            <li data-target= "#carouselExampleIndicators" data-slide-to= "1" ></li> 
            <li data-target= "#carouselExampleIndicators" data-slide-to= "2" ></li> 
          </ol> 
          <div class= "carousel-inner" > 
            <div class= "carousel-item active" > 
                <?php print"<img class=\"d-block w-100\" src= \"data:image/png;base64,".base64_encode($dato1['Imagen'])."\" alt=\"First slide\">"; ?>
                

                <div class= "carousel-caption d-none d-md-block" > 
                <?php print"<h5> $dato1[Titulo] </h5> "; ?>
        </div>

            </div> 
            <div class= "carousel-item" > 
            <?php print"<img class=\"d-block w-100\" src= \"data:image/png;base64,".base64_encode($dato2['Imagen'])."\" alt=\"First slide\">"; ?>

              <div class= "carousel-caption d-none d-md-block" > 
        <?php print"<h5> $dato2[Titulo] </h5> "; ?>
        </div>

            </div> 
            <div class= "carousel-item" > 
            <?php print"<img class=\"d-block w-100\" src= \"data:image/png;base64,".base64_encode($dato3['Imagen'])."\" alt=\"First slide\">"; ?>
              <div class= "carousel-caption d-none d-md-block" > 
          <?php print"<h5> $dato3[Titulo] </h5> "; ?>
        </div>

            </div> 
          </div> 
          <a class= "carousel-control-prev" href= "#carouselExampleIndicators" role= "button" data-slide= "prev" > 
            <span class= "carousel-control-prev-icon" aria-hidden= "true" ></span> 
            <span class= "sr-only" > Previous </span> 
          </a> 
          <a class= "carousel-control-next" href= "#carouselExampleIndicators" role= "button" data-slide= "next" > 
            <span class= "carousel-control-next-icon" aria-hidden= "true" ></span> 
            <span class= "sr-only" > Next </span> 
          </a> 
        </div>
          <!-- Termina codigo de Carrusel-->

        <div class="card" style="width: 29px; height: 25px; border: 0px;"></div>

        <!-- Blog Post -->
        <div class="card mb-4">
          <div class= "card-deck" > 
            <div class= "card" >
              <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato1['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
              <div class= "card-body" > 
              <?php 
                print"<h5 class= \"card-title\" > $dato1[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato1[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato1[Id]'\" > Leer mas... </button>";
              ?> 
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato1[Autor] </small>"; ?> 
            </div> 
          </div>
          <div class= "card"> 
            <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato2['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" >
            <?php 
                print"<h5 class= \"card-title\" > $dato2[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato2[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato2[Id]'\" > Leer mas... </button>";
            ?> 
            </div> 
              <div class= "card-footer" >
                <?php print"<small class= \"text-muted\" > $dato2[Autor] </small>"; ?> 
              </div>
          </div>      
          <div class= "card" > 
            <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato3['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" > <?php 
                print"<h5 class= \"card-title\" > $dato3[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato3[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato3[Id]'\" > Leer mas... </button>";
              ?> 
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato3[Autor] </small>"; ?>  
            </div>
          </div>
        </div>
        <!-- Blog Post -->
        <div class="card mb-4">
          <div class= "card-deck" > <div class= "card" >
           <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato4['Imagen'])."\" >"; ?>
            <div class= "card-body" > 
              <?php 
                print"<h5 class= \"card-title\" > $dato4[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato4[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato4[Id]'\" > Leer mas... </button>";?> 
            </div>  
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato4[Autor] </small>"; ?>  
            </div> 
          </div>
          <div class= "card"> 
            <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato5['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" >
             <?php 
                print"<h5 class= \"card-title\" > $dato5[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato5[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato5[Id]'\" > Leer mas... </button>";?>  
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato5[Autor] </small>"; ?>  
            </div>
          </div> 
          <div class= "card" > 
            <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato6['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" > 
              <?php 
                print"<h5 class= \"card-title\" > $dato6[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato6[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato6[Id]'\" > Leer mas... </button>";?> 
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato6[Autor] </small>"; ?>   
            </div>
          </div>
        </div>
        <!-- Blog Post -->
        <div class="card mb-4">
          <div class= "card-deck" > <div class= "card" >
           <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato7['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" > 
              <?php 
                print"<h5 class= \"card-title\" > $dato7[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato7[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato7[Id]'\" > Leer mas... </button>";?> 
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato7[Autor] </small>"; ?>   
            </div> 
          </div>
          <div class= "card"> 
            <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato8['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" > 
              <?php 
                print"<h5 class= \"card-title\" > $dato8[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato8[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato8[Id]'\" > Leer mas... </button>";?>  
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato8[Autor] </small>"; ?>   
            </div>
          </div>   
          <div class= "card" > 
            <?php print"<img class= \"img-thumbnail\" height=\"200px\" width=\"220px\" src=\"data:image/png;base64,".base64_encode($dato9['Imagen'])."\" >"; ?> <!-- Redefinir tamaño de imagenes -->
            <div class= "card-body" >
             <?php 
                print"<h5 class= \"card-title\" > $dato9[Titulo] </h5>";
                print"<p class= \"card-text\" > $dato9[Descripcion] </p>";
                print"<button type= \"button\" class= \"btn btn-secondary\" onclick=\"location.href='noticiaC.php?id=$dato9[Id]'\" > Leer mas... </button>";?> 
            </div> 
            <div class= "card-footer" >
              <?php print"<small class= \"text-muted\" > $dato9[Autor] </small>"; ?> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  </div>
      <div class="col-md-4">
            <!-- Search Widget -->
            <div class="card my-4">
              <h5 class="card-header">Últimas</h5>
              <div class="card-body">
                <div class="input-group">
                  <a>ÚLTIMAS</a>
                </div>
              </div>
            </div>
            <!-- Side Widget -->
        <?php
            $db = conectaDB();
            $tabla = "Noticias";
            $cont=0;
            
            $consulta= "SELECT * FROM $tabla ORDER BY Fecha DESC";
            $result = $db->query($consulta);
            if($result!=null){
                foreach($result as $valor){
                    if($valor['Categoria']=="Espectaculos"){
                        if($cont==0){$dato1=$valor; $cont=$cont+1;}
                        else{
                            if($cont==1){$dato2=$valor; $cont=$cont+1;}
                            else{
                                if($cont==2){$dato3=$valor; $cont=$cont+1;}
                                else{
                                    if($cont==3){$dato4=$valor; $cont=$cont+1;}
                                    else{
                                        if($cont==4){$dato5=$valor; $cont=$cont+1;}
                                        else{
                                            if($cont==5){$dato6=$valor; $cont=$cont+1;}
                                            else{
                                                if($cont==6){$dato7=$valor; $cont=$cont+1;}
                                                else{
                                                    if($cont==7){$dato8=$valor; $cont=$cont+1;}
                                                    else{
                                                        if($cont==8){$dato9=$valor; $cont=$cont+1;}
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }else{
                print"<p> Error al realizar la consulta </p>";
            }
        ?>

            <div class="card my-4">
              <?php 
                print"<h9 class=\"card-header\">$dato1[Fecha]</h9>";
                print"<div class=\"card-body\">";
                print"<p class=\"font-italic\">$dato1[Titulo].</p>";
                print"</div>";
              ?>  
            </div>

            <div class="card my-4">
              <?php 
                print"<h9 class=\"card-header\">$dato2[Fecha]</h9>";
                print"<div class=\"card-body\">";
                print"<p class=\"font-italic\">$dato2[Titulo].</p>";
                print"</div>";
              ?>
            </div>


            <div class="card my-4">
              <?php 
                print"<h9 class=\"card-header\">$dato3[Fecha]</h9>";
                print"<div class=\"card-body\">";
                print"<p class=\"font-italic\">$dato3[Titulo].</p>";
                print"</div>";
              ?>
            </div>

            <div class="card my-4">
              <?php 
                print"<h9 class=\"card-header\">$dato4[Fecha]</h9>";
                print"<div class=\"card-body\">";
                print"<p class=\"font-italic\">$dato4[Titulo].</p>";
                print"</div>";
              ?>
            </div>

            <div class="card my-4">
              <?php 
                print"<h9 class=\"card-header\">$dato5[Fecha]</h9>";
                print"<div class=\"card-body\">";
                print"<p class=\"font-italic\">$dato5[Titulo].</p>";
                print"</div>";
              ?>
            </div>

            <div class="card my-4">
              <?php 
                print"<h9 class=\"card-header\">$dato6[Fecha]</h9>";
                print"<div class=\"card-body\">";
                print"<p class=\"font-italic\">$dato6[Titulo].</p>";
                print"</div>";
              ?>
            </div>

            <div class="card my-4">
                <div class="card-body">
                  <img src="anuncio4.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                </div>
            </div>

            <div class="card my-4">
                <div class="card-body">
                  <img src="anuncio2.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                </div>
            </div>

                <div class="card my-4">
                <div class="card-body">
                  <img src="anuncio3.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                </div>
            </div>


        </div>

    </div>
      <!-- /.row -->
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>