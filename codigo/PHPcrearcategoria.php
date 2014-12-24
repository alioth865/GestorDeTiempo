<?php

include_once './clases/Includephp.php';
session_start();
$nombre = $_POST['nombre'];
$lang=$_GET['lang'];
Controlador::crearCategorias($nombre);
header("Location: gestion_categoria.php?lang=" . $lang);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

