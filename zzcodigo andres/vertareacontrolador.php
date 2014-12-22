<?php
include_once "clases/sistema.php";
//Recoge la variable necesaria pasada en la url
$codtar = $_REQUEST["codtar"];

//Inicia la sesión para que las variables sean accesibles.
session_start();

//Lista todas las tareas del sistema en las cuales está el usuario actual
$tareas = Sistema::listarTodasTareas($_SESSION["objUsu"]);

//Recorre todas las tareas antes descritas hasta encontrar la que tiene el codigo que buscansmo
foreach ($tareas as $lineatarea) {
    if ($lineatarea['codtar'] == $codtar) {
        $tareaamostrar = $lineatarea;
    }
}

//Se almacena la tarea a mostrar en la sesión y se indica que la ultima accion realizada es ver tarea
$_SESSION["arrayTar"] = $tareaamostrar;
$_SESSION["lastAction"] = "vertarea";


//Al volver al panel correspondiente para usuario o administrador, se mostrará el dialogo de ver tarea con el javascript.
if($_SESSION["codigoTipoUsuario"] == 1){
    header("Location: /maquetadoIU/panel_usuario.php");
}else{
    if($_SESSION["codigoTipoUsuario"] == 0){
        header("Location: /maquetadoIU/panel_administrador.php");
    }else{
        header("Location: /maquetadoIU/salir.php");
    }
}

?>