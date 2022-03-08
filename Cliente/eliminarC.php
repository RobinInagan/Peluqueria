<?php

include("../Class/class_Cliente.php");

$cli = new Cliente();

$cli->Eliminar($_GET['id']);

?>