<?php

include_once "clases/tarea.php";

//Elimina una tarea recibiendo un objeto tarea com parámetro que la referencie (Solo es necesario el codigo)
Sistema::bajaTarea(new Tarea("", "", "", "", "", "", "", "", $_REQUEST["codtar"]));


//Envia el usuario a su panel por defecto (Lista de tareas)
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
