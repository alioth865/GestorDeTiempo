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
			<h1 class="site_title"><a href="index.php">Registro</a></h1>
			<h2 class="section_title">Banco de Tiempo</h2>
		</hgroup>
	</header> <!-- end of header bar -->
	
	<section id="secondary_bar">
		<div class="user">
			<p>Invitado</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="index.php">Registro</a></article>
		</div>
	</section><!-- end of secondary bar -->
	

	
	<section id="mainl" class="column">
		<article class="module width_full">
			<header><h3 style="margin-left=.5em">Registro</h3></header>
				<div class="module_content">
						<fieldset>

							<form action="login.php" method="POST" style ="margin: .5em .5em .1em .5em">
    						Nombre:<input type="text" name="user">
                            <br>
                            <br>

                            Telefono:<input type="text" name="telefono">
                        	<br>
                        	<br>
                            E-mail:<input type="text" name="mail">
                            <br>
                            <br>

                            Contraseña:<input type="text" name="pwd">
                        	<br>
                        	<br>
                        	Repetir contraseña:<input type="text" name="rpwd">


                       		<div id="estilbtn"><br><input type="submit" name="btn" value="Registrarse">
                           <input type="button" name="btn2" value="Cancelar" onClick= "window.location.href='index.php'">
                       		</div>
                    	</form>
						</fieldset>
						
				</div>
			<footer>
				
			</footer>
		</article><!-- end of post new article -->
		
		
	</section>


</body>

</html>
