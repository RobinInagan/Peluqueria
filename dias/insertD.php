<?php
session_start();
if (!isset($_SESSION['usuario'])){
    $_SESSION['usuario']=NULL;
    $_SESSION['rol']=NULL;
}

if($_SESSION['usuario'] && $_SESSION['rol'] == 1){

include("../Class/class_dias.php");
//Crear el objeto 
$dia = new dias();

$dia->insertar($_REQUEST['id'], $_REQUEST['dia']);


} else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 3 || $_SESSION['rol'] == 2) {
    echo " 
    <script type = 'text/javascript'>
    Swal.fire({
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