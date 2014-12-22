<div id="creatarea_formulario"><form action="creartareacontrolador.php" >
        <div id="creatarea_nombre">Nombre:</div> <div id="creatarea_nombreform"><input type="text" name="nmb_tarea" placeholder="Introduzca un nombre" /></div><br/>
        <div id="creatarea_desc"> Descripción: </div><div id="creatarea_prioridad" >Prioridad: </div><div id="creatarea_proridadform"><input name="prioridad" type="number"/></div><br/>
        <div id="creatarea_descform"><input type="text" name="descripcion" placeholder="Introduce la descripción aquí" /></div><br/>
        <div id="creatarea_fecha">Fecha Fin: </div> <div id="creatarea_fechaform"><input type="date" name="fecha" /></div><div id="creatarea_horas">Horas:</div><div id="creatarea_horasform"><input type="text" maxlength="3" name="horas" placeholder="0"/> </div><br/>
        <div id="creatarea_user">Usuarios:</div><div id="creatarea_buscar">Buscar:</div><div id="creatarea_buscarform"><input type="text" placeholder="Busca aquí" name="busqueda" /></div><br/>
        <div id="creatarea_userform">
            <table id="creatarea_tabla">
                <tr>
                    <th>&nbsp;</th>   
                    <th>Información</th>
                </tr>

                <?php
                include_once "clases/sistema.php";
                //Recibe un array con todos los usuarios del sistema en forma de objetos Usuario
                $users = Sistema::listarUsuarios();

                //Para cada usuario de dicha lista, lo imprime como fila de una tabla en pantalla.
                foreach ($users as $usuario) {
                    echo "<tr>"
                    . "<td><input type='radio' name='usuario' value='$usuario->correo' /></td>"
                    . "<td>$usuario->nombre</td>"
                    . "</tr>";
                }
                ?>
            </table>
        </div><br/>

        <div id="creatarea_boton"><input type="submit" name="creartarea" value="Crear Tarea"/></div>

    </form>
</div>