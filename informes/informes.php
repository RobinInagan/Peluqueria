<?php
include("../Class/class_citas.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
?>
    <!doctype html>
    <html lang="es">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS     -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <link rel="stylesheet" language="javascript" href="../bootstrap/css/bootstrap.min.css">

        <!-- Sweet alert-->
        <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">

        <!-- Iconos -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" language="javascript" src="../JavasScript/Funciones.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Outfit:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
        <!-- CSS -->
        <link rel="stylesheet" href="../CSS/Style.css">

        <title>Galfersh Barber</title>
        <link rel="icon" type="image/x-icon" href="../Images/Logo.jpg">
    </head>

    <body>
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Home.php">
                    <img src="../Images/LogoPequeño.jpg" alt="" width="100" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../Home.php">Home</a>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestiones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="../Cliente/gestionC.php">Gestión clientes</a></li>
                                <li><a class="dropdown-item" href="../Empleado/gestionE.php">Gestión Empleado</a></li>
                                <li><a class="dropdown-item" href="../Usuario/gestionU.php">Gestión Usuario</a></li>
                                <li><a class="dropdown-item" href="../Cargo/gestionCg.php">Gestión Cargo</a></li>
                                <li><a class="dropdown-item" href="../dias/gestionD.php">Gestión Días</a></li>
                                <li><a class="dropdown-item" href="../horas/gestionH.php">Gestión Horas</a></li>
                                <li><a class="dropdown-item" href="../roles/gestionR.php">Gestión Roles</a></li>
                                <li><a class="dropdown-item" href="../servicios/gestionS.php">Gestión Servicios</a></li>
                                <li><a class="dropdown-item" href="../citas/gestionCi.php">Gestión Citas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Informes</a>
                        </li>
                    </ul>
                    <a type="button" class="btn btn-outline-danger" href="../logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>

        <div class="container posicion">
            <div class="row row-cols-1 row-cols-sm-3 g-4">
                <div class="col">
                    <div class="card">
                        <a data-bs-toggle="collapse" data-bs-placement="top" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                            <img src="../Images/Logo.jpg" class="card-img-top" alt="Barberia" data-bs-toggle="tooltip" data-bs-placement="top" title="Click aquí">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Informe Mensual</h5>
                            <div class="collapse" id="collapse1">
                                <div class="card card-body centrar">
                                    <form action="./mensual.php" method="POST">
                                        <input type="submit" class="btn btn-dark " value="Ver informe">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <a data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                            <img src="../Images/Logo.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Click aquí">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Informe Cliente</h5>
                            <div class="collapse" id="collapse2">
                                <div class="card card-body centrar">
                                    <form action="./infocliente.php" method="POST">
                                        <input type="submit" class="btn btn-dark" value="Ver informe">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <a data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                            <img src="../Images/Logo.jpg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Click aquí">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Informe Empleado</h5>
                            <div class="collapse" id="collapse3">
                                <div class="card card-body centrar">
                                    <form action="./infoemple.php" method="POST">
                                        <input type="submit" class="btn btn-dark" value="Ver informe">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer class="bg bg-dark text-white" style="margin-top: 30px;">
            <div class="centrar">
                <address>
                    <h3>Galfersh Barber</h3>
                    <p> <span class="oi oi-home footer-address-icon"></span>Calle 27sur 12g-24</p>
                    <p><span class="oi oi-phone footer-address-icon"></span>3153242040</p>
                    <p><span class="oi oi-inbox footer-address-icon"></span>Galfershbarber@gmail.com</p>
                </address>
            </div>
        </footer>
    </body>

    </html>
<?php
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