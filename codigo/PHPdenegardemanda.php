<?php
include_once ("./clases/Includephp.php");
session_start();
if (!isset($_SESSION["objUsu"])) {
    header('Location: index.php?lang=$lang');
}
$emaildemandante = $_GET["emaildemandante"];

//Crear notificacion
$idofertante = $_GET["idofertante"];
Controlador::crearNotificacion($emaildemandante, "NULL", $idofertante, 0);
//Eliminar la demanda
Controlador::eliminarDemanda($_GET["iddemanda"]);
header("Location: demanda.php?lang=" . $_GET["lang"]);
