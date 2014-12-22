<?php

include_once "clases/tarea.php";

//Abre la sesión para acceder a las variables.
session_start();
//Marca forzosamente como terminada una tarea. El método admite un objeto tarea, y como no nos interesa cambiar nada más, solo cambiamos uno de sus atributos
Sistema::terminarTarea(new Tarea("", "", "", "", "", "", "", "", $_REQUEST["codtar"]));


//Envia el usuario a su panel por defecto (Listar tareas).
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