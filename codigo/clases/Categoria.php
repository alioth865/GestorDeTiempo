<?php

class Categoria {
    private $idcategoria;
    private $nombrecategoria;
    function __construct($idcategoria, $nombrecategoria) {
        $this->idcategoria=$idcategoria;
        $this->nombrecategoria=$nombrecategoria;
    }
    
    function setIdCategoria($idcategoria){
        $this->idcategoria=$idcategoria;
    }
    function setNombreCategoria($nombrecategoria){
        $this->nombrecategoria=$nombrecategoria;
    }
    
    function getIdCategoria() {
        return $this->idcategoria;
    }
    
    function getNombreCategoria(){
        return $this->nombrecategoria;
    }
    
}
