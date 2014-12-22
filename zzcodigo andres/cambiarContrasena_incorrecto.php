<?php

//Se notifica al usuario del cambio de contraseña incorrecto y se reenvia de nuevo al cambio de contraseña
$_SESSION["lastAction"] = "cambiarContrasena_incorrecto";
echo "Ha ocurrido un error en el cambio de contrase&ntilde;a. Volviendo al panel.";

if($_SESSION["codigoTipoUsuario"] == 1){
    header( "refresh:3;url=panel_usuario.php" );
}else{
    if($_SESSION["codigoTipoUsuario"] == 0){
        header( "refresh:3;url=panel_administrador.php" );
    }else{
        header( "refresh:3;url=panel_usuario.php" );
    }
}

exit(0);

?>
