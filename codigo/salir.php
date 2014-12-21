<?php

//Iniciamos la sesión del usuario
session_start();

//Pone todas las variables de la sesión a null 
session_unset(); 

//Elimina la sesión
session_destroy();

//Nos lleva al index de la página
header("Location: index.php");

?>