<?php
include_once("./clases/Includephp.php");
$id = $_GET['id'];
$lang = $_GET['lang'];
$link = "Location:ofertas.php?lang=";
$link.= $lang;
echo $id;
$eliminado = Controlador::eliminarOferta($id);
if($eliminado == 1){
	echo "Se ha borrado correctamente";
	header($link);
}else{
	echo "Ha ocurrido un error eliminando la Oferta";
}

?>