<?php

class Demanda {

    private $iddemanda;
    private $idoferta;
    private $emailsolicitante;
    private $ofertasolicitante;

    public function __construct($iddemanda, $idoferta, $emailsolicitante, $ofertasolicitante) {
        $this->iddemanda = $iddemanda;
        $this->idoferta = $idoferta;
        $this->emailsolicitante = $emailsolicitante;
        $this->ofertasolicitante = $ofertasolicitante;
    }

    public function setIdDemanda($iddemanda) {
        $this->iddemanda = $iddemanda;
    }

    public function setIdOferta($idoferta) {
        $this->idoferta = $idoferta;
    }

    public function setEmailSolicitante($emailsolicitante) {
        $this->emailsolicitante = $emailsolicitante;
    }

    public function setOfertaSolicitante($ofertasolicitante) {
        $this->ofertasolicitante = $ofertasolicitante;
    }

    public function getIdDemanda() {
        return $this->iddemanda;
    }

    public function getIdOferta() {
        return $this->idoferta;
    }

    public function getEmailSolicitante() {
        return $this->emailsolicitante;
    }

    public function getOfertaSolicitante() {
        return $this->ofertasolicitante;
    }

}
