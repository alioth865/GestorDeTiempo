
<?php
/**
 * Description of language.php
 *
 * Función para el manejo de los idiomas
 * para agregar otro idioma
 * basta con hacer un language_XX.php
 * con las palabras y su traduccion
 *
 * @author Raúl
 */
function __($str, $lang){

	if ( $lang != null ){

		if ( file_exists('language_'.$lang.'.php') ){

			include('language_'.$lang.'.php');
			if ( isset($texts[$str]) ){
				$str = $texts[$str];
			}
		}
	}

	return $str;
}

?>
