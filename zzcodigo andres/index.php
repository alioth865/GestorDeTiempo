<html>
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="style/style_login.css">
    </head>
    <body class=" ">
        <div id="cabecera" class="anim1"> 
            <p id="textocabecera"> Autentificación </p>
        </div>
        <div id="centro" class="anim3">
            <div id="contenido">
                <div id="pagina">
                    <form action="login.php" method="POST"><!-- Luego lo rellenamos con los parámetros e indicamos a donde se dirige-->
                        <br>
                        <div id="formulario">
                            e-mail:<input type="text" name="user"><br>
                            Contraseña:<input type="password" name="pwd">
                        </div>
                        <div id="recordar"><a href="error_olvidocontrasena.php">He olvidado mi contraseña</a></div> <!-- href para redirigirlo luego-->
                        <div id="estilbtn"><br><input type="submit" name="btn" value="Aceptar">
                            <a href="register.php"><input type="button" name="btn2" value="Registro"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>