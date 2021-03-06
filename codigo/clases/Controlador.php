<?php

class Controlador {

//ALIOTH
    function loguear($correo, $contrasena) {
        $c = new GestorBaseDatos();
        $contrase�aencryptada = sha1(md5($contrasena));
        return $c->loguear($correo, $contrase�aencryptada);
    }

    function eliminarUsuario($email) {
        $c = new GestorBaseDatos();
        return $c->eliminarUsuario($email);
    }

    function listarUsuarios() {
        $c = new GestorBaseDatos();
        $listUs = $c->listarUsuarios(); //Devolve unha lista de usuarios
        return $listUs;
    }

    function eliminarNotificacion($idnotificacion) {
        $c = new GestorBaseDatos();
        return $c->eliminarNotificacion($idnotificacion);
    }

    public function listarNotificacion($email) {
        $bd = new GestorBaseDatos();
        return $bd->listarNotificacion($email);
    }

    public function verDemandaEspecifica($iddemanda) {
        $bd = new GestorBaseDatos();

        return $bd->verDemandaEspecifica($iddemanda);
    }

    public function verOfertasIntercambio($idofertasintercambio) {
        $bd = new GestorBaseDatos();
        return $bd->verOfertasIntercambio($idofertasintercambio);
    }

    public function crearDemandaSatisfecha($email, $idoferta, $valoracion, $descripciondevaloracion, $fecha, $iddemandasatisfecha) {
        $bd = new GestorBaseDatos();
        return $bd->crearDemandaSatisfecha(new Historial($email, $idoferta, $valoracion, $descripciondevaloracion, $fecha, $iddemandasatisfecha));
    }

    public function crearNotificacion($email, $idnotidicacion, $idoferta, $respuesta) {
        $bd = new GestorBaseDatos();
        return $bd->nuevaNotificacion($email, $idnotidicacion, $idoferta, $respuesta);
    }

    public function eliminarDemanda($iddemanda) {
        $bd = new GestorBaseDatos();
        return $bd->eliminarDemandaEspecifica($iddemanda);
    }
    
    public function crearDemanda($email,$idofertasintercambio, $idoferta){
        $d=new Demanda(NULL, $idoferta, $email, $idofertasintercambio);
        $bd = new GestorBaseDatos();
        return $bd->crearDemanda($d);
    }

    //Busqueda
    public function ListarCategoriaId($nombrecategoria) {
        $c = new GestorBaseDatos();
        $lc = $c->ListarCategoriaId($nombrecategoria);
        return $lc;
    }

    public function ListarCategoriaNo($idcategoria) {
        $c = new GestorBaseDatos();
        $lc = $c->ListarCategoriaNo($idcategoria);
        return $lc;
    }
    
    public function buscarOfertaSegunPatron($idcategoria,$patrondebusqueda){
        //ESTA FUNCION FUNCIONA PASANDOLE UN IDCATEGORIA SI QUIERES BUSCAR SEGUN UNA CATEGORIA O PASANDOLE NULL SI QUIERES BUSCAR SIN NINGUN FILTRO DE CATEGORIA
        
        $c = new GestorBaseDatos();
        $lo=$c->buscarOfertaSegunPatron($idcategoria,$patrondebusqueda);
        return $lo;
    }


    //Busqueda

//ALBA
    public function registrarUsuario($email, $nombre, $contrase�a, $ho, $hd, $valoracion, $telefono) {
        $bd = new GestorBaseDatos();
        $contrase�aencryptada = sha1(md5($contrase�a));
        $usuario = new Usuario($email, 2, $nombre, $telefono, $contrase�aencryptada, $hd, $ho, $valoracion);
        return $bd->createUsuario($usuario);
    }

    public function BuscarOferta($idCategoria) {
        $bd = new GestorBaseDatos();
        return $bd->buscarOferta($idCategoria);
    }

    //IAGO
    public function ListarCategoria() {
        $c = new GestorBaseDatos();
        $lc = $c->ListarCategoria();
        return $lc;
    }

    public function ModificarPerfil($email, $contrase�a, $telefono, $nombre) {
        $c = new GestorBaseDatos();
        $contrase�aencryptada = sha1(md5($contrase�a));
        $modUs = $c->ModificarPerfil($email, $contrase�aencryptada, $telefono, $nombre); //*devuelve si o no si se a modificado correctamente*/ 
        return $modUs;
    }

    /*
      public function ModificarOferta($email) {

      $c = new GestorBaseDatos();
      $om = $c->verPerfil($email);
      return $om;
      }

     */

    public function ModificarOfertaSeleccionada($idOferta, $nombre, $horarioinicio, $horariofin, $descripcion, $idCategoria) {
        $c = new GestorBaseDatos();
        $os = $c->updateOferta($idOferta, $nombre, $horarioinicio, $horariofin, $descripcion, $idCategoria);
        return $os;
    }

    //CREO QUE ESTA FUNCION NO HACE FALTA
    public function IntroducirDatos($email, $contrase�a) {

        $c = new GestorBaseDatos();
        $contrase�aencryptada = sha1(md5($contrase�a));
        return $c->IntroducirDatos($email, $contrase�aencryptada);
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

    public function listarHistorial($email) {
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
        $os = $c->seleccionarOferta($idoferta);
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
      } */

    public function modificarCategoriaEspecificada($idcategoria, $nuevonombre) {
        $bd = new GestorBaseDatos();
        return $bd->actualizarCategoria($idcategoria, $nuevonombre);
    }

    public function verEstadisticasHorasIntercambiadas($email) {
        $bd = new GestorBaseDatos();
        return $bd->verEstadisticasHorasIntercambiadas($email);
    }

}
