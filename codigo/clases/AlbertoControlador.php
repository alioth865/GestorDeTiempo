<?php

include_once './GestorBaseDatos.php';
include_once './Usuario.php';

class AlbertoControlador {
    <!-- HOLA ALIOTH -->

    public function VerPerfil($email){
        $bd=new GestorBaseDatos();
        return $bd=>verPerfil($email);
    }

    public function VerEstadisticaValoracion($email){
        $bd = new GestorBaseDatos();
        return $bd->verEstadisticaValoracion($email);
    }

    public function Valorar($email){
        $bd = new GestorBaseDatos();
        return $bd->valorar($email);
    }

    public function CubrirValoracion($idOferta, $valor, $descripcion){
        $bd = new GestorBaseDatos();
        return $bd->cubrirValoracion($idOferta, $valor, $descripcion);
    }

}

?>