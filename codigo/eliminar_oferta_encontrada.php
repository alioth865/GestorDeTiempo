<!doctype html>
<html lang="en">

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
        session_start();
        include_once("./clases/Includephp.php");

	if(isset($_GET['ismail'])){
		$ismail = $_GET['ismail'];
	}else{
		$ismail = 3;
	}
	
	if(isset($_GET['valor'])){
		$valor = $_GET['valor'];
	}
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
                <h1 class="site_title"><?php echo __('Remove offer', $lang) ?></h1>
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
                    <a class="current"><?php echo __('Remove offer', $lang) ?></a>
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

              <!--  <li class="icn_eliminar_oferta"><a href ="#"><?php echo __('Remove', $lang) ?></a></li>		-fin opciones-->	

                <li class="icn_jump_back"><a href ="javascript:history.back()"><?php echo __('Back', $lang) ?></a></li>

                <li class="icn_salir"><a href ="salir.php?lang=<?php echo $lang; ?>"><?php echo __('Exit', $lang) ?></a></li>

             <!--   <li class="icono_gb"><a href="filtro.php?lang=en?filtro=<?php echo $valor; ?>">  Ingles</a></li>

                <li class="icono_es"><a href="filtro.php?lang=es">  Castellano</a></li>-->

            </ul><!--fin opciones-->


            <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">
            <article class="module width_full">
                <header><h3><?php echo __('Remove offer', $lang) ?></h3></header>
                <div class="module_content">
                    <!--tabla ofertas populares-->

                    <div style="display: block;" id="tab1" class="tab_content">
                        <table class="tablesorter" cellspacing="0"> 
                            <tbody> 
                                <!-- codigo php para crear una tabla-->

                                <tr>

                            <form action="filtro.php?lang=<?php echo $lang ?>" method="POST">
                                <td><input type="text" name="filtro" value="<?php echo __('Offerid', $lang).' '.__('or', $lang).' '.__('email', $lang) ?>" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"></td>
                                <td><input type="submit" value="<?php echo __('Filter', $lang) ?>" ></td>
                            </form>

                            </tr>
				<!-- aqui se empezara a comprobar segun lo que haya... -->
			<?php
				if($ismail != 3){
					if($ismail == 1 ){
						$ofertas = Controlador::listarMisOfertas($valor);
						if(count($ofertas) != 0 ){
							foreach($ofertas as $oferta){
					?>
						<tr>
				                <td><?php echo $oferta['nombreoferta'] ?></td>
                                <td><input type="button" name="eliminar" value="<?php echo __('Remove', $lang) ?>" onClick="window.location.href='borrar_oferta_encontrada_controlador.php?lang=<?php echo $lang ?>&id=<?php echo $oferta['idoferta']  ?>&valor=<?php $valor ?>&ismail=<?php echo $ismail?>'"></td>
                            			</tr>
					<?php
							}//cierre foreach
						}//cierre ifcount
					}else{
						/*recibimos el id de una oferta*/
						$oferta = Controlador::SeleccionarOferta($valor); ?>
						<?php if($oferta != NULL){ ?>
						<tr>
				                <td><?php echo $oferta->getnombreoferta() ?></td>
				                <td><input type="button" name="eliminar" value="<?php echo __('Remove', $lang) ?>" onClick="window.location.href='borrar_oferta_encontrada_controlador.php?lang=<?php echo $lang ?>&id=<?php echo $oferta->getIdOferta() ?>&valor=<?php $valor ?>&ismail=<?php echo $ismail?>'"></td>
                            			</tr>
					<?php }//cierre if($oferta != 0)
					else{ ?> <tr><td><h4>No hay ofertas con el id: <?php echo $valor ?></h4></td><td></td></tr><?php }
					}
			?>

			<?php }//cierre if ?>
			<!-- fIN DE COMPROBACIONES. -->
                            </tbody> 
                        </table>
                    </div><!-- fin de la tabla ofertas populares -->

            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>

</html>
