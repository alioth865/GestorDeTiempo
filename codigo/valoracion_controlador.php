<?php
include_once("./clases/Includephp.php");
session_start();
$valoracion = $_REQUEST['puntuacion'];
$opinion = $_REQUEST['opinion'];
$id = $_GET['id'];
$lang = ['lang'];
$link = "Location:historial.php?lang=";
$link .= $_GET['lang'];
$error = "Location:error_valoracion?lang=";
$error .= $_GET['lang'];
$historial = Controlador::listarHistorial($_SESSION['objUsu']->getEmail());
foreach ($historial as $demanda){
	if($demanda['iddemandasatisfecha'] == $id){
		$cubrir = Controlador::cubrirValoracion($demanda['idoferta'], $valoracion, $opinion, $demanda['email'], $id);
		if($cubrir == 1){
			header($link);
		}else{
			header($error);
		}//cierre ifelse
	}//cierre if
	
}//cierre foreach

?>
