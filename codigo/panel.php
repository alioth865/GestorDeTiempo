<?php
/**
 * Description of panel.php
 * 
 * Controla que el usuario vaya
 * al panel correspondiente
 * dependiendo de que tipo sea
 * 1 - administrador
 * 2 - usuario
 *
 * @author Raúl
 */

//Idioma
require('language.php'); 

$lang = $_GET['lang'];
if ( isset($_GET['lang']) ){
	$lang = $_GET['lang'];
}

//Abrimos la sesión para poder acceder a las variables del usuario
session_start();

$tipo=$_SESSION["tipousuario "];
//Comprobamos que el usuario es el adecuado, y en caso contrario deslogueamos al gracioso que intenta acceder a la página que no es suya.
if ($tipo == 1) {
    header("Location:panel_administrador.php?lang=$lang");
}else{
	header("Location:panel_usuario.php?lang=$lang");
}


?>