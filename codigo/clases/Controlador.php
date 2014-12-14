<?php

class Controlador {

//ALIOTH
    function loguear($correo, $contrasena) {
        $c = new GestorBaseDatos();
        return $c->loguear($correo, $contrasena);
    }

    function listarUsuarios() {
        $c = new GestorBaseDatos();
        $listUs = $c->listarUsuarios(); //Devolve unha lista de usuarios
        return $listUs;
    }

//ALBA
    public function registrarUsuario($email, $nombre, $contraseña, $ho, $hd, $valoracion, $telefono) {
        $bd = new GestorBaseDatos();
        $usuario = new Usuario($email, 2, $nombre, $telefono, $contraseña, $hd, $ho, $valoracion);
        return $bd->createUsuario($usuario);
    }

    public function BuscarOferta($idCategoria) {
        $bd = new GestorBaseDatos();
        return $bd->buscarOferta($idcategoria);
    }

    //IAGO
    public function ListarCategoria() {
        $c = new GestorBaseDatos();
        $lc = $c->ListarCategoria();
        return lc;
    }

    public function ModificarPerfil($email, $contraseña, $telefono, $nombre) {

        $c = new GestorBaseDatos();
        $modUs = $c->ModificarPerfil($email, $contraseña, $telefono, $nombre); //*devuelve si o no si se a modificado correctamente*/ 
        return $modUs;
    }

    public function ModificarOferta($email) {

        $c = new GestorBaseDatos();
        $om = $c->verPerfil($email);
        return $om;
    }

    public function ModificarOfertaSeleccionada($dOferta, $nombre, $horario, $descripción, $idCategoría) {
        $c = new GestorBaseDatos();
        $os = updateModificarOfertaSeleccionada($dOferta, $nombre, $horario, $descripción, $idCategoría);
        return os;
    }
    
    //CREO QUE ESTA FUNCION NO HACE FALTA
    public function IntroducirDatos($email, $contraseña) {

        $c = new GestorBaseDatos();
        return $c->IntroducirDatos($email, $contraseña);
    }

    //Nides
    public function listarDemandas($email) {
        $bd = new GestorBaseDatos(); //Creamos un objeto para conectarnos con la BD
        return $bd->listarDemandas($email);
    }

    public function crearCategorias($nombre) {
        $bd = new GestorBaseDatos();
        return $bd->insertaCategoria($nombre);
    }

    public function eliminarCategorias() {
        $bd = new GestorBaseDatos();
        $idcategoria = new listarCategoria();
        return $bd->eliminarCategoriaEspecifica($idcategoria);
    }

    public function eliminarCategoriaEspecifica($idcategoria) {
        $bd = new GestorBaseDatos();
        return $bd->eliminarCategoriaEspecifica($idcategoria);
    }

}
