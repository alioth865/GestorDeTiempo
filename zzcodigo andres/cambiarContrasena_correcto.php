<?php

//Se informa al usuario del cambio de contraseña correcto y se reenvia a su espacio de usuario.
$_SESSION["lastAction"] = "cambiarContrasena_correcto";
echo "Se ha cambiado la contrase&ntilde;a correctamente. Volviendo al panel.";

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
