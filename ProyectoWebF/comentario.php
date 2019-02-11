<?php
require_once "Biblioteca.php";
$db = conectaDB();
$dbTabla="Comentarios";

$id=$_GET['id'];
$comentario=$_POST['comentario'];
$consulta = "INSERT INTO $dbTabla (comentario,NoticiaId) VALUES('$comentario','$id')";
$result = $db->query($consulta);
if($result){
	header('Location: noticiaC.php?id='.$id);     
}
else{
	print " <p>Error</p>\n";
}
$db=null;
?>