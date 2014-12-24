<!doctype html>
<html lang="en">
    <?php
    session_start();
    include_once ("./clases/Includephp.php");
    if (!isset($_SESSION["objUsu"])) {
        header('Location: index.php?lang=$lang');
    }
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
        <title>Panel de Administrador | Gestor de tiempo</title>

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
        ?>
        <header id="header">
            <hgroup>
                <h1 class="site_title"><?php echo __('Management category', $lang) ?></h1>
                <h2 class="section_title"><?php echo __('Time Bank', $lang) ?></h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p>Nombre de Usuario</p>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs">
                    <a href="panel.php?lang=<?php echo $lang; ?>"><?php echo __('Index', $lang) ?></a>
                    <div class="breadcrumb_divider"></div>
                    <a class="current"><?php echo __('Management category', $lang) ?></a>
                </article>
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <form class="quick_search">
                <table>
                    <tr>
                        <td><input type="text" value="" onfocus="if (!this._haschanged) {
                                    this.value = '';
                                }

                                this._haschanged = true;"></td>
                        <td><select style="width:120%;" name="categoria">

                                <?php
                                $categorias = Controlador::ListarCategoria();
                                foreach ($categorias as $cat) {
                                    ?>
                                    <option value="<?php echo $cat["idcategoria"]; ?>"><?php echo $cat["nombrecategoria"]; ?> </option>
                                <?php } ?> 
                            </select></td>
                    </tr>
                </table>




            </form>
            <hr/>
            <h3><?php echo __('Options', $lang) ?></h3>
            <ul class="toggle"><!--Opciones-->

                <li class="icn_new_article"><a href ="agregar_categoria.php?lang=<?php echo $lang; ?>"><?php echo __('New', $lang) ?></a></li>

                <li class="icn_jump_back"><a href ="javascript:history.back()"><?php echo __('Back', $lang) ?></a></li>

                <li class="icn_salir"><a href ="salir.php?lang=<?php echo $lang; ?>"><?php echo __('Exit', $lang) ?></a></li>

                <li class="icono_gb"><a href="gestion_categoria.php?lang=en">  Ingles</a></li>
                <li class="icono_es"><a href="gestion_categoria.php?lang=es">  Castellano</a></li>

            </ul><!--fin opciones-->


            <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            <article class="module width_full">
                <header><h3><?php echo __('Management category', $lang) ?></h3></header>
                <div class="module_content">
                    <!--tabla ofertas populares-->

                    <div style="display: block;" id="tab1" class="tab_content">

                        <table class="tablesorter" cellspacing="0"> 
                            <tbody> 
                                <!-- codigo php para crear una tabla-->
                                <?php
                                $categorias = Controlador::ListarCategoria();
                                foreach ($categorias as $cat) {
                                    ?>
                                    <tr> 
                                        <td><?php echo $cat["nombrecategoria"]; ?> </td> 
                                        <td><input type="button" name="modificar" value="<?php echo __('Modify', $lang); ?>" onClick="window.location.href = 'modificar_categoria.php?lang=<?php echo $lang; ?>&idcategoria=<?php echo $cat["idcategoria"]; ?>'"></td> 
                                        <td>
                                            <form action="PHPeliminarcategoria.php" method="POST">
                                                <input type="hidden" name="lang" value="<?php echo $_GET['lang']; ?>" />
                                                <input type="hidden" name="idcategoria" value="<?php echo $cat['idcategoria']; ?>" />
                                                <input type="submit" name="eliminar" value="<?php echo __('Remove', $lang); ?>" onClick="return confirm('¿Esta seguro que desea borrar a esta categoria?')">
                                            </form>
                                        </td>

                                    </tr><?php
                                }
                                ?> 
                                <tr><td><input type="button" name="crear" value=<?php echo __('New', $lang) ?> onClick="window.location.href='agregar_categoria.php?lang=<?php echo $lang; ?>'"></td></tr>

                            </tbody> 
                        </table>
                    </div><!-- fin de la tabla ofertas populares -->

            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>

</html>
