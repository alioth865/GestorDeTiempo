<?php

include_once './GestorBaseDatos.php';
include_once './Usuario.php';

class AlbaControlador {
    public function registrarUsuario($email,$nombre,$contraseña,$ho,$hd,$valoracion,$telefono){
        $bd = new GestorBaseDatos(); 
        $usuario=new Usuario($email, 2, $nombre, $telefono, $contraseña, $hd, $ho, $valoracion);
        return $bd->createUsuario($usuario);
    }
    

    public function BuscarOferta($idCategoria) {
        $bd = new GestorBaseDatos();
        return $bd->buscarOferta($idcategoria);   
    }

}
