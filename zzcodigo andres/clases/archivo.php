<?php

class Archivo {

    //Declaracion atributos encapsulados clase archivo
    private $nombre;
    private $codigoArchivo;
    private $correo;
    private $codigoTarea;
    private $ruta;

    //Constructor de la clase Archivo que recibe como atributos los valores de los atributos de la clase
    public function __construct($nombre, $codigoArchivo, $correo, $codigoTarea, $ruta) {
        $this->nombre = $nombre;
        $this->codigoArchivo = $codigoArchivo;
        $this->correo = $correo;
        $this->codigoTarea = $codigoTarea;
        $this->ruta = $ruta;
    }

    //Metodos set:
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCodigoArchivo($codigoArchivo) {
        $this->codigoArchivo = $codigoArchivo;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setCodigoTarea($codigoTarea) {
        $this->codigoTarea = $codigoTarea;
    }

    function setRuta($ruta) {
        $this->ruta = $ruta;
    }

    //Metodos get:

    function getNombre() {
        return $nombre;
    }

    function getCodigoArchivo() {
        return $codigoArchivo;
    }

    function getCorreo() {
        return $correo;
    }

    function getCodigoTarea() {
        return $codigoTarea;
    }

    function getRuta() {
        return $ruta;
    }

}
