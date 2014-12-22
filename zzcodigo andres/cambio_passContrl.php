<?php

include_once("clases.php");

//Abre la sesión de usuario para que las variables sean accesibles
session_start();

//Se recogen las variables del formulario anterior
$pass_1 = $_REQUEST["pwdActual"];
$pass_2 = $_REQUEST["pwdNueva"];
$pass_3 = $_REQUEST["pwdNuevaRepe"];


//Solo se hace una lógica de cambio de contraseña si las dos contraseñas introducidas como nuevas son correctas
if ($pass_2 == $pass_3) {
    //Recoge todos los usuarios y coge informacion del actual.
    $u_list = Sistema::listarUsuarios();
    foreach ($u_list as $u_act) {
        if ($u_act->correo == $_SESSION["correo"]) {
            $ses_us = $u_act;
            break;
        }
    }
    
    //Si la contraseña introducida es coincidente con la que tiene actualmente, permite cambiar la contraseña
    if ($ses_us->contrasena == $pass_1) {
        $ses_us->contrasena = $pass_2;
        //Modifica el usuario cambiando la contraseña antigua por la nueva contraseña.
        $modSuccess = Sistema::modificarUsuario($ses_us);
        
        //Si la modificación se ha realizado correctamente envia al usuario a su panel.
        if ($modSuccess) {
            $_SESSION["lastAction"] = "cambiarContrasena_correcto";

            if ($_SESSION["codigoTipoUsuario"] == 0) {
                header("Location: panel_administrador.php");
            } else {
                header("Location: panel_usuario.php");
            }

            exit(0);
        } else {
            //Si la modificación no se ha realizado correctamente envia al usuario a un error.
            header("Location: cambiarContrasena_incorrecto.php");
            exit(0);
        }
    } else {

        header("Location: cambiarContrasena_incorrecto.php");
        exit(0);
    }
} else {

    header("Location: cambiarContrasena_incorrecto.php");
    exit(0);
}
?>

