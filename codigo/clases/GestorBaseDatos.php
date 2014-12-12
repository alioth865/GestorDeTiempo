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
        if (!$conection) {
            return $conection;
        } else {
            return $conectionDB;
        }
    }

    function insertaCategoria($nombrecategoria) {
        $this->conect();
        $sql = "INSERT INTO `bancodetiempo`.`Categoria` (`idcategoria` ,`nombrecategoria`)"
                . "VALUES (NULL , '$nombrecategoria')";
        //print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    function eliminarCategoriaEspecifica($idcategoria) {
        $this->conect();
        $sql = "DELETE FROM `Categoria` WHERE `idcategoria` ='$idcategoria'";
        //print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    function listarCategoria() {
        $this->conect();
        //Esta funcion devuelve un array asociativo de todas las categorias
        $sql = "SELECT * FROM `Categoria`";
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
            $toRet[$linea["idcategoria"]] = $linea;
        }
        return $toRet;
    }

    function actualizarCategoria($idcategoria, $nuevonombre) {
        $this->conect();
        $sql = "UPDATE `Categoria` SET `nombrecategoria` = '$nuevonombre' WHERE `idcategoria` ='$idcategoria'";
        echo $sql;
        return mysql_query($sql);
    }

    function listarOferta($email) {
        $this->conect();
        $sql = "SELECT * FROM `Oferta` WHERE `email`='$email'";
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
            $toRet[$linea["idoferta"]] = $linea;
        }
        return $toRet;
    }

    function createUsuario($u) {
        $this->conect();
        $correo = $u->getEmail();
        $nombre = $u->getNombre();
        $telefono = $u->getTelefono();
        $hd = $u->getHorasDemandadas();
        $ho = $u->getHorasOfertadas();
        $valoracion = $u->getValoracion();
        $tipousuario = $u->getTipoUsuario();
        $cont = $u->getContraseña();
        $sql = "INSERT INTO `Usuario`
            (`email`, `nombre`, `telefono`, `horasdemandadas`, `horasofertadas`, `valoracion`, `codtipusu`, `contraseña`) 
            VALUES ('$correo','$nombre','$telefono','$hd','$ho','$valoracion','$tipousuario','$cont')";
        //print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    public function buscarOferta($idcategoria) {
        $this->conect();
        $sql = " SELECT * FROM `Oferta` WHERE `idcategoria`='$idcategoria' ";
        //print $sql;
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
            $toRet[$linea["idoferta"]] = $linea;
        }
        return $toRet;
    }

    public function crearOferta($o) {
        $this->conect();
        $categoria = $o->getIdCategoria();
        $email = $o->getEmail();
        $nombreoferta = $o->getNombreOferta();
        $horarioinicio = $o->getHorarioInicio();
        $horariofin = $o->getHorarioFin();
        $descripcion = $o->getDescripcion();
        $idoferta = $o->getIdOferta();
        $valoracion = $o->getValoracion();

        $sql = "INSERT INTO `Oferta` (`idoferta`, `idcategoria`, `email`,
            `nombreoferta`, `horarioinicio`, `horariofin`, `descripcionoferta`,`valoracion`)
            VALUES ('$idoferta', '$categoria', '$email', '$nombreoferta', '$horarioinicio', '$horariofin',
            '$descripcion','$valoracion')";
        //print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    public function crearDemanda($d) {
        $this->conect();
        $email = $d->getEmailSolicitante();
        $oferta = $d->getIdOferta();
        $iddemanda = $d->getIdDemanda();
        $idofertasintercambio = $d->getOfertaSolicitante();

        $sql = "INSERT INTO `bancodetiempo`.`Demanda` (`iddemanda`, `email`, `idofertasintercambio`, 
            `idoferta`) VALUES ('$iddemanda', '$email', '$idofertasintercambio', '$oferta')";

        //print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    public function eliminarOferta($idoferta) {
        $this->conect();
        $sql = "DELETE FROM `Oferta` WHERE `idoferta` ='$idoferta'";
        //print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    public function crearDemandaSatisfecha($ds) {
        $this->conect();
        $email = $ds->getEmail();
        $idoferta = $ds->getIdOferta();
        $valoracion = $ds->getValoracion();
        $descripciondevaloracion = $ds->getDescripcionDeValoracion();
        $fecha = $ds->getFecha();

        $sql = "  INSERT INTO `DemandaSatisfecha` (`valoracion`, `descripcionvaloracion`, `fecha`, `email`, `idoferta`)
                                            VALUES ('$valoracion','$descripciondevaloracion','$fecha','$email', '$idoferta')";

        //print $sql;
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    public function buscarHistorial($email) {
        $this->conect();
        $sql = "SELECT * FROM DemandaSatisfecha WHERE `email`='$email'";
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
            $toRet[$linea["email"]] = $linea;
        }
        return $toRet;
    }

    public function valoracion($idoferta, $valor, $descripcion, $email) {
        $this->conect();
        //En esta funcion se hace lo siguiente:
        //Se valora una oferta
        //Y se actualiza la valoracion de esa oferta en la tabla oferta
        //Y se actualiza la valoracion del usuario
        //Valoracion de la oferta
        $sql = "UPDATE `DemandaSatisfecha` SET `valoracion`='$valor',"
                . "`descripcionvaloracion`='$descripcion' "
                . "WHERE `email`='$email' and `idoferta`='$idoferta'";
        //print $sql;
        mysql_query($sql);
        //Y se actualiza la valoracion de esa oferta en la tabla oferta
        $sql = "SELECT AVG(  `valoracion` ) AS promedio FROM  `DemandaSatisfecha` 
        WHERE  `email`='$email' and `idoferta`='$idoferta'";
        //print $sql;
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
            $promedio = $linea["promedio"];
        }
        if ($promedio != "NULL") {
            $sql = "UPDATE `Oferta` SET `valoracion`='$promedio' WHERE idoferta='$idoferta'";
            //print $sql;
            mysql_query($sql);
            //Y se actualiza la valoracion del usuario
            $sql = "SELECT `email` FROM `Oferta` WHERE idoferta='$idoferta'";
            //print $sql;
            $result = mysql_query($sql);
            while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
                //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
                $email_ofertante = $linea["email"];
            }
            $sql = "SELECT AVG(  `valoracion` ) AS promedio FROM  `Oferta` 
            WHERE  `email`='$email_ofertante'";
            //print $sql;
            $result = mysql_query($sql);
            while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
                //$toRet[$linea["idcategoria"]] = new Categoria($linea["idcategoria"], $linea["nombrecategoria"]);
                $promedio = $linea["promedio"];
            }
            if ($promedio != "NULL") {
                $sql = "UPDATE `Usuario` SET `valoracion`='$promedio' WHERE `email`='$email_ofertante'";
                //print $sql;
                return mysql_query($sql);
            }
        }
        return FALSE;
    }
    
    public function verPerfil($email){
        $this->conect();
        $sql="SELECT * FROM Usuario WHERE `email`='$email'";
        //print $sql;
        $result =  mysql_query($sql);
        while ($temp = mysql_fetch_array($result, MYSQL_ASSOC)) {
            return new Usuario($temp["email"], $temp["codtipusu"], $temp["nombre"], $temp["telefono"], $temp["contraseña"], $temp["horasdemandadas"], $temp["horasofertadas"], $temp["valoracion"]);
        }
    }
    

}
