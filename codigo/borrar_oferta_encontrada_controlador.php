<?php
$lang = $_GET['lang'];
$idoferta = $_GET['id'];
$valor = $_GET['valor'];
$ismail = $_GET['ismail'];
include_once("./clases/Includephp.php");
$eliminada = Controlador::eliminarOferta($idoferta);

if($eliminada == 1){
	header("Location:eliminar_oferta_encontrada.php?lang=".$lang."&valor=".$valor."&ismail=".$ismail);
}else{
	echo "ha ocurrido un error eliminando la notificacion";
}


?>
