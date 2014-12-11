<?php

include_once("clases/controlador.php");
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
$login = Controlador::loguear($username, $password);

//Una vez se tiene un tipo de usuario en la variable $login, se decide que hacer según dicho contenido.
if ($login == 0 || $login == 1) {
    //crear sesión de usuario y redirigir al espacio de usuario
    session_start();
    //El correo ya lo tenemos del formulario de login, de modo que lo almacenamos ya
    $_SESSION["email"] = $_REQUEST["user"];

    //recoge todos los usuarios y coge informacion del actual.
    $u_list = Controlador::listarUsuarios();
    
    //Recorre la lista de todos los usuarios hasta encontrar el actual, para acceder luego a su información.
    foreach ($u_list as $u_act) {
        if ($u_act->email == $_SESSION["email"]) {
            $ses_us = $u_act;
            break;
        }
    }

    //Si al recorrer la lista de usuarios se encontro el objetivo (deberia ocurrir...)
    if (isset($ses_us)) {
        //Se establecen las variables de sesión.
        $_SESSION["tipousuario "] = $ses_us->tipousuario ;
        $_SESSION["nombre "] = $ses_us->nombre ;
        $_SESSION["telefono "] = $ses_us->telefono ;
        $_SESSION["horasdemandadas "] = $ses_us->horasdemandadas ;
        $objUsu = new Usuario($ses_us->email, $ses_us->tipousuario , $ses_us->nombre , $ses_us->telefono , $ses_us->contrasena , $ses_us->horasdemandadas, $ses_us->horasofertadas, $ses_us->valoracion));
        $_SESSION["objUsu"] = $objUsu;
        $_SESSION["lastAction"] = "nada";
        
        //Dependiendo del tipo de usuario, llevarlo a un lugar u otro
        if ($login == 0) {
            header("Location: panel_administrador.php");
        } else {
            header("Location: panel_usuario.php");
        }
    } else {
        header("Location: errora.php");
    }
} else {
    //alguno de los datos son incorrectos. enviar a pagina de error que vuelva al login.
    header("Location: error_aut.php");
}

?>