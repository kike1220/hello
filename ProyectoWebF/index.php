<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Noticias</title>

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
        <a class="navbar-brand" href="index.php">NEWS Noticias</a>
      </div>
    </div>

      <div class="col-md-4">
      <div class="container">
        <?php
            date_default_timezone_set("America/Mexico_City");
            $mes = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            if(date("l")=="Monday"){$day="Lunes";}
            else{
                if(date("l")=="Tuesday"){$day="Martes";}
                else{
                    if(date("l")=="Wednesday"){$day="Miercoles";}
                    else{
                        if(date("l")=="Thursday"){$day="Jueves";}
                        else{
                            if(date("l")=="Friday"){$day="Viernes";}
                            else{
                                if(date("l")=="Saturday"){$day="Sabado";}
                                else{
                                    if(date("l")=="Sunday"){$day="Domingo";}
                                }
                            }
                        }
                    }
                }
            }
            print "<p class=\"text-white\">Fecha: ".$day." ".date("d")." de ".$mes[date("m")-1]." de ".date("Y")."</p>";
        ?>
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
                  <a class="nav-link" href="#">INICIO
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

  <!-- Page Content -->

    <div class="container">

      <div class="row">
          <!-- Blog Entries Column -->
          <div class="col-md-8">
        
            <h1 class="my-4">Noticias
                <small>Las mas relevantes del día</small>
            </h1>

             <!-- Blog Post -->
            <div class="card mb-4">
                <?php
                      include("Biblioteca.php");
                    $db = conectaDB();
                    $bandD=0;$bandE=0;$bandP=0;
                    $cont=0;
                    $categoriaD="Deportes";$categoriaE="Espectaculos";$categoriaP="Politica";
                    $datoD;$datoE;$datoP;
                    $consulta = " SELECT * FROM Noticias ORDER BY Id DESC";
                    $result = $db->query($consulta);
                    if($result == null){
                        print "error";
                    }
                    else{
                        foreach($result as $valor){
                            if($categoriaD==$valor['Categoria'] && $bandD==0){
                                $datoD=$valor;
                                $bandD=1;
                            }
                            else{
                                if($categoriaE==$valor['Categoria'] && $bandE==0){
                                    $datoE=$valor;
                                    $bandE=1;
                                }
                                else{
                                    if($categoriaP==$valor['Categoria'] && $bandP==0){
                                        $datoP=$valor;
                                        $bandP=1;
                                    }
                                }
                            }
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
                                              }
                                          }
                                      }
                                  }
                              }
                        }
                        print"<img class=\"card-img-top\" src=\"data:image/png;base64,".base64_encode($datoD['Imagen'])."\" alt=\"Card image cap\">";
                     }
                     $db=null;
                    ?>
                <div class="card-body" >
                    <?php 
                        print"<h2 class=\"card-title\"> $datoD[Titulo] </h2>";
                        print"<p class\"card-text\"> $datoD[Descripcion] </p>";
                        print"<a href=\"noticiaC.php?id=$datoD[Id]\" class=\"btn btn-primary\">Mostrar más &rarr;</a>";
                    ?>
                </div>
                <div class="card-footer text-muted">
                    <?php print"$datoD[Fecha] by $datoD[Autor]"; ?>
                </div>
            </div>


            <div class="card mb-4">
                <?php print"<img class=\"card-img-top\" src=\"data:image/png;base64,".base64_encode($datoE['Imagen'])."\" alt=\"Card image cap\">"; ?>
                <div class="card-body">
                  <?php 
                        print"<h2 class=\"card-title\"> $datoE[Titulo] </h2>";
                        print"<p class\"card-text\"> $datoE[Descripcion] </p>";
                        print"<a href=\"noticiaC.php?id=$datoE[Id]\" class=\"btn btn-primary\">Mostrar más &rarr;</a>";
                    ?>
                </div>
                <div class="card-footer text-muted">
                  <?php print"$datoE[Fecha] by $datoE[Autor]"; ?>
                </div>
            </div>

            <!-- Blog Post -->
            <div class="card mb-4">
                <?php print"<img class=\"card-img-top\" src=\"data:image/png;base64,".base64_encode($datoP['Imagen'])."\" alt=\"Card image cap\">"; ?>
                <div class="card-body">
                  <?php 
                        print"<h2 class=\"card-title\"> $datoP[Titulo] </h2>";
                        print"<p class\"card-text\"> $datoP[Descripcion] </p>";
                        print"<a href=\"noticiaC.php?id=$datoP[Id]\" class=\"btn btn-primary\">Mostrar más &rarr;</a>";
                    ?>
              </div>
                <div class="card-footer text-muted">
                  <?php print"$datoP[Fecha] by $datoP[Autor]"; ?>
                </div>
            </div>

            
            <!-- Pagination -->
            <ul class="pagination justify-content-center mb-4">
                <li class="page-item">
                  <a class="page-link" href="#">&larr; Older</a>
                </li>
                <li class="page-item disabled">
                  <a class="page-link" href="#">Newer &rarr;</a>
                </li>
            </ul>

          </div>

          <!-- Sidebar Widgets Column anuncios -->
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
            
            <div class="card my-4">
                <?php
                    print"<h9 class=\"card-header\">$dato1[Fecha]</h9>";
                    print"<div class=\"card-body\">";
                    print"<p class=\"font-italic\">$dato1[Titulo]</p>";
                    print"</div>";
                ?>
            </div>

            <div class="card my-4">
              <?php
                    print"<h9 class=\"card-header\">$dato2[Fecha]</h9>";
                    print"<div class=\"card-body\">";
                    print"<p class=\"font-italic\">$dato2[Titulo]</p>";
                    print"</div>";
                ?>
            </div>


            <div class="card my-4">
              <?php
                    print"<h9 class=\"card-header\">$dato3[Fecha]</h9>";
                    print"<div class=\"card-body\">";
                    print"<p class=\"font-italic\">$dato3[Titulo]</p>";
                    print"</div>";
                ?>
            </div>

            <div class="card my-4">
              <?php
                    print"<h9 class=\"card-header\">$dato4[Fecha]</h9>";
                    print"<div class=\"card-body\">";
                    print"<p class=\"font-italic\">$dato4[Titulo]</p>";
                    print"</div>";
                ?>
            </div>
            <div class="card my-4">
              <?php
                    print"<h9 class=\"card-header\">$dato5[Fecha]</h9>";
                    print"<div class=\"card-body\">";
                    print"<p class=\"font-italic\">$dato5[Titulo]</p>";
                    print"</div>";
                ?>
            </div>
            <div class="card my-4">
              <?php
                    print"<h9 class=\"card-header\">$dato6[Fecha]</h9>";
                    print"<div class=\"card-body\">";
                    print"<p class=\"font-italic\">$dato6[Titulo]</p>";
                    print"</div>";
                ?>
            </div>

            <div class="card my-4">
                <div class="card-body">
                  <img src="anuncio2.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                </div>
            </div>

            <div class="card my-4">
                <div class="card-body">
                  <img src="anuncio1.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
                </div>
            </div>

        </div>

    </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -333333333333333333333333333333333333333333333333333-->
    <footer class="py-5 bg-dark">
      <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript ---------------------------------------->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>