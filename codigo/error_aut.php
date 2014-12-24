<!doctype html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8_spanish_ci" />
	<title>Bienvenido | Banco de horas</title>
	
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
<!-- Idioma-->

<?php 
	require('language.php'); 
 	/* CARGAMOS LENGUAGE */

	if ( isset($_GET['lang']) ){
		$lang = $_GET['lang'];
	}else {$lang="es";}


?>

	<header id="header">
		<hgroup>
			<h1 class="site_title">
			<a href="index.php?lang=<?php echo $lang; ?>"><?php echo __('Login', $lang) ?></a>
			</h1>
			<h2 class="section_title"><?php echo __('Time Bank', $lang) ?></h2>
			
			<li class="icono_gb"><a href="error_aut.php?lang=en">  Ingles</a></li>

			<li class="icono_es"><a href="error_aut.php?lang=es">  Castellano</a></li>	
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p><?php echo __('Guest', $lang) ?></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php?lang=<?php echo $lang; ?>"><?php echo __('Login', $lang) ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	

	
	<section id="mainl" class="column">
		<article class="module width_full">
			<header><h3 style ="margin: .5em .5em .1em .5em"><?php echo __('Login', $lang) ?></h3></header>
				<div class="module_content">
						<fieldset>
							<label><?php echo __('Authentication error, please try again', $lang) ?></label>
							<br>
							<br>
							<br>
							<br>
							<br>
						</fieldset>
						
				</div>
			<footer>



			</aside>
			</footer>
		</article><!-- end of post new article -->
		
		
	</section>


</body>

</html>