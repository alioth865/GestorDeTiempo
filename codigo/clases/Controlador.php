<?php

class Controlador {

    function loguear($correo, $contrasena) {
        $c = new GestorBaseDatos();
        return $c->loguear($correo, $contrasena);
    }
    
    function listarUsuarios() {
        $c = new GestorBaseDatos();
        $listUs = $c->listarUsuarios(); //Devolve unha lista de usuarios
        return $listUs;
    }

}
