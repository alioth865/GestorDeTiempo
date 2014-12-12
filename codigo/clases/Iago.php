<?php

include_once './GestorBaseDatos.php';
include_once './Usuario.php';
include_once './Categoria.php';
include_once './Oferta.php';

public function ListarCategoria{
		$c = new GestorBaseDatos();
		$lc = $c->ListarCategoria();
		return lc;
}
public function ModificarPerfil($email,$contraseña,$telefono){

		$c = new GestorBaseDatos();
		$modUs = $c->ModificarPerfil($email,$contraseña,$telefono);//*devuelve si o no si se a modificado correctamente*/ 
        return $modUs;
    }
	
	
public function ModificarOferta(){
		
		$c = new GestorBaseDatos();
		$om = $c-> ModificarOferta($email);
		return $om;
}
public function ModificarOfertaSeleccionada($dOferta,$nombre,$horario,$descripción,$idCategoría){
		$c = new GestorBaseDatos();
		$os = updateModificarOfertaSeleccionada($dOferta,$nombre,$horario,$descripción,$idCategoría);
		return os;


}
public function IntroducirDatos($email,$contraseña){

		$c = new GestorBaseDatos();
		return c->IntroducirDatos($email,$contraseña);
}

















