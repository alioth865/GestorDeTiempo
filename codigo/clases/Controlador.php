<?php

class Controlador {

//ALIOTH
    function loguear($correo, $contrasena) {
        $c = new GestorBaseDatos();
        return $c->loguear($correo, $contrasena);
    }
    
    function eliminarUsuario($email){
        $c=new GestorBaseDatos();
        return $c->eliminarUsuario($email);
    }

    function listarUsuarios() {
        $c = new GestorBaseDatos();
        $listUs = $c->listarUsuarios(); //Devolve unha lista de usuarios
        return $listUs;
    }

//ALBA
    public function registrarUsuario($email, $nombre, $contrase�a, $ho, $hd, $valoracion, $telefono) {
        $bd = new GestorBaseDatos();
        $usuario = new Usuario($email, 2, $nombre, $telefono, $contrase�a, $hd, $ho, $valoracion);
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
        return $lc;
    }

    public function ModificarPerfil($email, $contrase�a, $telefono, $nombre) {

        $c = new GestorBaseDatos();
        $modUs = $c->ModificarPerfil($email, $contrase�a, $telefono, $nombre); //*devuelve si o no si se a modificado correctamente*/ 
        return $modUs;
    }

    public function ModificarOferta($email) {

        $c = new GestorBaseDatos();
        $om = $c->verPerfil($email);
        return $om;
    }

    public function ModificarOfertaSeleccionada($dOferta, $nombre, $horario, $descripci�n, $idCategor�a) {
        $c = new GestorBaseDatos();
        $os = updateModificarOfertaSeleccionada($dOferta, $nombre, $horario, $descripci�n, $idCategor�a);
        return os;
    }

    //CREO QUE ESTA FUNCION NO HACE FALTA
    public function IntroducirDatos($email, $contrase�a) {

        $c = new GestorBaseDatos();
        return $c->IntroducirDatos($email, $contrase�a);
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

    //ALBERTO

    public function verPerfil($email) {
        $bd = new GestorBaseDatos();
        return $bd->verPerfil($email);
    }

    public function verEstadisticaValoracion($email) {
        $bd = new GestorBaseDatos();
        return $bd->verEstadisticasValoracion($email);
    }

    public function valoracion($email) {
        $bd = new GestorBaseDatos();
        return $bd->buscarHistorial($email);
    }

    public function cubrirValoracion($idoferta, $valor, $descripcion, $email, $iddemandasatisfecha) {
        $bd = new GestorBaseDatos();
        return $bd->valoracion($idoferta, $valor, $descripcion, $email, $iddemandasatisfecha);
    }

    //VICTOR

    function SeleccionarOferta($idoferta) {
        $c = new GestorBaseDatos();
        $os = $c->seleccionarOferta($idOferta);
        return $os;
    }

    function SeleccionarOfertaPropia($email) {
        $c = new GestorBaseDatos();
        $os = $c->listarOferta($email);
        return $os;
    }

    public function crearOferta($nombreoferta, $horarioinicio, $horariofin, $descripcion, $idcategoria, $email) {
        $bd = new GestorBaseDatos();
        $o = new Oferta("NULL", $idcategoria, $email, $nombreoferta, $horarioinicio, $horariofin, $descripcion, 0);
        return $bd->crearOferta($o);
    }

    public function eliminarOferta($idoferta) {
        $bd = new GestorBaseDatos();
        return $bd->eliminarOferta($idoferta);
    }

    public function listarOfertaPopulares($email) {
        $bd = new GestorBaseDatos();
        return $bd->ofertasPopulares($email);
    }

    public function listarMisOfertas($email) {
        $bd = new GestorBaseDatos();
        return $bd->listarOferta($email);
    }

    
    //CRISTINA
   /* public function listarCategoria(){
        $bd = new GestorBaseDatos();
        return $bd->listarCategoria();
    }*/

    public function modificarCategoriaEspecificada($idcategoria, $nuevonombre) {
        $bd = new GestorBaseDatos();
        return $bd->actualizarCategoria($idcategoria, $nombre);
    }

    public function verEstadisticasHorasIntercambiadas($email) {
        $bd = new GestorBaseDatos();
        return $bd->verEstadisticasHorasIntercambiadas($email);
    }

}
