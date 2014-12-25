<?php

include_once ("./clases/Includephp.php");
session_start();
if (!isset($_SESSION["objUsu"])) {
    header('Location: index.php?lang=$lang');
}
//Crear demanada satisfecha del demandate
$idofertante = $_POST["idofertaofertante"];
$emaildemandante = $_POST["emaildemandante"];

Controlador::crearDemandaSatisfecha($emaildemandante, $idofertante, "0", "NULL", "CURDATE( )", "NULL");
//Crear notificacion
Controlador::crearNotificacion($emaildemandante, "NULL", $idofertante, 1);
//Crear demandas satisfecha del ofertante
if (isset($_POST["idofertasaceptadas"])) {
    foreach ($_POST["idofertasaceptadas"] as $temp) {
        Controlador::crearDemandaSatisfecha($_SESSION["objUsu"]->getEmail(), $temp, "0", "NULL", "CURDATE( )", "NULL");
        //Crear notificacion
        Controlador::crearNotificacion($_SESSION["objUsu"]->getEmail(), "NULL", $temp, 1);
    }
}
//Eliminar la demanda
Controlador::eliminarDemanda($_POST["iddemanda"]);
header("Location: demanda.php?lang=" . $_POST["lang"]);




