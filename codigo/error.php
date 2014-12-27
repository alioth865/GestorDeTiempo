<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8"/>
        <title>Dashboard I Admin Panel</title>

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

        <header id="header">
            <hgroup>
                <h1 class="site_title"><a href="index.php">Panel Usuario</a></h1>
                <h2 class="section_title">Banco de Horas</h2>
            </hgroup>
        </header> <!-- end of header bar -->

        <section id="secondary_bar">
            <div class="user">
                <p>Nombre de Usuario</p>
                <!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
            </div>
            <div class="breadcrumbs_container">
                <article class="breadcrumbs"><a href="index.html">Loggin</a> <div class="breadcrumb_divider"></div> <a class="current">Panel Usuario</a></article>
            </div>
        </section><!-- end of secondary bar -->

        <aside id="sidebar" class="column">
            <form class="quick_search">
                <input type="text" value="Quick Search" onfocus="if (!this._haschanged) {
                            this.value = ''
                        }
                        ;
                        this._haschanged = true;">
            </form>
            <hr/>
            <a href="misofertas.php"><h3>Mis Ofertas</h3></a>
            <ul class="toggle">
                <li class="icn_tags"><a href="#">Ejemplo</a></li>
            </ul>
            <a href="demanda.php"><h3>Mis Demandas</h3></a>
            <ul class="toggle">
                <li class="icn_profile"><a href="#">Ejemplo</a></li>
            </ul>
            <a href="valorar.php"><h3>Valorar</h3></a>
            <ul class="toggle">
                <li class="icn_video"><a href="#">Ejemplo</a></li>
            </ul>
            <a href="notificaciones.php"><h3>Notificaciones</h3></a>
            <ul class="toggle">
                <li class="icn_jump_back"><a href="#">Ejemplo</a></li>
            </ul>
            <a href="perfil.php"><h3>Perfil</h3></a>

            <a href="#"><h3>Salir</h3></a>


            <footer>
                <hr />
                <p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
            </footer>
        </aside><!-- end of sidebar -->

        <section id="main" class="column">

            <article class="module width_full">
                <header><h3>Panel de Usuario</h3></header>
                <div class="module_content">
                    <h1>Header 1</h1>
                    <h2>Header 2</h2>
                    <h3>Header 3</h3>
                    <h4>Header 4</h4>
                    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras mattis consectetur purus sit amet fermentum. Maecenas faucibus mollis interdum. Maecenas faucibus mollis interdum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

                    <p>Donec id elit non mi porta <a href="#">link text</a> gravida at eget metus. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>

                    <ul>
                        <li>Donec ullamcorper nulla non metus auctor fringilla. </li>
                        <li>Cras mattis consectetur purus sit amet fermentum.</li>
                        <li>Donec ullamcorper nulla non metus auctor fringilla. </li>
                        <li>Cras mattis consectetur purus sit amet fermentum.</li>
                    </ul>
                </div>
            </article><!-- end of styles article -->
            <div class="spacer"></div>
        </section>


    </body>

</html>