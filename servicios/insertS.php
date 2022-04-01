<?php
session_start();
if (!isset($_SESSION['usuario'])){
    $_SESSION['usuario']=NULL;
    $_SESSION['rol']=NULL;
}

if($_SESSION['usuario'] && $_SESSION['rol'] == 1){

include("../Class/class_servicio.php");
//Crear el objeto 
$servicio = new servicios();

$servicio->insertar($_REQUEST['id'], $_REQUEST['desc'],$_REQUEST['precio'], $_REQUEST['cargo']);


} else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 3 || $_SESSION['rol'] == 2) {
    echo " 
    <script type = 'text/javascript'>
|    Swal.fire({
        title: 'Error!',
        text: 'Usuario no autorizado',
        icon: 'error',
    }).then((result)=>{
            if(result.value){
                window.location ='../Home.php';
            }
        });
    </script>
";
} else if ($_SESSION['usuario'] == null) {
    echo " 
    <script type = 'text/javascript'>
    Swal.fire({
        title: 'Error!',
        text: 'Inicie Sesión como admin',
        icon: 'error',
    }).then((result)=>{
            if(result.value){
                window.location ='../Home.php';
            }
        });
    </script>
";
}
?>