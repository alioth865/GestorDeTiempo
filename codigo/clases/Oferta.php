<?php

class Oferta {

    private $idoferta;
    private $idcategoria;
    private $email;
    private $nombreoferta;
    private $horarioinicio;
    private $horariofin;
    private $descripcion;

    public function __construct($idoferta, $idcategoria, $email, $nombreoferta, $horarioinicio, $horariofin, $descripcion) {
        $this->idoferta = $idoferta;
        $this->idcategoria = $idcategoria;
        $this->email = $email;
        $this->nombreoferta = $nombreoferta;
        $this->horarioinicio = $horarioinicio;
        $this->horariofin = $horariofin;
        $this->descripcion = $descripcion;
    }

    public function setIdOferta($idoferta) {
        $this->idoferta = $idoferta;
    }

    public function setIdCategoria($idcategoria) {
        $this->idcategoria = $idcategoria;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setnombreoferta($nombreoferta) {
        $this->nombreoferta = $nombreoferta;
    }

    public function setHorarioInicio($horarioinicio) {
        $this->horarioinicio = $horarioinicio;
    }

    public function setHorarioFin($horariofin) {
        $this->horariofin = $horariofin;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function getIdOferta() {
        return $this->idoferta;
    }

    public function getIdCategoria() {
        return $this->idcategoria;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getnombreoferta() {
        return $this->nombreoferta;
    }

    public function getHorarioInicio() {
        return $this->horarioinicio;
    }

    public function getHorarioFin() {
        return $this->horariofin;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

}
