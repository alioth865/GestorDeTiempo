<?php

include_once("clases/usuario.php");
include_once("clases/sistema.php");

//Recoge la información del formulario del que procede
$nombre = $_REQUEST["nombreusuario"];
$email = $_REQUEST["email"];
$contrasena = $_REQUEST["pwd"];
$contrasena_repe = $_REQUEST["pwd_repe"];

//Si las contraseñas de verificación no son iguales muestra un error
if ($contrasena != $contrasena_repe) {
    header("Location:error_register.php");
} else {

    //En caso de que todo esté correcto se crea un nuevo usuario con la información facilitada
    $u_regi = new Usuario($email, $nombre, " ", " ", 1, " ", $contrasena);
//Se registra el usuario en el sistema
    $verify = Sistema::registrarse($u_regi);
//En caso de que todo esté bien se envia al usuario al login, en caso contrario se muestra un error
    if ($verify) {
        header("Location:index.php");
    } else {
        header("Location:error_register.php");
    }
}
?>