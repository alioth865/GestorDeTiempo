<?php
include_once("./clases/Includephp.php");
$id = $_GET['id'];
$nombre = $_REQUEST['nombre'];
$horainicio = $_REQUEST['horainicio'];
$horafin = $_REQUEST['horafin'];
$descripcion = $_REQUEST['descripcion'];
$categoria = $_REQUEST['categoria'];
$lang = $_GET['lang'];
$link = "Location:ofertas.php?lang=";
$link.= $lang;
$modificado = Controlador::ModificarOfertaSeleccionada($id, $nombre, $horainicio,$horafin,$descripcion, $categoria); 
if($modificado == 1){
	header($link);
}else{
	echo "Ha ocurrido un error modificando la Oferta";
}
?>