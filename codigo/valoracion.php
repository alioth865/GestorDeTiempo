<!doctype html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
	<title>Valoración | Gestor de tiempo</title>
	
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
	include_once("./clases/Includephp.php");
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
			<h1 class="site_title"><?php echo __('Valuation', $lang) ?></h1>
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
			<a class="current"><?php echo __('Rate', $lang) ?></a>
			<div class="breadcrumb_divider"></div>
			<a class="current"><?php echo __('Valuation', $lang) ?></a>
			</article>

			</article>
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


			<li class="icn_jump_back"><a href ="javascript:history.back()"><?php echo __('Back', $lang) ?></a></li>
		
			<li class="icn_salir"><a href ="salir.php?lang=<?php echo $lang; ?>"><?php echo __('Exit', $lang) ?></a></li>

			<li class="icono_gb"><a href="valoracion.php?lang=en">  Ingles</a></li>
			<li class="icono_es"><a href="valoracion.php?lang=es">  Castellano</a></li>

		</ul><!--fin opciones-->

		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2014 Interfaces de usuario@esei </strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
		<article class="module width_full">
			<header><h3><?php echo __('Valuation', $lang) ?></h3></header>
				<div class="module_content">
						<fieldset>
						<?php 
						$id = $_GET['id'];
						$nombre = $_GET['n'];
						?>
						<label><h4>Oferta: <?php echo $nombre ?></h4></label>
						</fieldset>
		<form name="valoracion" method="POST" action="valoracion_controlador.php?lang=<?php echo $lang ?>&id=<?php echo $id ?>"> 
						<fieldset>
							<label><?php echo __('Score', $lang) ?> : </label>
							<select name="puntuacion">
							<?php for($i =0; $i<10; $i++){ ?>
									 	<option value="<?php echo $i+1 ?>"><?php echo $i+1 ?></option>
									<?php } ?> 
							</select>
					
						</fieldset>
						<fieldset>
							<label><?php echo __('Opinion', $lang) ?></label>
							<textarea rows="12" name="opinion"></textarea>
						</fieldset>
						
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="<?php echo __('Rate', $lang) ?>" / >
					<input type="button" value="<?php echo __('Back', $lang) ?>" onClick ="window.location.href='historial.php?lang=<?php echo $lang ?>'"></form>
				</div>
			</footer>
		</article><!-- end of post new article -->
		
	</section>


</body>

</html>
