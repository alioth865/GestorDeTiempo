<div id="gestion_usuarios">
    <table width="745">
        <tr>
            <th>e-mail</th>
            <th width="400">Nombre y Apellidos</th>		
            <th width="20">&nbsp;&nbsp;&nbsp;</th>
        </tr>

        <?php
        include_once "clases/sistema.php";
        //Se almacena una lista de todos los usuarios del sistema
        $users = Sistema::listarUsuarios();

        foreach ($users as $usuario) {
            //Por cada uno de los usuarios del sistema imprime la linea de una tabla.
            echo "<tr>"
            . "<td>$usuario->correo</td>"
            . "<td>$usuario->nombre $usuario->primerApellido $usuario->segundoApellido</td>"
            . "<td id='boton_editar'>";
            ?>

            <a href='borrarusuariocontrolador.php/?correo=<?php echo $usuario->correo; ?>'><img src='images/delete.png' /></a>
            <?php
            echo "</td></tr>";
        }
        ?>


    </table>
    <a id="terminar" href="panel_administrador.php"> <button >Terminar</button></a>
</div>