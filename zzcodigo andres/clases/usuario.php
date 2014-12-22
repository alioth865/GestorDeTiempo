<?php

class Usuario {

//atributo correo : guarda el correo del usuario
    var $correo;
//atributo nombre : guarda el nombre del usuario
    var $nombre;
//atributo primerApellido : guarda el primer apellido del usuario
    var $primerApellido;
//atributo segundoApellido : guarda el segundo apellido del usuario
    var $segundoApellido;
//atributo contraseña : guarda la contraseña del usuario
    var $contrasena;
//atributo codigoTipoUsuario : utiliza 0 cuando es un empleado y 1 cuando es un administrador
    var $codigoTipoUsuario;
//atributo respuestaSeguridad : cuando el usuario quiera recuperar su contraseña
    var $respuestaSeguridad;

//Constructor de la clase
//parametros: el correo, el nombre, el primerApellido, el segundoApellido, la contraseña, el codigoTipoUsuario y la respuestaSeguridad
    function __construct($correo, $nombre, $primerApellido, $segundoApellido, $codigoTipoUsuario, $respuestaSeguridad, $pass) {
        $this->correo = $correo;
        $this->nombre = $nombre;
        $this->primerApellido = $primerApellido;
        $this->segundoApellido = $segundoApellido;
        $this->codigoTipoUsuario = $codigoTipoUsuario;
        $this->respuestaSeguridad = $respuestaSeguridad;
        $this->contrasena = $pass;
    }

    function getCorreo() {
        return $this->correo;
    }

    function __set($correo, $cor) {
        $this->correo = $cor;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nom) {
        $this->nombre = $nom;
    }

    function getPrimerApellido() {
        return $this->primerApellido;
    }

    function setPrimerApellido($primApe) {
        $this->primerApellido = $primApe;
    }

    function getSegundoApellido() {
        return $this->segundoApellido;
    }

    function setSegundoApellido($segApe) {
        $this->segundoApellido = $segApe;
    }

    function getContraseña() {
        return $this->contraseña;
    }

    function setContraseña($cont) {
        $this->contraseña = $cont;
    }

    function getCodigoTipoUsuario() {
        return $this->codigoTipoUsuario;
    }

    function setCodigoTipoUsuario($codTipUsu) {
        $this->codigoTipoUsuario = $codTipUsu;
    }

    function getRespuestaSeguridad() {
        return $this->respuestaSeguridad;
    }

    function setRespuestaSeguridad($respSeg) {
        $this->respuestaSeguridad = $respSeg;
    }

}
