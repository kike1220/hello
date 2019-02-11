<?php
require_once "Biblioteca.php";
$db = conectaDB();
$dbTabla="Noticias";
$band=0;
date_default_timezone_set("America/Mexico_City");

$id=$_POST['id'];
$categoria=$_POST['Categoria'];
$titulo=$_POST['titulo'];
$descripcion=$_POST['descripcion'];
$noticia=$_POST['noticia'];
$imagen=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$autor=$_POST['autor'];
$fecha= date("Y-m-d\ H:i:s");
$consulta= "UPDATE $dbTabla WHERE SET Categoria=$categoria, Titulo=$titulo, Descripcion=$descripcion, Noticia=$noticia, Imagen=$imagen, Autor=$autor, Fecha=$fecha WHERE Id=$id";
$result = $db->query($consulta);
if($result){
    print "<p>Se actualizo correctamente la noticia</p>\n";
    print "<h2><a href='menu.html'>Regresar al menu</a></h2>";
}
else{
	print " <p>Error al actualizar la noticia</p>\n";
}

$db=null;
?>