<?php

//Añadimos las clases que vamos a utilizar
include_once './GestorBaseDatos.php';
include_once './Usuario.php';

class NidesControlador {

    public function listarDemandas($email) {
        $bd = new GestorBaseDatos(); //Creamos un objeto para conectarnos con la BD
        return $bd->listarDemandas($email);
    }

    public function crearCategorias($nombre) {
        $bd = new GestorBaseDatos();
        return $bd->insertaCategoria($nombre);
    }

    
    public function eliminarCategorias() {
        $bd= new GestorBaseDatos();
        $idcategoria= new listarCategoria();
        return $bd->eliminarCategoriaEspecifica($idcategoria);  
    }

    public function eliminarCategoriaEspecifica($idcategoria) {
        $bd = new GestorBaseDatos();
        return $bd->eliminarCategoriaEspecifica($idcategoria);
    }

}

?>