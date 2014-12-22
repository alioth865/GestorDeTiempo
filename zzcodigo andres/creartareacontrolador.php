<?php 

include_once 'clases/tarea.php';
include_once 'clases/sistema.php';
include_once 'clases/usuario.php';

//Abre la sesión de usuario para acceder a los datos de la misma
session_start();

//Crea un nuevo objeto tarea destinado a ser insertado en la base de datos.
$toInsert = new Tarea($_REQUEST["nmb_tarea"], $_REQUEST["descripcion"], 0, $_REQUEST["prioridad"], "", $_REQUEST["fecha"], $_REQUEST["horas"], $_REQUEST["usuario"]);

//Inserta el objeto anterior en la base de datos.
Sistema::altaTarea($toInsert);


//Envia al usuario a su panel por defecto (lista de tareas).
$_SESSION['lastAction'] = "nada";

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