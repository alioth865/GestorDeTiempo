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
        $ofertas=$c->listarOferta("alioth865@yahoo.com")
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
            $usuario=new Usuario("mairupis@google.es", "2", "Maira", "983369631", "maira", 0, 0, 0);
            //echo $c->createUsuario($usuario);
        
        
        
        ?>
        <hr style="color: #0056b2;" />
        <?php
        echo 'LISTAR OFERTA POR CATEGORIA';
        $ofertas=$c->buscarOferta(1);
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
            $oferta=new Oferta("4", "4", "alioth865@yahoo.com","Limpio Coche", "18:00:00", "19:00:00", 0);
            //echo $c->crearOferta($oferta);
        
        
        
        ?>
        <hr style="color: #0056b2;" />
        <?php
          echo 'INSETAR DEMANDA FUNCIONA CODIGO COMENTADO';
            $demanda=new Demanda("4", "3","alioth865@yahoo.com", "3");
            //echo $c->crearDemanda($demanda);
        
        ?>
        
        <hr style="color: #0056b2;" />
        <?php
          echo 'INSETAR DEMANDA SATISFECHA FUNCIONA CODIGO COMENTADO';
            $historial=new Historial("alioth865@yahoo.com", "3","8", "muy buena","2014-07-12");
            echo $c->crearDemandaSatisfecha($historial);
        
        ?>
    </body>
</html>
