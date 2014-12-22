<?php

include_once("clases/sistema.php");
include_once("clases/usuario.php");

//Almacena las variables del formulario del que ha venido.
$username = $_REQUEST["user"];
$password = $_REQUEST["pwd"];

//Verifica que los datos puedan ser correctos a priori
if (strlen($username) <= 0 || strlen($password) <= 0) {
    header("Location:index.php");
    exit(0);
}

//El usuario inicia sesión con sus credenciales.
$login = Sistema::loguear($username, $password);

//Una vez se tiene un tipo de usuario en la variable $login, se decide que hacer según dicho contenido.
if ($login == 0 || $login == 1) {
    //crear sesión de usuario y redirigir al espacio de usuario
    session_start();
    //El correo ya lo tenemos del formulario de login, de modo que lo almacenamos ya
    $_SESSION["correo"] = $_REQUEST["user"];

    //recoge todos los usuarios y coge informacion del actual.
    $u_list = Sistema::listarUsuarios();
    
    //Recorre la lista de todos los usuarios hasta encontrar el actual, para acceder luego a su información.
    foreach ($u_list as $u_act) {
        if ($u_act->correo == $_SESSION["correo"]) {
            $ses_us = $u_act;
            break;
        }
    }

    //Si al recorrer la lista de usuarios se encontro el objetivo (deberia ocurrir...)
    if (isset($ses_us)) {
        //Se establecen las variables de sesión.
        $_SESSION["nombre"] = $ses_us->nombre;
        $_SESSION["primerApellido"] = $ses_us->primerApellido;
        $_SESSION["segundoApellido"] = $ses_us->segundoApellido;
        $_SESSION["codigoTipoUsuario"] = $ses_us->codigoTipoUsuario;
        $objUsu = new Usuario($ses_us->correo, $ses_us->nombre, $ses_us->primerApellido, $ses_us->segundoApellido, $ses_us->codigoTipoUsuario, $ses_us->respuestaSeguridad, $ses_us->contrasena);
        $_SESSION["objUsu"] = $objUsu;
        $_SESSION["lastAction"] = "nada";
        
        //Dependiendo del tipo de usuario, llevarlo a un lugar u otro
        if ($login == 0) {
            header("Location: panel_administrador.php");
        } else {
            header("Location: panel_usuario.php");
        }
    } else {
        header("Location: error_muytocho.php");
    }
} else {
    //alguno de los datos son incorrectos. enviar a pagina de error que vuelva al login.
    header("Location: error_auth.php");
}
?>

