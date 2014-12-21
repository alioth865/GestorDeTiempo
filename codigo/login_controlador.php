<?php

 
require('language.php'); 
/* CARGAMOS LENGUAGE */

if ( isset($_GET['lang']) ){
   $lang = $_GET['lang'];
}else {$lang="es";}


include_once("clases/Includephp.php");
//Almacena las variables del formulario del que ha venido.
$username = $_REQUEST["user"];
$password = $_REQUEST["pwd"];

//Verifica que los datos puedan ser correctos a priori
if (strlen($username) <= 0 || strlen($password) <= 0) {
    header("Location:index.php?lang=$lang");
    exit(0);
}

//El usuario inicia sesi贸n con sus credenciales.
$login = Controlador::loguear($username, $password);

//Una vez se tiene un tipo de usuario en la variable $login, se decide que hacer seg煤n dicho contenido.
if ($login == 1 || $login == 2) {
    //crear sesi贸n de usuario y redirigir al espacio de usuario
    session_start();
    //El correo ya lo tenemos del formulario de login, de modo que lo almacenamos ya
    $_SESSION["email"] = $_REQUEST["user"];

	
    //recoge todos los usuarios y coge informacion del actual.
    $u_list = Controlador::listarUsuarios();
    
    //Recorre la lista de todos los usuarios hasta encontrar el actual, para acceder luego a su informaci贸n.
    foreach ($u_list as $u_act) {
        if ($u_act->getEmail() == $_SESSION["email"]) {
            $ses_us = $u_act;
            break;
        }
    }

    //Si al recorrer la lista de usuarios se encontro el objetivo (deberia ocurrir...)
    if (isset($ses_us)) {
        //Se establecen las variables de sesi贸n.
        $_SESSION["tipousuario "] = $ses_us->getTipoUsuario() ;
        $_SESSION["nombre "] = $ses_us->getNombre() ;
        $_SESSION["telefono "] = $ses_us->getTelefono() ;
        $_SESSION["horasdemandadas "] = $ses_us->getHorasDemandadas() ;
        $objUsu = new Usuario($ses_us->getEmail(), $ses_us->getTipoUsuario() , $ses_us->getNombre() , $ses_us->getTelefono() , $ses_us->getContrase馻() , $ses_us->getHorasDemandadas(), $ses_us->getHorasOfertadas(), $ses_us->getValoracion());
        $_SESSION["objUsu"] = $objUsu;
        $_SESSION["lastAction"] = "nada";
        
        //Dependiendo del tipo de usuario, llevarlo a un lugar u otro
        if ($login == 1) {
            header("Location: panel_administrador.php?lang=$lang");
        } else {
            header("Location: panel_usuario.php?lang=$lang");
        }
    } else {
        header("Location: errora.php?lang=$lang");
    }
} else {
    //alguno de los datos son incorrectos. enviar a pagina de error que vuelva al login.
    header("Location: error_aut.php?lang=$lang");
}

?>