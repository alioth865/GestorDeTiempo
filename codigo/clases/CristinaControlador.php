<?php

include_once './GestorBaseDatos.php';
include_once './Usuario.php';

class CristinaControlador {
    public function modificarCategoria(){
        $bd = new GestorBaseDatos();
		$idcategoria= new listarCategoria();		
        $categoria=new Categoria($idcategoria,$nombre);
        return $bd->modificarCategoriaEspecificada($idcategoria,$nuevonombre);
    }
    

	public function modificarCategoriaEspecificada($idcategoria,$nuevonombre){
        $bd = new GestorBaseDatos(); 
        return $bd->updateCategoria($idcategoria,$nombre);
    }
	
		public function verEstadisticasHorasIntercambiadas($email){
        $bd = new GestorBaseDatos(); 
        return $bd->createUsuario($u);
    }
}
?>

