<?php
session_start();
include_once("./clases/Includephp.php");
$nom=$_SESSION['email'];
$nombre = $_REQUEST['nombre'];
$horainicio = $_REQUEST['horainicio'];
$horafin = $_REQUEST['horafin'];
$descripcion = $_REQUEST['descripcion'];
$categoria = $_REQUEST['categoria'];
$lang = $_GET['lang'];
$link = "Location:ofertas.php?lang=";
$link.= $lang;
$crear = Controlador::crearOferta($nombre,$horainicio,$horafin,$descripcion, $categoria, $nom); 
if($crear == 1){
	header($link);
}else{
	echo "Ha ocurrido un error al crear la Oferta";
}
?>