<?php
	
	//Añadimos las clases que vamos a utilizar
	include_once './GestorBaseDatos.php';
	include_once './Oferta.php';
	
	
	class VictorControlador{
	
	function SeleccionarOferta () {
		$c = new GestorBaseDatos();
		$os = c-> SeleccionarOferta($idOferta);
		return $os;
		}

	function SeleccionarOfertaPropia () {
		$c = new GestorBaseDatos();
		$os = c-> SeleccionarOfertaPropia($idOferta);
		return $os;
		}

	public function crearOferta($nombre,$horario,$descripcion,$categoria,$email) {
        $bd = new GestorBaseDatos();
        return $bd->insertaCategoria();
    }

	 public function eliminarOferta() { ///REVISAAAAAAAAAAAAAAAAAR
        $bd= new GestorBaseDatos();		///REVISAAAAAAAAAAAAAAAAAR	
		$o = c -> listarOferta();		///REVISAAAAAAAAAAAAAAAAAR
        return $bd->eliminarOferta($idOferta);  
    }

	}
?>