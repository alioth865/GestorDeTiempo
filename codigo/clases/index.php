<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title></title>
    </head>
    <body>
        <?php
        include_once("GestorBaseDatos.php");
        $c = new GestorBaseDatos();
        $categorias = $c->listarCategoria();
        echo 'LISTAR CATEGORIA';
        ?>
        <table width="745"  border=1>
            <tr>
                <th >ID</th>
                <th >Nombre</th>                
            </tr>
            <?php
            foreach ($categorias as $temp) {
                ?>  
                <tr>
                    <td><?php echo $temp["idcategoria"] ?></td>   
                    <td><?php echo $temp["nombrecategoria"] ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
        <hr style="color: #0056b2;" />
        <?php
        $c->actualizarCategoria(5, "Albañileria");
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo 'LISTAR OFERTA POR EMAIL';
        $ofertas = $c->listarOferta("alioth865@yahoo.com")
        ?>
        <table width="745"  border=1>
            <tr>
                <th >ID OFERTA</th>
                <th >ID CATEGORIA</th>  
                <th>Email</th>
                <th>Nombre oferta</th>
                <th>Horario inicio</th>
                <th>Horario fin</th>
                <th>Descripcion Oferta</th>
            </tr>
            <?php
            foreach ($ofertas as $temp) {
                ?>  
                <tr>
                    <td><?php echo $temp["idcategoria"] ?></td>   
                    <td><?php echo $temp["idoferta"] ?></td>   
                    <td><?php echo $temp["email"] ?></td>   
                    <td><?php echo $temp["nombreoferta"] ?></td>   
                    <td><?php echo $temp["horarioinicio"] ?></td>   
                    <td><?php echo $temp["horariofin"] ?></td>   
                    <td><?php echo $temp["descripcionoferta"] ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
        <hr style="color: #0056b2;" />
        <?php
        echo 'INSETAR USUARIO FUNCIONA CODIGO COMENTADO';
        $usuario = new Usuario("mairupis@google.es", "2", "Maira", "983369631", "maira", 0, 0, 0);
        //echo $c->createUsuario($usuario);
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo 'LISTAR OFERTA POR CATEGORIA';
        $ofertas = $c->buscarOferta(1);
        ?>
        <table width="745"  border=1>
            <tr>
                <th >ID OFERTA</th>
                <th >ID CATEGORIA</th>  
                <th>Email</th>
                <th>Nombre oferta</th>
                <th>Horario inicio</th>
                <th>Horario fin</th>
                <th>Descripcion Oferta</th>
            </tr>
            <?php
            foreach ($ofertas as $temp) {
                ?>  
                <tr>
                    <td><?php echo $temp["idcategoria"] ?></td>   
                    <td><?php echo $temp["idoferta"] ?></td>   
                    <td><?php echo $temp["email"] ?></td>   
                    <td><?php echo $temp["nombreoferta"] ?></td>   
                    <td><?php echo $temp["horarioinicio"] ?></td>   
                    <td><?php echo $temp["horariofin"] ?></td>   
                    <td><?php echo $temp["descripcionoferta"] ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
        <hr style="color: #0056b2;" />
        <?php
        echo 'INSETAR OFERTA FUNCIONA CODIGO COMENTADO';
        $oferta = new Oferta("4", "4", "alioth865@yahoo.com", "Limpio Coche", "18:00:00", "19:00:00", "Esta oferta es la polla", 0);
        //echo $c->crearOferta($oferta);
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo 'INSETAR DEMANDA FUNCIONA CODIGO COMENTADO';
        $demanda = new Demanda("4", "3", "alioth865@yahoo.com", "3");
        //echo $c->crearDemanda($demanda);
        ?>

        <hr style="color: #0056b2;" />
        <?php
        echo 'INSETAR DEMANDA SATISFECHA FUNCIONA CODIGO COMENTADO';
        $historial = new Historial("alioth865@yahoo.com", "3", "8", "muy buena", "2014-07-12",1);
        echo $c->crearDemandaSatisfecha($historial);
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo 'Listar Historial';
        $historial = $c->buscarHistorial("alioth865@yahoo.com");
        ?>
        <table width="745"  border=1>
            <tr>
                <th >valoracion</th>
                <th >descripcionvaloracion</th>  
                <th>email</th>
                <th>fecha</th>
                <th>idoferta</th>
            </tr>
            <?php
            foreach ($historial as $temp) {
                ?>  
                <tr>
                    <td><?php echo $temp["valoracion"] ?></td>   
                    <td><?php echo $temp["descripcionvaloracion"] ?></td>   
                    <td><?php echo $temp["email"] ?></td>   
                    <td><?php echo $temp["fecha"] ?></td>   
                    <td><?php echo $temp["idoferta"] ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
        <hr style="color: #0056b2;" />
        <?php
        echo "VALORACION FUNCIONANDO";
        //print $c->valoracion(3, 10, "El tio es la hostia", "alioth865@yahoo.com");
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo "VER PERFIL <br>";
        $usuario = $c->verPerfil("alioth865@yahoo.com");
        echo "nombre " . $usuario->getNombre() . "<br>";
        echo "email " . $usuario->getEmail() . "<br>";
        echo "Horas D " . $usuario->getHorasDemandadas() . "<br>";
        echo "Horas O " . $usuario->getHorasOfertadas() . "<br>";
        echo "Contraseña " . $usuario->getContraseña() . "<br>";
        echo "Telefono " . $usuario->getTelefono() . "<br>";
        echo "Tipousuario " . $usuario->getTipoUsuario() . "<br>";
        echo "Valorcion " . $usuario->getValoracion() . "<br>";
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo "VER HORAS OFERTADAS Y DEMANDADAS <br>";
        $array = $c->verEstadisticasHorasIntercambiadas("alioth865@yahoo.com");
        echo "Horas D " . $array[0] . "<br>";
        echo "Horas O " . $array[1] . "<br>";
        ?>
        <hr style="color: #0056b2;" />
        <?php
  /*      echo "SELECCIONAR OFERTA <br>";
        $oferta = $c->seleccionarOferta(1);
        echo "idoferta " . $oferta->getIdOferta() . "<br>";
        echo "idcategoria " . $oferta->getIdCategoria() . "<br>";
        echo "email " . $oferta->getEmail() . "<br>";
        echo "nombre oferta " . $oferta->getnombreoferta() . "<br>";
        echo "Hora I " . $oferta->getHorarioInicio() . "<br>";
        echo "Hora F " . $oferta->getHorarioFin() . "<br>";
        echo "Descripcion " . $oferta->getDescripcion() . "<br>";
        echo "Valoracion " . $oferta->getValoracion() . "<br>";
      */  ?>
        <hr style="color: #0056b2;" />
        <?php
        echo "VER ESTADISTICA DE VALORACION <br>";
        echo "VALORACION: " . $c->verEstadisticasValoracion("alioth865@yahoo.com") . "<br>";
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo "Actualizar Oferta <br>";
      //  $c->updateOfertaSeleccionada(89, "A", "A", "A", "A", "A");
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo "Modificar Perfil <br>";
        $c->modificarPerfil("alioth865@yahoo.com", "aliothsin865", "699699699", "JUAN PITO");
        Controlador::eliminarUsuario("pepito@yahoo.com");
        ?>
        
        <hr style="color: #0056b2;" />
        <?php
        echo 'BUSCAR UN OFERTA SIN ESPECIFICAR CATEGORIA';
        $ofertas = Controlador::buscarOfertaSegunPatron(NULL,"lim");
        ?>
        <table width="745"  border=1>
            <tr>
                <th >ID OFERTA</th>
                <th >ID CATEGORIA</th>  
                <th>Email</th>
                <th>Nombre oferta</th>
                <th>Horario inicio</th>
                <th>Horario fin</th>
                <th>Descripcion Oferta</th>
            </tr>
            <?php
            foreach ($ofertas as $temp) {
                ?>  
                <tr>
                    <td><?php echo $temp["idcategoria"] ?></td>   
                    <td><?php echo $temp["idoferta"] ?></td>   
                    <td><?php echo $temp["email"] ?></td>   
                    <td><?php echo $temp["nombreoferta"] ?></td>   
                    <td><?php echo $temp["horarioinicio"] ?></td>   
                    <td><?php echo $temp["horariofin"] ?></td>   
                    <td><?php echo $temp["descripcionoferta"] ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
        <hr style="color: #0056b2;" />
        <?php
        echo 'BUSCAR UN OFERTA ESPECIFICANDO CATEGORIA';
        $ofertas = Controlador::buscarOfertaSegunPatron("5","lim");
        ?>
        <table width="745"  border=1>
            <tr>
                <th >ID OFERTA</th>
                <th >ID CATEGORIA</th>  
                <th>Email</th>
                <th>Nombre oferta</th>
                <th>Horario inicio</th>
                <th>Horario fin</th>
                <th>Descripcion Oferta</th>
            </tr>
            <?php
            foreach ($ofertas as $temp) {
                ?>  
                <tr>
                    <td><?php echo $temp["idcategoria"] ?></td>   
                    <td><?php echo $temp["idoferta"] ?></td>   
                    <td><?php echo $temp["email"] ?></td>   
                    <td><?php echo $temp["nombreoferta"] ?></td>   
                    <td><?php echo $temp["horarioinicio"] ?></td>   
                    <td><?php echo $temp["horariofin"] ?></td>   
                    <td><?php echo $temp["descripcionoferta"] ?></td>   
                </tr>
                <?php
            }
            ?>
        </table>
        <hr style="color: #0056b2;" />

    </body>
</html>
