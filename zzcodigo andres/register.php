<html><head>
        <meta charset="UTF-8">
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="style/style_register.css">

    </head>
    <body class=" ">
        <div id="cabecera" class="anim1"> 
            <p id="textocabecera"> Registro </p>
        </div>
        <div id="centro" class="anim3">
            <div id="contenido">
                <div id="pagina">

                    <form action="register_controlador.php" method="POST">
					<br><div id="formulario">Nombre:<input type="text" name="nombreusuario"><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e-mail:<input type="text" name="email"><br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contraseña:<input type="text" name="pwd"><br>
					&nbsp;Repita contraseña:<input type="text" name="pwd_repe">
					</div>
					<div id="estilbtn"><br><input type="submit" name="btn" value="Aceptar">
					<input type="reset" name="btn2" value="Limpiar"></div>
					</form>
				</div>
            </div>
        </div>
    
</body></html>