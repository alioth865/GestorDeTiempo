<div id="lista_tareas">
    <table width="745">
        <tr>
            <th>Nombre</th>
            <th width="30">Prioridad</th>		
            <th width="20">Ver</th>
        </tr>

        <?php
        include_once("clases/sistema.php");
        include_once("clases/usuario.php");

        //Abre la sesión de usuario para que las variables sean accesibles
        session_start();
        
        //Listamos las tareas según el usuario que le pasemos
        $tareas = Sistema::listarTareas($_SESSION["objUsu"]);

        //Listamos una tarea por cada línea mostrando su nombre, su prioridad
        //y un botón "ver" para editar la tarea
        foreach ($tareas as $lineatarea) {
            if ($lineatarea["ter"] == 0) {
                ?>
                <tr>
                    <td><?php echo $lineatarea["nom"] ?></td>
                    <td><?php echo $lineatarea["pri"] ?></td>
                    <td id="boton_editar" ><a href='vertareacontrolador.php/?codtar=<?php echo $lineatarea["codtar"]; ?>'><img src='images/details.png' /></a></td>

                </tr>
                <?php
            }
        }
        ?>

    </table>

</div>