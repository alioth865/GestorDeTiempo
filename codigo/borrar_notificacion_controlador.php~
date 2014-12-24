<?php
include_once("./clases/Includephp.php");
$id = $_GET['id'];
$lang = $_GET['lang'];
$link = "Location:notificaciones.php?lang=";
$link.= $lang;
echo $id;
$eliminado = Controlador::eliminarNotificacion($id);
if($eliminado == 1){
	header($link);
}else{
	echo "Ha ocurrido un error eliminando la notificacion";
}

?>
