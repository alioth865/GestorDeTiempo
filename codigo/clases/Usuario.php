<?php

class Usuario {

    private $email;
    private $tipousuario;
    private $nombre;
    private $telefono;
    private $contrase�a;
    private $horasdemandadas;
    private $horasofertadas;
    private $valoracion;

    public function __construct($email, $tipousuario, $nombre, $telefono, $contrase�a, $horasdemandadas, $horasofertadas, $valoracion) {
        $this->email = $email;
        $this->tipousuario = $tipousuario;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->contrase�a = $contrase�a;
        $this->horasdemandadas = $horasdemandadas;
        $this->horasofertadas = $horasofertadas;
        $this->valoracion = $valoracion;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setTipoUsuario($tipousuario) {
        $this->tipousuario = $tipousuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setContrase�a($contrase�a) {
        $this->contrase�a = $contrase�a;
    }

    public function setHorasDemandadas($horasdemandadas) {
        $this->horasdemandadas = $horasdemandadas;
    }

    public function setHorasOfertadas($horasofertadas) {
        $this->horasofertadas = $horasofertadas;
    }

    public function setValoracion($valoracion) {
        $this->valoracion = $valoracion;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTipoUsuario() {
        return $this->tipousuario;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getContrase�a() {
        return $this->contrase�a;
    }

    public function getHorasDemandadas() {
        return $this->horasdemandadas;
    }

    public function getHorasOfertadas() {
        return $this->horasofertadas;
    }

    public function getValoracion() {
        return $this->valoracion;
    }

}
