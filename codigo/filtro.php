<?php
$lang = $_GET['lang'];
$valor = $_REQUEST['filtro'];
$isMail = 0;

if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$valor)){/*si lo que me pasan es un email*/
	$isMail = 1;
}
header("Location:eliminar_oferta_encontrada.php?lang=".$lang."&valor=".$valor."&ismail=".$isMail);
?>
