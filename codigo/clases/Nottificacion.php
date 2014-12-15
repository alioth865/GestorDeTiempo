<?php
class Nottificacion {
    private $email;
    private $idnotificacion;
    private $iddemanda;
    private $respuesta;
    public function __construct($email, $idnotificacion, $iddemanda, $respuesta) {
        $this->email=$email;
        $this->idnotificacion=$idnotificacion;
        $this->iddemanda=$iddemanda;
        $this->respuesta=$respuesta;
    }
    
    public function setEmail($email){
        $this->email=$email;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setIdNotificacion($idnotificacion){
        $this->idnotificacion=$idnotificacion;
    }
    
    public function getIdNotificacion(){
        return $this->idnotificacion;
    }
    
    public function setIdDemanda($iddemanda){
        $this->iddemanda=$iddemanda;
    }
    
    public function getIdDemanda(){
        return $this->iddemanda;
    }
    
    public function setRespuesta($respuesta){
        $this->respuesta=$respuesta;
    }
    
    public function getRespuesta(){
        return $this->respuesta;
    }
    
    
}
