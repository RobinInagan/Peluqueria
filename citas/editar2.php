
<?php
session_start();
if (!isset($_SESSION['usuario'])){
    $_SESSION['usuario']=NULL;
    $_SESSION['rol']=NULL;
}

if($_SESSION['usuario'] && $_SESSION['rol'] == 2  || $_SESSION['rol'] == 3){

include("../Class/class_citas.php");
//Crear el objeto 
$cita = new Citas();

$cita->finalizarCita($_REQUEST['id']);


} else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1) {
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