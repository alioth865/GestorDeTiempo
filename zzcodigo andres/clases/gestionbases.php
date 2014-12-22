<?php
include_once("usuario.php");

class GestionBases {

    private $dB = 'baseiu';
    private $user = 'iu';
    private $password = 'iu';
    private $host = 'localhost';

    function __construct() {
        $this->db = 'baseiu';
        $this->user = 'iu';
        $this->password = 'iu';
        $this->host = 'localhost';
    }

    function conect() {
        //Se conecta a una base datos
        $conection = mysql_connect($this->host, $this->user, $this->password);
        $conectionDB = mysql_select_db($this->db);
        if (!$conection)
            return $conection;
        else
            return $conectionDB;
    }

    function updateTarea($t) {
        //Actualiza una tarea
        $this->conect();
        $sql = "UPDATE TAREA SET 
         nom='$t->nombre',
         des='$t->descripcion',
         ter=$t->terminada,
         pri='$t->prioridad',
         fecini='$t->fechaInicio',
         fecfin='$t->fechaFin',
         horasi='$t->horasAsignadas',
         cor='$t->correoAdministrador'  
         WHERE codtar ='$t->codigoTarea'";
        print($sql);
        return mysql_query($sql);
    }

    function setTareaAsTerminada($t) {
        //Actualiza una tarea
        $this->conect();
        $sql = "UPDATE TAREA SET 
         ter=1
         WHERE codtar =$t->codigoTarea";
        print($sql);
        return mysql_query($sql);
    }

    function deleteTarea($t) {
        //Elimina una tarea de la base de datos
        $this->conect();
        $sql = "DELETE FROM `TAREA` WHERE `codtar`='$t->codigoTarea'";
        print($sql);
        return mysql_query($sql);
    }

    function insertTarea($t) {
        echo "test";
        //Inserta una Tarea
        $this->conect();
        $codigotarea = mysql_query("SELECT MAX(codtar) FROM TAREA");
        $codigotarea = mysql_fetch_array($codigotarea);
        $codigotarea = $codigotarea[0];
        $codigotarea++;
        $sql = "INSERT INTO `TAREA`(`codtar`, `nom`, `des`, `ter`, `pri`, `fecini`, `fecfin`, `horasi`, `cor`) 
        VALUES ('$codigotarea','$t->nombre','$t->descripcion','$t->terminada','$t->prioridad','$t->fechaInicio','$t->fechaFin','$t->horasAsignadas','$t->correoAdministrador')";
        print($sql);
        return mysql_query($sql);
    }

    function listarTareas() {
        //Esta funcion devuelve un array asociativo de todas las tareas
        $this->conect();
        $sql = "SELECT * FROM `TAREA`";
        $result = mysql_query($sql);

        while ($tuplas = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $toRet[$tuplas["codtar"]] = $tuplas;
        }

        return $toRet;
    }

    function updateUsuario($u) {
        //Actualiza un Usuario
        $this->conect();
        $sql = "UPDATE USUARIO SET 
         nom='$u->nombre',
         priape='$u->primerApellido',
         segape='$u->segundoApellido',
         con='$u->contrasena',
         codtipusu='$u->codigoTipoUsuario'
         WHERE cor='$u->correo'";
        print($sql);
        return mysql_query($sql);
    }

    function deleteUsuario($u) {
        //Elimina un usaurio
        $this->conect();
        $sql = "DELETE FROM `USUARIO` WHERE `cor`= '$u'";
        print($sql);
        return mysql_query($sql);
    }

    function insertUsuario($u) {
        //Inserta un usuario
        $this->conect();
        $sql = "INSERT INTO `USUARIO`(`cor`, `nom`, `priape`, `segape`, `con`, `codtipusu`) 
        VALUES ('$u->correo','$u->nombre','$u->primerApellido','$u->segundoApellido','$u->contrasena','$u->codigoTipoUsuario')";
        print($sql);
        return mysql_query($sql);
    }

    function listarUsuarios() {
        //Lista todos los usuarios
        $this->conect();
        //Esta funcion devuelve un array asociativo de todos los usuarios
        $sql = "SELECT * FROM `USUARIO`";
        //print($sql);
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $toRet[$linea["cor"]] = new Usuario($linea["cor"], $linea["nom"], $linea["priape"], $linea["segape"], $linea["codtipusu"], "", $linea["con"]);
        }

