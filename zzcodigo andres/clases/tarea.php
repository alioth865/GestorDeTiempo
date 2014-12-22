<?php

class Tarea {

//atributo nombre : pone el nombre a la tarea
    var $nombre;
//atributo descripcion : escribe la descripcion de la tarea
    var $descripcion;
//atributo terminada : te manda un entero diciendo si esta terminada o no la tarea
    var $terminada;
//atributo prioridad : dependiendo de la prioridad llevara un numero o otro
    var $prioridad;
//atributo fechaInicio : muestra la fecha en la que se inicio la tarea
    var $fechaInicio;
//atributo fechaFin : muestra la fecha en la que se finaliza la tarea
    var $fechaFin;
//atributo horasAsignadas : muestra las horas que se le dedico a la tarea
    var $horasAsignadas;
//atributo correoAdministrador : muestra el correo del administrador que creo la tarea
    var $correoAdministrador;
//atributo codigoTarea : muestra el codigo de la tarea
    var $codigoTarea;

//Constructor de la clase
//parametros: el nombre, la descripcion, si esta terminada la tarea, la prioridad, la fechaInicio, la fechaFin, las horasAsignadas, el correoAdministrador y el codigoTarea
    function __construct($nombre, $descripcion, $terminada, $prioridad, $fechaInicio, $fechaFin, $horasAsignadas, $correoAdministrador, $codigoTarea) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->terminada = $terminada;
        $this->prioridad = $prioridad;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
        $this->horasAsignadas = $horasAsignadas;
        $this->correoAdministrador = $correoAdministrador;
        $this->codigoTarea = $codigoTarea;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setNombre($nom) {
        $this->nombre = $nom;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setDescripcion($des) {
        $this->descripcion = $des;
    }

    function getTerminada() {
        return $this->terminada;
    }

    function setTerminada($ter) {
        $this->terminada = $ter;
    }

    function getPrioridad() {
        return $this->prioridad;
    }

    function setPrioridad($pri) {
        $this->prioridad = $pri;
    }

    function getFechaInicio() {
        return $this->fechaInicio;
    }

    function setFechaInicio($fecIni) {
        $this->fechaInicio = $fecIni;
    }

    function getFechaFin() {
        return $this->fechaFin;
    }

    function setFechaFin($fecFin) {
        $this->fechaFin = $fecFin;
    }

    function getHorasAsignadas() {
        return $this->horasAsignadas;
    }

    function setHorasAsignadas($horAsi) {
        $this->horasAsignadas = $horAsi;
    }

    function getCorreoAdministrador() {
        return $this->correoAdministrador;
    }

    function setCorreoAdministrador($corAdm) {
        $this->correoAdministrador = $corAdm;
    }

    function getCodigoTarea() {
        return $this->codigoTarea;
    }

    function setCodigoTarea($codTar) {
        $this->codigoTarea = $codTar;
    }

}
