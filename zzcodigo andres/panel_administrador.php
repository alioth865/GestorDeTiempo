<?php
session_start();
if ($_SESSION["codigoTipoUsuario"] != 0) {
    header("Location:salir.php");
}
?>

<html>
    <head>
        <meta charset="UTF-8" />
        <title>Panel de administrador</title>
        <link rel="stylesheet" type="text/css" href="style/style_principal.css" />
        <script>
            function cambiarContenidoA(x) {
                //Cambia el contenido de la página principal por un fichero dado
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
            <p id="textocabecera" > Panel de Administrador </p>
        </div>

        <div id="lateral" class="anim2">
            <div id="contenidoLateral">
                <a href="#" onclick="cambiarContenidoA('gestion_tareas.php')"> <p id="opcion">- Gestión de tareas</p></a>
                <a href="#" onclick="cambiarContenidoA('lista_tareas.php')"> <p id="opcion">- Lista de tareas</p></a>
                <a href="#" onclick="cambiarContenidoA('gestion_usuarios.php')"> <p id="opcion">- Gestión de usuarios</p></a>
                <a href="#" onclick="cambiarContenidoA('cambio_pass.php')"> <p id="opcion">- Cambiar contraseña</p></a>
                <a href="salir.php"> <p id="opcion">- Salir</p></a>
            </div>
        </div>
        <img id="flechaintuitiva" alt="Flecha" class="anim4" src="images/flecha.png" />
        <div id="centro" class="anim3">
            <div id="contenido" >
                <?php
                session_start();
                //Página que aparece por defecto
                if ($_SESSION["lastAction"] == "nada") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('lista_tareas.php');
                    </script>";
                }
                //Página que aparece al cambiar correctamente la contraseña
                if ($_SESSION["lastAction"] == "cambiarContrasena_correcto") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('lista_tareas.php');
                    </script>";
                }
                //Página que aparece al cambiar la contraseña incorrectamente
                if ($_SESSION["lastAction"] == "cambiarContrasena_incorrecto") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('cambio_pass.php');
                    </script>";
                }
                //Página que aparece al pulsar en los detalles de una tarea
                if ($_SESSION["lastAction"] == "vertarea") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('ver_tarea.php');
                    </script>";
                }
                //Página que aparece después de borrar un usuario.
                if ($_SESSION["lastAction"] == "borrarusuario") {
                    echo "<script type='text/javascript'>
                    cambiarContenidoA('gestion_usuarios.php');
                    </script>";
                }
                ?>



                <div id="pagina">


                </div>
            </div>
        </div>
    </body>
</html>