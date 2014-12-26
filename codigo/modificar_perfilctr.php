<?php

include_once ("./clases/Includephp.php");
session_start();

if (!isset($_SESSION["objUsu"])) {
    header('Location: index.php?lang='.$_POST["lang"]);
}

$usuario = Controlador::verPerfil($_SESSION["objUsu"]->getEmail());
$email = $usuario->getEmail();
$modUs = Controlador::ModificarPerfil($email, $_POST['contrasena1'], $_POST['telefono'], $_POST['nombre']);
header("Location: perfil.php?lang=".$_POST["lang"]);



