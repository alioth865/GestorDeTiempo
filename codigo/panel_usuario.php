<!doctype html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
	<title>Panel de Usuario | Gestor de tiempo</title>
	
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

<?php
    session_start();
	//Idioma
	require('language.php'); 
	$lang = $_GET['lang'];
	if ( isset($_GET['lang']) ){
		$lang = $_GET['lang'];
	}
	$nom=$_SESSION['email'];
?>

	<header id="header">
		<hgroup>
			<h1 class="site_title"><?php echo __('User Panel', $lang) ?></h1>
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

			<a href="panel.php?lang=<?php echo $lang; ?>"><?php echo __('Index', $lang) ?></a> </article>
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<table>
				<tr>
					<td><input type="text" value="" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;"></td>
					<td><select style="width:60%;">
								<option><?php echo __('Selects a category', $lang) ?></option>
								<?php for($i =0; $i<50; $i++){ ?>
									 	<option><?php echo __('Category', $lang) ?> <?php echo $i+1 ?></option>
									<?php } ?> 
							</select></td>
				</tr>
			</table>
			
			
								
							
		</form>
		<hr/>
		<h3><?php echo __('Options', $lang) ?></h3>
		<ul class="toggle"><!--Opciones-->

			<li class="icn_tags"><a href ="ofertas.php?lang=<?php echo $lang; ?>"> <?php echo __('My offers', $lang) ?> </a> </li>

			<li class="icn_tags"><a href ="demanda.php?lang=<?php echo $lang; ?>"><?php echo __('My Demands', $lang) ?></a></li>

			<li class="icn_view_users"><a href ="valorar.php?lang=<?php echo $lang; ?>"><?php echo __('Rate', $lang) ?></a></li>

			<li class="icn_folder"><a href ="notificaciones.php?lang=<?php echo $lang; ?>"><?php echo __('Notifications', $lang) ?></a></li>

			<li class="icn_profile"><a href ="perfil.php?lang=<?php echo $lang; ?>"><?php echo __('Profile', $lang) ?></a></li>			

			<li class="icn_salir"><a href ="salir.php?lang=<?php echo $lang; ?>"><?php echo __('Exit', $lang) ?></a></li>

			<li class="icono_gb"><a href="panel_usuario.php?lang=en">  Ingles</a></li>
			<li class="icono_es"><a href="panel_usuario.php?lang=es">  Castellano</a></li>
		</ul><!--fin opciones-->

		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>

		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		
		<article class="module width_full">
			<header><h3><?php echo __('Popular Offers', $lang) ?></h3></header>
				<div class="module_content">
					<!--tabla ofertas populares-->
				
			<div style="display: block;" id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<tbody> 
			<!-- codigo php para crear una tabla-->
			<?php 
				for($i =0; $i<5; $i++){ ?>
				 <tr> 
    				<td><?php echo __('Title offer', $lang) ?><?php echo $i+1;?></td> 
    				<td><?php echo __('Category', $lang) ?> <?php echo $i+1?></td> 
    				<td><?php echo __('Something more', $lang) ?> <?php echo $i+1 ?></td> 
				</tr><?php ;
				}
			?> 
				
			</tbody> 
			</table>
			</div><!-- fin de la tabla ofertas populares -->
			
</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>
