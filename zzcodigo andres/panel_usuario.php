<?php

//Abrimos la sesión para poder acceder a las variables del usuario
session_start();
//Comprobamos que el usuario es el adecuado, y en caso contrario deslogueamos al gracioso que intenta acceder a la página que no es suya.
if ($_SESSION["codigoTipoUsuario"] != 1) {
    header("Location:salir.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <title>Panel de usuario</title>
        <link rel="stylesheet" type="text/css" href="style/style_principal.css" />
        <script>
            function cambiarContenidoA(x) {
                //Cambia el contenido de la seccion principal de la pagina
                var file = new XMLHttpRequest();
                file.open('GET', x);
                file.onreadystatechange = function () {
                    document.getElementById("pagina").innerHTML = file.responseText;
                };
                file.send();
            }
        </script>
    </head>
    <body class=" ">
        <div id="cabecera" class="anim1" > 
            <p id="textocabecera" > Panel de Usuario </p>
        </div>

        <div id="lateral" class="anim2">
            <div id="contenidoLateral">
                <a href="#" onclick="cambiarContenidoA('lista_tareas.php')"> <p id="opcion">- Lista de tareas</p></a>
                <a href="#" onclick="cambiarContenidoA('cambio_pass.php')"> <p id="opcion">- Cambiar contraseña</p></a>
                <a href="salir.php"> <p id="opcion">- Salir</p></a>
            </div>
        </div>
        <img id="flechaintuitiva" alt="Flecha" class="anim4" src="images/flecha.png" />
        <div id="centro" class="anim3">
            <div id="contenido" >

                <?php
                //Página por defecto que se muestra al usuario
                if ($_SESSION["lastAction"] == "nada") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('lista_tareas.php');
                    </script>";
                }
                //Página que se muestra cuando ha cambiado correctamente la contraseña
                if ($_SESSION["lastAction"] == "cambiarContrasena_correcto") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('lista_tareas.php');
                    </script>";
                }
                //Página que se muestra cuando se ha cambiado incorrectamente la contraseña
                if ($_SESSION["lastAction"] == "cambiarContrasena_incorrecto") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('cambio_pass.php');
                    </script>";
                }
                //Página que se muestra cuando lo último que se ha hecho es pulsar ver la tarea.
                if ($_SESSION["lastAction"] == "vertarea") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('ver_tarea.php');
                    </script>";
                }
                ?>


                <div id="pagina">


                </div>
            </div>
        </div>
    </body>
</html>