<?php

class Historial {

    private $email;
    private $idoferta;
    private $valoracion;
    private $descripciondevaloracion;
    private $fecha;
    private $iddemandasatisfecha;

    public function __construct($email, $idoferta, $valoracion, $descripciondevaloracion, $fecha, $iddemandasatisfecha) {
        $this->email = $email;
        $this->idoferta = $idoferta;
        $this->valoracion = $valoracion;
        $this->descripciondevaloracion = $descripciondevaloracion;
        $this->fecha = $fecha;
        $this->iddemandasatisfecha = $iddemandasatisfecha;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIdOferta($idoferta) {
        $this->idoferta = $idoferta;
    }

    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    public function setDescripcionDeValoracion($descripciondevaloracion) {
        $this->descripciondevaloracion = $descripciondevaloracion;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIdOferta() {
        return $this->idoferta;
    }

    public function getValoracion() {
        return $this->valoracion;
    }

    public function getDescripcionDeValoracion() {
        return $this->descripciondevaloracion;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getIdDemandaSatisfecha() {
        return $this->iddemandasatisfecha;
    }
    
    public function setIdDemandaSatisfecha($iddemandasatisfecha){
        $this->iddemandasatisfecha=$iddemandasatisfecha;
    }
}
