<p id="gestion_tareas_frase">Cree una <a href='#' onclick="cambiarContenidoA('crear_tarea.php')"><button>Nueva Tarea</button></a> o edite:</p>
<div id="gestion_tareas">
    <table width="745">
        <tr>
            <th width="400">Nombre</th>
            <th width="100">Usuario</th>
            <th width="500">Descripción</th>
            <th width="20">&nbsp;&nbsp;&nbsp;</th>
            <th width="20">&nbsp;&nbsp;&nbsp;</th>
            <th width="20">&nbsp;&nbsp;&nbsp;</th>
        </tr>
        <?php
        include_once("clases/sistema.php");
        include_once("clases/usuario.php");

        //Abre la sesión para acceder a sus datos
        session_start();

        //Recibe la lista de todas las tareas referenciadas por el usuario al que pertenecen
        $tareas = Sistema::listarTareasPorUsuario();
        //Por otro lado, como ayuda, se listan todas las tareas
        $filtrot = Sistema::listarTodasTareas();
        foreach ($tareas as $lineatarea) {
            //Entre todas las tareas que hay, imprime la fila de una tabla por cada una. Como las tareas listadas por usuario
            //no nos ofrecen información suficiente, usamos la lista de todas las tareas como apoyo.
            ?>
            <tr>
                <td><?php echo $filtrot[$lineatarea["codtar"]]['nom']; ?></td>
                <td><?php echo $lineatarea["nom"] ?></td>
                <td><?php echo $filtrot[$lineatarea["codtar"]]['des']; ?></td>
                <td id="boton_terminar" ><a href='finalizartarea_asadmin.php/?codtar=<?php echo $lineatarea["codtar"]; ?>'><img src='images/done.png' /></a></td>
                <td id="boton_editar" ><a href='vertareacontrolador.php/?codtar=<?php echo $lineatarea["codtar"]; ?>'><img src='images/details.png' /></a></td>

                <td id="boton_borrar" ><a href='eliminartareacontrolador.php/?codtar=<?php echo $lineatarea["codtar"]; ?>'><img src='images/delete.png' /></a></td>
            </tr>
            <?php
        }
        ?>
    </table>

</div>