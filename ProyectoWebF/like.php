<?php
require_once "Biblioteca.php";
$db = conectaDB();
$dbTabla="Noticias";


$id=$_GET['id'];
$likes=$_GET['like'];
$likes=$likes+1;
$consulta = "UPDATE $dbTabla SET Likes=$likes WHERE Id=$id";
$result = $db->query($consulta);
if($result){
	header('Location: noticiaC.php?id='.$id);    
}
else{
	print " <p>Error</p>\n";
}

$db=null;
?>