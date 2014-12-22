<?php

include_once("gestionbases.php");

class Sistema {

    function listarTareas($usuario) {
        $c = new GestionBases();
        $resultado = $c->listarTareas(); //devolvera un array con todas las tareas

        foreach ($resultado as $tarea) {
            session_start();
            if ($tarea["cor"] == $_SESSION["objUsu"]->correo) {
                $toRet[$tarea["codtar"]] = $tarea;
            }
        }

        return $toRet; //retorna array
    }

    function listarTodasTareas() {
        $c = new GestionBases();
        $toRet = $c->listarTareas(); //devolvera un array con todas las tareas

        return $toRet; //retorna array
    }

    function listarTareasPorUsuario() {
        $c = new GestionBases();
        $resultado = $c->listarTareasPorUsuario();

        return $resultado; //retorna array
    }

    function altaTarea($tarea) {
        $c = new GestionBases();
        $resultado = $c->insertTarea($tarea);

        return $resultado; //retorna boolean
    }

    function modificarTarea($tarea) {
        $c = new GestionBases();
        $resultado = $c->updateTarea($tarea);

        return $resultado; //retorna boolean
    }

    function bajaTarea($tarea) {
        $c = new GestionBases();
        $resultado = $c->deleteTarea($tarea);

        return $resultado;
    }

    function terminarTarea($t) {
        $c = new GestionBases();
        $resultado = $c->setTareaAsTerminada($t);
        return $resultado;
    }

    function finalizarTarea($u, $t, $horasEmpleadas) {

        $c = new GestionBases();
        $resultado = $c->updateTarea($t);
        return $resultado;
    }

    function asignarTarea($tarea, $usuario, $horas) {

        $resultado = GestionBases::asignarTarea($tarea, $usuario, $horas);

        return $resultado; //retorna boolean
    }

    function recuperarContrasena($respuestaSeguridad, $correo) {
        $usuario = GestionBases::usuarioSegunCorreo($correo);

        if ($usuario['respreseg'] == $respuestaSeguridad) {
            return $usuario['con'];
        } else {
            return "no coinciden";
        }
    }

    function registrarse($usuario) {
        $c = new GestionBases();

        $resultado = $c->insertUsuario($usuario);

        return $resultado;
    }

    function modificarUsuario($u) {
        $c = new GestionBases();
        $modUs = $c->updateUsuario($u); //Devolve un boolean si se modificou correctamente
        return $modUs;
    }

    function bajaUsuario($u) {
        $c = new GestionBases();

        $delUs = $c->deleteUsuario($u); //Devolve un boolean si se eliminou un usuario correctamente
        return $delUs;
    }

    function listarUsuarios() {
        $c = new GestionBases();
        $listUs = $c->listarUsuarios(); //Devolve unha lista de usuarios
        return $listUs;
    }

    function loguear($correo, $contrasena) {
        $c = new GestionBases();
        return $c->loguear($correo, $contrasena);
    }

    function subirArchivo($ruta, $codTar, $nomArch, $usu) {
        $c = new GestionBases();
        return $c->subirArchivo($ruta, $codTar, $nomArch, $usu);
    }

}
