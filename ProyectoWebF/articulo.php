<?php
require_once "Biblioteca.php";
$db = conectaDB();
$dbTabla="Noticias";
$dbTabla2="comentarios";
date_default_timezone_set("America/Mexico_City");

$categoria=$_POST['Categoria'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$noticia=$_POST['noticia'];
$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$autor=$_POST['autor'];
$likes=0;
$fecha= date("Y-m-d\ H:i:s");
$consulta = "INSERT INTO $dbTabla (Categoria,Titulo,Descripcion,Noticia,Imagen,Autor,Fecha,Likes) VALUES('$categoria','$titulo','$descripcion','$noticia','$imagen','$autor','$fecha','$likes')";
$result = $db->query($consulta);
if($result){
    	print "<p>Se ingreso correctamente una nueva noticia</p>\n";
    	print "<h2><a href='menu.html'>Regresar al menu</a></h2>";    
}
else{
	print " <p>Error al ingresar a noticia</p>\n";
}

$db=null;
?>