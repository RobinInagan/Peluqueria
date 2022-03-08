<?php

include("../Class/class_Empleado.php");

$emp = new Empleado();

$emp->Eliminar($_GET['id']);

?>