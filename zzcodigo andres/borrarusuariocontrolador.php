<?php
include_once "clases/sistema.php";

//Abre la sesión para hacer accesible las varaibles de usuario.
session_start();

//Almacena el correo que se va a eliminar
$corToRemove = $_REQUEST["correo"];

//Borra un usuario basado en su codigo
Sistema::bajaUsuario($corToRemove);


//Vuelve a la página apropiada dependiendo del tipo de usuario
$_SESSION["lastAction"] = "borrarusuario";
if ($_SESSION["codigoTipoUsuario"] == 1) {
    header("Location: /maquetadoIU/panel_usuario.php");
} else {
    if ($_SESSION["codigoTipoUsuario"] == 0) {
        header("Location: /maquetadoIU/panel_administrador.php");
    } else {
        header("Location: /maquetadoIU/salir.php");
    }
}
?>