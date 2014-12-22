<?php

include_once("./clases/Includephp.php");


//Recoge la información del formulario del que procede

$nombre = $_REQUEST["user"];
$telefono = $_REQUEST["telefono"];
$email = $_REQUEST["mail"];
$contrasena = $_REQUEST["pwd"];
$contrasena_repetida = $_REQUEST["rpwd"];

//Si las contraseñas de verificación no son iguales muestra un error

if ($contrasena != $contrasena_repetida) {
    echo "Las contraseñas no coinciden" ;
} else {
					   
    $verificar = Controlador::registrarUsuario($email, $nombre, $contrasena, '00:00:00', '00:00:00', 0, $telefono);

//En caso de que todo esté bien se envia al usuario al login, en caso contrario se muestra un error

    if ($verificar == 1) {
        header("Location:index.php");
    } else {
        echo "<header><h1>ESE USUARIO YA EXISTE! </h1></header>";
    }
}
?>
