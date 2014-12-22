<?php

include_once "clases/tarea.php";

//Abre la sesión de usuario para acceder a los datos de la misma
session_start();

//En la tarea que está actualmente en memoria de sesión, pone el atributo terminado = 1
$_SESSION["objTar"]->setTerminada(1);
//Trae la tarea que está en la sesión a una variable
$tarea = $_SESSION["arrayTar"];

//Almacena la ruta donde se guardara el archivo subido
$target_dir = "./files/" . $_FILES['fichero']['name'];
$uploadOk = 1;

//Si el fichero existe tira un mensaje de error
if (file_exists($target_dir . $_FILES["fichero"]["name"])) {
    echo "El fichero ya existe.";
    $uploadOk = 0;
}


//Si algo ha ido mal muestra un mensaje de error
if ($uploadOk == 0) {
    echo "Ha habido un error y su fichero no ha sido subido. Inténtelo de nuevo.";
} else {
//En caso contrario, mueve el fichero temporal de memoria al directorio y nombre arriba indicados.
    //Para terminar emite un mensaje de confirmación.

    if (move_uploaded_file($_FILES["fichero"]["tmp_name"], $target_dir)) {
        echo "El fichero " . basename($_FILES["fichero"]["name"]) . " ha sido subido.";
    } else {
        echo "Ha habido un problema al subir su fichero. Inténtelo de nuevo.";
    }
}
//Almacena la información del fichero subido a la base de datos.
Sistema::subirArchivo($target_dir, $tarea["codtar"], $_FILES["fichero"]["name"], $_SESSION["objUsu"]->correo);
//Finaliza la tarea en los sitios pertinentes en la base de datos.
Sistema::finalizarTarea($_SESSION['objUsu'], $_SESSION["objTar"], $_SESSION["objTar"]->horasAsignadas);


//Devuelve el usuario a us panel por defecto (Lista de tareas).
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