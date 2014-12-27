<!doctype html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
        <title>Modificar Oferta | Gestor de tiempo</title>

        <link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
        <script src="js/hideshow.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="js/jquery.equalHeight.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $(".tablesorter").tablesorter();
            }
            );
            $(document).ready(function () {

                //When page loads...
                $(".tab_content").hide(); //Hide all content
                $("ul.tabs li:first").addClass("active").show(); //Activate first tab
                $(".tab_content:first").show(); //Show first tab content

                //On Click Event
                $("ul.tabs li").click(function () {

                    $("ul.tabs li").removeClass("active"); //Remove any "active" class
                    $(this).addClass("active"); //Add "active" class to selected tab
                    $(".tab_content").hide(); //Hide all tab content

                    var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
                    $(activeTab).fadeIn(); //Fade in the active ID content
                    return false;
                });

            });
        </script>
        <script type="text/javascript">
            $(function () {
                $('.column').equalHeight();
            });
        </script>

    </head>


    <body>
        <?php
        session_start();
        include_once("./clases/Includephp.php");
        $id = $_GET['id']; // Recibimos el id de la Oferta seleccionada
        //Idioma
        require('language.php');
        $lang = $_GET['lang'];
        if (isset($_GET['lang'])) {
            $lang = $_GET['lang'];
        }
        $nom = $_SESSION['email'];
        $lcat = Controlador::ListarCategoria();
        ?>
        <header id="header">
            <hgroup>
                <h1 class="site_title"><?php echo __('Offers View', $lang) ?></h1>
                <h2 class="section_title"><?php echo __('Time Bank', $lang) ?></h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p><?php echo $nom ?></p>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs">
                    <a href="panel.php?lang=<?php echo $lang; ?>"><?php echo __('Index', $lang) ?></a>
                    <div class="breadcrumb_divider"></div>
                    <a class="current"><?php echo __('Offers View', $lang) ?></a>
                </article>
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <form class="quick_search" method="POST" action="panelbusqueda.php?lang=<?php echo $lang; ?>" >
                <table>
                    <tr>
                        <td><input name="buscatext" type="text" value=""></td>
                        <td><select name="busqueda" style="width:60%;">
                                <option value="NULL"><?php echo __('Selects a category', $lang) ?></option>
                                <?php
                                foreach ($lcat as $lineacat) {
                                    ?>

                                    <option value="<?php echo $lineacat["idcategoria"] ?>"><?php echo $lineacat["nombrecategoria"] ?></option>

                                    <?php
                                }
                                ?>
                            </select></td>
                        <td><input type="submit" value="Enviar" name="enviar"> </td>
                    </tr>
                </table>										
            </form>
            <hr/>
            <h3><?php echo __('Options', $lang) ?></h3>
            <ul class="toggle"><!--Opciones-->


                <li class="icn_jump_back"><a href ="javascript:history.back()"><?php echo __('Back', $lang) ?></a></li>

                <li class="icn_salir"><a href ="salir.php?lang=<?php echo $lang; ?>"><?php echo __('Exit', $lang) ?></a></li>

                <li class="icono_gb"><a href="ver_oferta.php?lang=en&id=<?php echo $id ?>&idc=<?php echo $idcategoria ?>">  Ingles</a></li>
                <li class="icono_es"><a href="ver_oferta.php?lang=es&id=<?php echo $id ?>&idc=<?php echo $idcategoria ?>">  Castellano</a></li>

            </ul><!--fin opciones-->


            <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            <article class="module width_full">
                <header><h3><?php echo __('Offers View', $lang) ?></h3></header>
                <div class="module_content">
                    <!--tabla ofertas -->

                    <div style="display: block;" id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <tbody> 
                                <!-- codigo php para crear una tabla-->
<?php
$idoferta = $id;
$oferta = Controlador::SeleccionarOferta($id);
?>
                                <tr>
                                    <td><?php echo __('<b>Offer name</b>', $lang) ?></td>
                                    <td><?php echo $oferta->getnombreoferta(); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo __('<b>Start time</b>', $lang) ?><?php echo " " . $oferta->getHorarioInicio(); ?></td>
                                    <td><?php echo __('<b>Finish time</b>', $lang) ?><?php echo " " . $oferta->getHorarioFin(); ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo __('<b>Description</b>', $lang) ?>:</td>
                                    <td><?php echo $oferta->getDescripcion(); ?></td>
                                </tr>
                                <tr>
<?php
$categorias = Controlador::ListarCategoria();
foreach ($categorias as $categoria) {

    if ($categoria['idcategoria'] == $oferta->getIdCategoria()) {
        $idcategoria = $categoria['idcategoria'];
        $nombrecategoria = $categoria['nombrecategoria'];
        break;
    }
}
?>

                                    <td><?php echo __('<b>Category</b>', $lang) ?>:</td>
                                    <td><?php echo $nombrecategoria ?></td>


                                </tr>


                                <tr>
                                    <td><input type = "button" name="modificar" value = "<?php echo __('Modify', $lang) ?>"  onClick="window.location.href = 'modificar_oferta.php?lang=<?php echo $lang; ?>&id=<?php echo $idoferta ?>&n=<?php echo $nombrecategoria ?>&idc=<?php echo $idcategoria ?>'"></td>
                                </tr>

                            </tbody> 
                        </table>
                    </div><!-- fin de la tabla ofertas populares -->

            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>

</html>
