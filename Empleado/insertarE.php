<?php
session_start();
if (!isset($_SESSION['usuario'])){
    $_SESSION['usuario']=NULL;
    $_SESSION['rol']=NULL;
}

if($_SESSION['usuario'] && $_SESSION['rol'] == 1){

include("../Class/class_Empleado.php");
//Crear el objeto 
$emp = new Empleado();

$emp->insertar($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['apell'], $_REQUEST['email'], $_REQUEST['dir'], $_REQUEST['dia'],$_REQUEST['cargo'],$_REQUEST['tel']);


}else if(isset($_SESSION['usuario']) && $_SESSION['rol']==3 || $_SESSION['rol']==2){
    echo "
    <script type='text/javascript'>
    alert('Acceso denegado');
    window.location ='../Home.php';
    </script>
";
}
else if($_SESSION['usuario']==null){
    echo "
    <script type='text/javascript'>
    alert('Por favor acceder como administrador');
    window.location ='../Home.php';
    </script>
";
}
?>  
