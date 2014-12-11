<?php
include_once("gestionbases.php");
public function ListarCategoria{
		$c = new GestorBaseDatos();
		$lc = $c->ListarCategoria();
		return lc;
}
public function ModificarPerfil($u){

		$c = new GestorBaseDatos();
		$modUs = $c->ModificarPerfil($email,$contraseña,$telefono);//*devuelve si o no si se a modificado correctamente*/ 
        return $modUs;
    }
	
	
public function ModificarOferta(){
		
		$c = new GestorBaseDatos();
		$o = $c-> ModificarOferta($email);
		return $o;
}
public function ModificarOfertaSeleccionada(){
		$c = new GestorBaseDatos();
		


}


















