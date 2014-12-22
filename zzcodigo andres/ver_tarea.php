<?php
include_once 'clases/sistema.php';
include_once 'clases/tarea.php';

//Iniciamos la sesión del usuario para que las variables seas accesibles
session_start();

//Recuperamos el array de tareas que tenemos almacenado en la sesión
$tarea = $_SESSION["arrayTar"];

//Almacena en la sesión un objeto tarea
$_SESSION['objTar'] = new Tarea($tarea["nom"], $tarea["des"], $tarea["ter"], $tarea["pri"], $tarea["fecini"], $tarea["fecfin"], $tarea["horasi"], $tarea["cor"], $tarea["codtar"]);



?>


<!--Se rellena el formulario con los datos de la tarea que queremos ver -->
<div id="vertarea_formulario">
    <form action="finalizartarea.php" enctype="multipart/form-data" method="POST">

        Nombre: <input type='text' value='<?php echo $tarea['nom']; ?>'/><br/>
        Descripcion:<input type='text' value='<?php echo $tarea['des']; ?>'/><br/>
        Prioridad: <input type='number' value='<?php echo $tarea['pri']; ?>'/><br/>
        Fecha Fin: <input type='date' value='<?php echo $tarea['fecfin']; ?>'/><br/>
        Horas:<input type='number' value='<?php echo $tarea['horasi']; ?>'/><br/>
        Horas Dedicadas:<input type='number'/><br/>
        

        <input type="file" name="fichero"/><br/>
        <input type='submit' value='Terminar Tarea'/>


    </form>
</div>