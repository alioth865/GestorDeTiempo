<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8"/>
	<title>Crear Oferta | Gestor de tiempo</title>
	
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
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

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
    $(function(){
        $('.column').equalHeight();
    });
</script>

</head>


<body>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="panel_administrador.php">Crear Oferta</a></h1>
			<h2 class="section_title">Banco de Tiempo</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Nombre de Usuario</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs">
			<a href="panel_administrador.php">Inicio</a>
			<div class="breadcrumb_divider"></div>
			<a href="ofertas.php">Mis Ofertas</a>
			<div class="breadcrumb_divider"></div>
			<a class="current">Crear oferta</a>
			</article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<table>
				<tr>
					<td><input type="text" value="Búsqueda rápida" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"></td>
					<td><select style="width:60%;">
								<option>Selecciona una categoría</option>
								<?php for($i =0; $i<50; $i++){ ?>
									 	<option>Categoría <?php echo $i+1 ?></option>
									<?php } ?> 
							</select></td>
				</tr>
			</table>
			
			
								
							
		</form>
		<hr/>
		<h3>Opciones</h3>
		<ul class="toggle"><!--Opciones-->

			<li class="icn_anadir"><a href ="#">Añadir Oferta</a></li>

			<li class="icn_jump_back"><a href ="javascript:history.back()">Volver</a></li>
		
			<li class="icn_salir"><a href ="index.php">Salir</a></li>

		</ul><!--fin opciones-->

		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<article class="module width_full">
			<header><h3>Crear Oferta</h3></header>
				<div class="module_content">
					<!--tabla-->
					<!--**********AQUI LINK***************-->
					<form action="#" method="POST">
					<!--**********AQUI LINK***************-->
					<div style="display: block;" id="tab1" class="tab_content">
					<table class="tablesorter" cellspacing="0"> 
					<tbody> 
						<tr>
							<td>Nombre</td>
							<td><input type="text" name=nombre></td>
						</tr>
						<tr>
							<td>Horario</td>
							<td><input type="text" name=horario></td>
						</tr>
						<tr>
							<td>Descripción</td>
							<td><textarea name="descripcion" rows="10" cols="40"></textarea> </td>
						</tr>
						<tr>
							<td>Categoría</td>
							<td><select name="categoria" style="width:100%">
										<option>Selecciona una categoría</option>
										<?php for($i =0; $i<50; $i++){ ?>
											 	<option>Categoría <?php echo $i+1 ?></option>
											<?php } ?> 
									</select></td>
						</tr>
						<tr>
							<td><input type="submit" name="crear" value="Crear"></td>
							<td><input type="reset" value="Borrar campos"></td>
						</tr>
			
					</tbody> 
					</table>
					</form>
			<!-- fin de la tabla  -->
			
</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>


</html>