        return $toRet;
    }

    function listarTareasPorUsuario() {
        $this->conect();
        //Retorna un array asociativo con nom,priape,TAREA, codtar indicando cada tarea que tiene asigando que usuario
        $sql = "SELECT USUARIO.`nom`, USUARIO.`priape`, TAREA.`nom` AS TAREA, TAREA.`codtar` 
         FROM TAREA, USUARIO, ASIGNADO 
         WHERE USUARIO.`cor`=ASIGNADO.`cor` AND TAREA.`codtar`=ASIGNADO.`codtar`";
        $result = mysql_query($sql);
        while ($linea = mysql_fetch_array($result, MYSQL_ASSOC)) {
            $toRet[$linea["codtar"]] = $linea;
        }
        return $toRet;
    }

    function insertArchivo($a) {
        //Inserta un archivo en la BDD
        $this->conect();
        $sql = "INSERT INTO `ARCHIVO` (`nom`, `codarc`,`codtar`,`cor`, `rut`) VALUES ('$a->nombre', '$a->codigoArchivo', '$a->codigoTarea', '$a->correo', '$a->ruta')";
        print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    function listarArchivosPorTarea($t) {
        //Lista los archivos por Tarea en un array asociativo, para mas informacion de los campos para acceder, ver el diseño de la BD
        conect();
        $sql = "SELECT * FROM  `ASIGNADO` WHERE  `codtar` ='$t->codigoTarea'";
        print($sql);
        $result = mysql_query($sql);
        $array = mysql_fetch_array($result, MYSQL_ASSOC);
        return $array;
    }

    function loguear($mail, $pass) {
        $this->conect();
        //Esta funcion retornara 
        //-1 si la contraseña es incorrecta
        //-2 si no existe el correo, 
        //0 si es un administrador 
        //1 si es un usuario normal
        $sql = "SELECT * FROM USUARIO WHERE cor='$mail'";
        $result = mysql_query($sql);
        if (!$result) {
            //No existe el usuario, si result es falso es que el correo no existe
            return -2;
        } else {
            $array = mysql_fetch_array($result, MYSQL_ASSOC);
            if ($pass == $array["con"])
                return $array["codtipusu"];
            else
                return -1;
        }
    }

    function asignarTarea($u, $t, $horasAsignadas) {
        //Asigna a un usuario una tarea con sus correspondientes horas para realizarla y establece que las horasEmpleadas son 0.
        $this->conect();
        $sql = "INSERT INTO `ASIGNADO`(`cor`, `codtar`, `horusu`, `hortra`, `ter`) VALUES ($u->correo,$u->codigoTarea,$horasAsignadas,0,0)";
        print($sql);
        $result = mysql_query($sql);
        if (!$result)
            return mysql_error();
        else
            return true;
    }

    function finalizarTarea($u, $t, $horasEmpleadas) {
        //Termina la tarea para este usuario, luego recorre a ver si todos los usuarios asignados a esta tarea ya lo terminaron, ç
        //de ser asi marca como finalizada la tarea
        $this->conect();
        $sql = "UPDATE `ASIGNADO` SET `hortra`=$horasEmpleadas,`ter`=1 WHERE `codtar`='$t->codigoTarea' AND `cor`='$u->correo'";
        print($sql);
        $consult = mysql_query($sql);
        if (!$consult)
            return false;
        $sql = "SELECT c1.total - c2.terminados AS porTerminar FROM
            (SELECT COUNT(*) AS total FROM ASIGNADO WHERE `codtar`='$t->codigoTarea') AS c1,
            (SELECT COUNT(*) AS terminados FROM ASIGNADO WHERE `codtar`='$t->codigoTarea' AND `ter`=1) AS c2";
        print($sql);
        $consult = mysql_query($sql);
        $array = mysql_fetch_array($consult);
        if ($array["porTerminar"] == 0) {
            //MARCAR LA TAREA COMO TERMINADA
            $sql = "UPDATE `TAREA` SET `ter`=1 WHERE `codtar`='$t->codigoTarea'";
            print($sql);
            return mysql_query($sql);
        }
        return true;
    }

    function usuarioSegunCorreo($correo) {
        //Retorna un usuario segun el correo, o una cadena de "El correo no existe" en caso contrario
        $this->conect();
        $sql = "SELECT * FROM `USUARIO` WHERE `cor`='$correo'";
        $result = mysql_query($sql);
        $array = mysql_fetch_array($result, MYSQL_ASSOC);
        if (!$array) {
            return "El correo no existe";
        } else {
            return new Usuario($array["cor"], $array["nom"], $array["priape"], $array["segape"], $array["codtipusu"], $array["respreseg"]);
        }
    }

    function subirArchivo($ruta, $codTar, $nomArch, $usu) {
        $this->conect();
        $codnuevo = mysql_query("SELECT MAX(codarc) FROM `ARCHIVO`");
        $codnuevo = mysql_fetch_array($codnuevo);
        $codnuevo = $codnuevo[0];
        $codnuevo++;
        $sql = "INSERT INTO `ARCHIVO`(`nom`, `codarc`, `codtar`, `cor`, `rut`) VALUES ('$nomArch','$codnuevo','$codTar','$usu','$ruta')";
        echo $sql;
        return mysql_query($sql);
    }

}

?>