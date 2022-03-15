<?php
include("../Class/class_Cliente.php");
//Crear el objeto 
$cli = new Cliente();
$cli->insertar($_REQUEST['cedula'], $_REQUEST['nombre'], $_REQUEST['apellido'], $_REQUEST['correo'], $_REQUEST['date'],$_REQUEST['tel'], $_REQUEST['usuario'],$_REQUEST['passwd']);
?>  
