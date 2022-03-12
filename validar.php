<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    -->
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">
    <!-- Sweet alert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">

    <!-- Iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
    <title>INICIO DE SESION</title>
</head>

<body onload="limpiar()">
    <?php
    session_start();
    ?>
    <?php
    include("./Conexion/Conexion.php");
    $con = new Conexion();
    $link = $con->Conectar();
    $user = (isset($_POST['user'])) ? $_POST['user'] : '';
    $pwd = (isset($_POST['pwd'])) ? $_POST['pwd'] : '';
    //validar usuario y passwd
    // $sql=" Select u.id_r,r.descripcion as rol  from usuarios u join roles r on u.id_r=r.id_r where usuario='$user' and password='$pwd'";
    $sql = " Select Usuario,Contraseña,Roles_idRoles from usuario where Usuario ='$user' and Contraseña='$pwd'";
    $result = mysqli_query($link, $sql);
    if ($row = mysqli_fetch_array($result)) {
        //crear la variable de sesion del usuario
        $_SESSION['usuario'] = $row['Usuario'];
        $_SESSION['rol'] = $row['Roles_idRoles'];
        echo " 
        <script type = 'text/javascript'>
        Swal.fire({
            title: 'Exito',
            text: 'Bienvenido $user al sistema',
            icon: 'success',
        }).then((result)=>{
                if(result.value){
                    window.location ='Home.php';
                }
            });
        </script>
    ";
    } else {
        $_SESSION['usuario'] = NULL;
        echo " 
        <script type = 'text/javascript'>
        Swal.fire({
            title: 'Error!',
            text: 'Usuario o contraseña incorrectos',
            icon: 'error',
        }).then((result)=>{
                if(result.value){
                    window.location ='Login.php';
                }
            });
        </script>
    ";
    }
    ?>