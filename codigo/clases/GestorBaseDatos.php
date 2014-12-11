<?php
include_once ("./Includephp.php");
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GestorBaseDatos
 *
 * @author Alioth
 */
class GestorBaseDatos {

    private $usuario;
    private $password;
    private $bd;
    private $host;

    function __construct() {
        $this->db = 'bancodetiempo';
        $this->usuario = 'usuario';
        $this->password = 'usuario';
        $this->host = 'localhost';
        $this->conect();
    }
    
    private function conect() {
        //Se conecta a una base datos
        $conection = mysql_connect($this->host, $this->usuario, $this->password);
        $conectionDB = mysql_select_db($this->db);
        if (!$conection){
            return $conection;
        }
        else{
            return $conectionDB;
        }
    }
    
    function insertaCategoria($nombrecategoria){
        $this->conect();
        $sql="INSERT INTO `bancodetiempo`.`Categoria` (`idcategoria` ,`nombrecategoria`)"
                . "VALUES (NULL , '$nombrecategoria')";
        print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }
    
    function eliminarCategoriaEspecifica($idcategoria){
        $this->conect();
        $sql="DELETE FROM `Categoria` WHERE `idcategoria` ='$idcategoria'";
        print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }
    
    
    function listarCategoria(){
        $this->conect();
        //Esta funcion devuelve un array asociativo de todas las categorias
        $sql= "SELECT * FROM `Categoria`";
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
             $toRet[$linea["idcategoria"]] = $linea;
        }
        return $toRet;
    }
    
    function actualizarCategoria($idcategoria,$nuevonombre){
        $this->conect();
        $sql="UPDATE `Categoria` SET `nombrecategoria` = '$nuevonombre' WHERE `idcategoria` ='$idcategoria'";
        echo $sql;
        return mysql_query($sql);
    }
    
    
    function listarOferta($email){
        $this->conect();
        $sql="SELECT * FROM `Oferta` WHERE `email`='$email'";
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
             $toRet[$linea["idoferta"]] = $linea;
        }
        return $toRet;
    }
    
    function createUsuario($u){
        $this->conect();
        $correo=$u->getEmail();
        $nombre=$u->getNombre();
        $telefono=$u->getTelefono();
        $hd = $u->getHorasDemandadas();
        $ho= $u->getHorasOfertadas();
        $valoracion=$u->getValoracion();
        $tipousuario= $u->getTipoUsuario();
        $cont=$u->getContraseña();
        $sql="INSERT INTO `Usuario`
            (`email`, `nombre`, `telefono`, `horasdemandadas`, `horasofertadas`, `valoracion`, `codtipusu`, `contraseña`) 
            VALUES ('$correo','$nombre','$telefono','$hd','$ho','$valoracion','$tipousuario','$cont')";
        print $sql;
            $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;         
    }    
    
    public function buscarOferta($idcategoria)
    {
        $this->conect();
        $sql=" SELECT * FROM `Oferta` WHERE `idcategoria`='$idcategoria' ";
        print $sql;
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
             $toRet[$linea["idoferta"]] = $linea;
        }
        return $toRet;
    }
    
   public function crearOferta($o){
       $this->conect();
       $categoria= $o->getIdCategoria();
       $email=$o->getEmail();
       $nombreoferta=$o->getNombreOferta();
       $horarioinicio=$o->getHorarioInicio();
       $horariofin=$o->getHorarioFin();
       $descripcion = $o->getDescripcion();
       $idoferta= $o->getIdOferta();
       
        
       $sql= "INSERT INTO `Oferta` (`idoferta`, `idcategoria`, `email`,
            `nombreoferta`, `horarioinicio`, `horariofin`, `descripcionoferta`)
            VALUES ('$idoferta', '$categoria', '$email', '$nombreoferta', '$horarioinicio', '$horariofin',
            '$descripcion')";
        print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;  
   }
   
   public function crearDemanda($d){
       $this->conect();
       $email=$d->getEmailSolicitante();
       $oferta=$d->getIdOferta();
       $iddemanda=$d->getIdDemanda();
       $idofertasintercambio=$d->getOfertaSolicitante();
       
        $sql=  "INSERT INTO `bancodetiempo`.`Demanda` (`iddemanda`, `email`, `idofertasintercambio`, 
            `idoferta`) VALUES ('$iddemanda', '$email', '$idofertasintercambio', '$oferta')";

        print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;  
   }
   
   public function eliminarOferta($idoferta){
        $this->conect();
        $sql="DELETE FROM `Oferta` WHERE `idoferta` ='$idoferta'";
        print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }
    
   public function crearDemandaSatisfecha($ds) {
        $this->conect();
        $email=$ds->getEmail();
        $idoferta=$ds->getIdOferta();
        $valoracion=$ds->getValoracion();
        $descripciondevaloracion=$ds->getDescripcionDeValoracion();
        $fecha=$ds->getFecha();
        
         $sql= "  INSERT INTO `DemandaSatisfecha` (`valoracion`, `descripcionvaloracion`, 
                 `fecha`, `email`, `idoferta`)
                 VALUES ('$email', '$idoferta', '$valoracion', '$descripciondevaloracion', '$fecha')";
       
         print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;  
   }
    
}
