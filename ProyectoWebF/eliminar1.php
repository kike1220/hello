<?php
require_once "Biblioteca.php";
$db = conectaDB();
$dbTabla="Noticias";

$id=$_GET['variable'];
$consulta = "DELETE FROM $dbTabla WHERE Id=".$id;
$result = $db->query($consulta);
if($result){
    print"<p>Se elimino correctamente la noticia</p>";
    print"<a href=\"menu.html\">Regresar al menu</a>";
}
else{
	print " <p>Error al eliminar la noticia</p>\n";
}

$db=null;
?>