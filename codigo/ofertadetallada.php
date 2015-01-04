
<!doctype html>
<html lang="en">

    <?php
    include_once("./clases/Includephp.php");
    session_start();
    if (!isset($_SESSION["objUsu"])) {
        header('Location: index.php?lang=' . $_POST["lang"]);
    }
    $idoferta = $_GET['idoferta'];
    $oferta = Controlador::SeleccionarOferta($idoferta);
    ?>


    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
        <title>Panel de Busqueda | Gestor de tiempo</title>

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
        //Idioma
        require('language.php');
        $lang = $_GET['lang'];


        if (isset($_GET['lang'])) {
            $lang = $_GET['lang'];
        }
        $nom = $_SESSION['email'];
        $lcat = Controlador::ListarCategoria();
        //$email1 = $_GET['email'];
        //$oferta=Controlador::listarMisOfertas($email1);
        ?>

        <header id="header">
            <hgroup>
                <h1 class="site_title"><?php echo __('Offer details', $lang) ?></h1>
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
                    <a class="current"><?php echo __('Search Panel', $lang) ?></a>
                    <div class="breadcrumb_divider"></div>
                    <a class="current"><?php echo __('Offer details', $lang) ?></a>
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

                <li class="icono_gb"><a href="ofertadetallada.php?lang=en&idoferta=<?php echo $_GET['idoferta']; ?>">  Ingles</a></li>
                <li class="icono_es"><a href="ofertadetallada.php?lang=es&idoferta=<?php echo $_GET['idoferta']; ?>">  Castellano</a></li>
            </ul><!--fin opciones-->


            <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>

            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">

            <article class="module width_full">
                <header><h3><?php
                        echo __('Offer Name', $lang) . ': ';
                        echo $oferta->getnombreoferta()
                        ?></h3></header>
                <div class="module_content">
                    <!--tabla ofertas populares-->

                    <div style="display: block;" id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <tbody> 
                                <tr>
                                    <td><?php echo __('<b>Start time</b>', $lang) ?></td>
                                    <td><?php echo $oferta->getHorarioInicio() ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo __('<b>Finish time</b>', $lang) ?></td>
                                    <td><?php echo $oferta->getHorarioFin() ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo __('<b>Description</b>', $lang) ?></td>
                                    <td><?php echo $oferta->getDescripcion() ?></td>
                                </tr>
                                <tr>
                                    <td><?php echo __('Rate', $lang) ?></td>
                                    <td><?php echo $oferta->getValoracion() ?></td>
                                </tr>
                                <tr>
                                    <td><input type="button" name="oferta" value="<?php echo __('Offers', $lang) ?>" onclick="window.location.href = 'ofertasqueofrezco.php?lang=<?php echo $lang; ?>&idoferta=<?php echo $_GET['idoferta']; ?>'"></td>
                                </tr>
                                <tr>
                                    <?php
                                    $idofertasintercambio = "";
                                    if (isset($_GET['ofertassel'])) {
                                        $cont = 0;
                                        $tama�o = count($_GET['ofertassel']);
                                        foreach ($_GET['ofertassel'] as $temp) {
                                            if ($cont + 1 == $tama�o) {
                                                $idofertasintercambio = $idofertasintercambio . $temp;
                                            } else {
                                                $idofertasintercambio = $idofertasintercambio . $temp . "|";
                                            }
                                            $cont++;
                                        }
                                    }
                                    ?>
                                    <td><input type="button" name="Realizar" value="<?php echo __('Do it', $lang) ?>" onclick="window.location.href = 'PHPrealizarDemanda.php?idoferta=<?php echo $_GET['idoferta']; ?>&ofertassel=<?php echo $idofertasintercambio; ?>&lang=<?php echo $lang; ?>'"></td>
                                    <td><input type="button" name="Volver" value="<?php echo __('Back', $lang) ?>" onclick=""></td>
                                </tr>

                            </tbody> 
                        </table>
                    </div><!-- fin de la tabla ofertas populares -->

            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>

</html>