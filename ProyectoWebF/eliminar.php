<?php
require_once "Biblioteca.php";
$db = conectaDB();
$dbTabla="Comentarios";

$id=$_POST['id'];
$consulta = "DELETE FROM $dbTabla WHERE NoticiaId=".$id;
$result = $db->query($consulta);
if($result){
  header('Location: eliminar1.php?variable='.$id);
}
else{
	print " <p>Error al eliminar la noticia</p>\n";
}

$db=null;
?>