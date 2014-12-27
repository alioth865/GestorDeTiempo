<!doctype html>

<html lang="en">
    <?php
    include_once ("./clases/Includephp.php");
    session_start();
    if (!isset($_SESSION["objUsu"])) {
        header('Location: index.php?lang=$lang');
    }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
        <title>Ver Demanda | Gestor de tiempo</title>

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
        ?>
        <header id="header">
            <hgroup>
                <h1 class="site_title"><?php echo __('See demand', $lang) ?></h1>
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
                    <a class="current"><?php echo __('My Demands', $lang) ?></a>
                    <div class="breadcrumb_divider"></div>
                    <a class="current"><?php echo __('See demand', $lang) ?></a>
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
                <li class="icono_gb"><a href="ver_demanda.php?lang=en&iddemanda=<?php echo $_GET["iddemanda"]; ?>&idoferta=<?php echo $_GET["idoferta"]; ?>">  Ingles</a></li>
                <li class="icono_es"><a href="ver_demanda.php?lang=es&iddemanda=<?php echo $_GET["iddemanda"]; ?>&idoferta=<?php echo $_GET["idoferta"]; ?>">  Castellano</a></li>

            </ul><!--fin opciones-->


            <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            <article class="module width_full">
                <header><h3><?php echo __('Demand', $lang); ?></h3></header>
                <div class="module_content">
                    <!--tabla -->
                    <?php
                    $demanda = Controlador::verDemandaEspecifica($_GET["iddemanda"]);
                    ?>
                    <form action="PHPaceptardemanda.php" method="POST">
                        <input type="hidden" name="idofertaofertante" value="<?php echo $_GET["idoferta"]; ?>"/>
                        <input type="hidden" name="emaildemandante" value="<?php echo $_GET["emaildemandante"]; ?>"/>
                        <input type="hidden" name="iddemanda" value="<?php echo $_GET["iddemanda"]; ?>"/>
                        <input type="hidden" name="lang" value="<?php echo $_GET["lang"]; ?>"/>
                        <h2 style='text-align: center'> <?php echo "DEMANDANTE: " . $demanda[$_GET["iddemanda"]]["nombre"]; ?> </h2><br/><br/><br/>
                        <?php
                        $ofertasparaintercambiar = $demanda[$_GET["iddemanda"]]["idofertasintercambio"];
                        if ($ofertasparaintercambiar != NULL)
                            echo "<h3 style='text-align: center'>" . __("You might be interested any of their offers", $lang) . "</h3>";
                        ?>    
                        <div style ="margin: 0em 15em 0em 15em">
                            <div style="display: block;" id="tab1" class="tab_content">
                                <table class="tablesorter" cellspacing="0"> 
                                    <tbody> 
                                        <!-- codigo php para crear una tabla-->
                                        <?php
                                        $ofertasparaintercambiar = $demanda[$_GET["iddemanda"]]["idofertasintercambio"];
                                        if ($ofertasparaintercambiar != NULL) {
                                            $arry = Controlador::verOfertasIntercambio($ofertasparaintercambiar);
                                            foreach ($arry as $temp) {
                                                ?>
                                                <tr> 
                                                    <td><?php echo $temp["nombreoferta"]; ?> </td> 
                                                    <td><?php echo $temp["descripcionoferta"] ?></td>
                                                    <td><input type="checkbox" name="idofertasaceptadas[]" value="<?php echo $temp["idoferta"] ?>"></a></td> 
                                                </tr><?php
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td><input type="submit" name="aceptar" value="<?php echo __('Accept', $lang) ?>" ></td>
                                            <td><input type="button" name="rechazar" value="<?php echo __('Reject', $lang) ?>" onClick="window.location.href = 'PHPdenegardemanda.php?lang=<?php echo $_GET["lang"]; ?>&iddemanda=<?php echo $_GET["iddemanda"] ?>&emaildemandante=<?php echo $_GET["emaildemandante"]; ?>&idofertante=<?php echo $_GET["idoferta"]; ?>'"></td>
                                        </tr>
                                    </tbody> 
                                </table>
                            </div><!-- fin de la tabla ofertas populares -->
                        </div>
                    </form>

                </div>

            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>
