<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

?>
<!doctype html>
<html lang="es">
<html>

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
    <script type="text/javascript" language="javascript" src="./JavasScript/Funciones.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Outfit:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/Style.css">

    <title>Galfersh Barber</title>
    <link rel="icon" type="image/x-icon" href="./Images/Logo.jpg">
</head>

<body onload="limpiar();">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="./Home.php">
                <img src="./Images/LogoPequeño.jpg" alt="" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./Home.php">Home</a>
                    </li>
                    <?php
                    if ($_SESSION['usuario'] == null && $_SESSION['rol'] == NULL) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>

                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
                    ?>
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown2">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="nav2" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                                        Gestiones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="nav2">
                                        <li><a class="dropdown-item" href="./Cliente/gestionC.php">Gestión clientes</a></li>
                                        <li><a class="dropdown-item" href="./Empleado/gestionE.php">Gestión Empleado</a></li>
                                        <li><a class="dropdown-item" href="./Usuario/gestionU.php">Gestión Usuario</a></li>
                                        <li><a class="dropdown-item" href="./Cargo/gestionCg.php">Gestión Cargo</a></li>
                                        <li><a class="dropdown-item" href="./dias/gestionD.php">Gestión Días</a></li>
                                        <li><a class="dropdown-item" href="./horas/gestionH.php">Gestión Horas</a></li>
                                        <li><a class="dropdown-item" href="./roles/gestionR.php">Gestión Roles</a></li>
                                        <li><a class="dropdown-item" href="./servicios/gestionS.php">Gestión Servicios</a></li>
                                        <li><a class="dropdown-item" href="./citas/gestionCi.php">Gestión Citas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="./informes/informes.php">Informes</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Usuario/Mi_PerfilC.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./citas/gestionCi.php">Mis Citas</a>
                        </li>
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['usuario'] && $_SESSION['rol'] == 3) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Usuario/Mi_PerfilE.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./citas/gestionCi.php">Mis Citas</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <?php
                if (!isset($_SESSION['usuario'])) {
                    echo "<a type='button' class='btn btn-outline-success' href='./Login.php'>Acceder</a>";
                }
                if ($_SESSION['usuario']) {
                    echo "<a type='button' class='btn btn-outline-danger' href='./logout.php'>Cerrar Sesión</a>";
                }
                ?>
            </div>
        </div>
    </nav>

    <div class="posicion">
        <div class="container">
            <div class="p-3 mb-2 centrar">
                <div id="carouselExampleIndicators" class="carousel slide tamanio centrar" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner tamanio centrar">
                        <div class="carousel-item active">
                            <img src="./Images/Local.jpeg" class="d-block w-100" alt="..." height="600" width="">
                        </div>
                        <div class="carousel-item">
                            <img src="./Images/Local2.jpeg" class="d-block w-100" alt="..." height="600" width="">
                        </div>
                        <div class="carousel-item">
                            <img src="./Images/Local3.jpeg" class="d-block w-100" alt="..." height="600" width="">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <?php

            if ($_SESSION['usuario'] == null && $_SESSION['rol'] == null) {
                $s = 0;
                $r = 0;
            } else {
                $s = $_SESSION['usuario'];
                $r = $_SESSION['rol'];
            }

            ?>
            <div class="reserva row">
                <div class=" centrarIt col-6">
                    <button class="btn btn-secondary btn-lg" style="color:black;" onclick="verificar('<?php echo $s; ?>','<?php echo $r; ?>');">
                        Reservar
                    </button>
                </div>
                <div class="col-6">
                    <h1>¡Reserva tu cita!</h1>
                    <h5>Para reservar una cita deberás registrarte antes en nuestra aplicación.
                        Podrás elegir el servicio, profesional y horario de tu preferencia.</h5>
                </div>
            </div>

            <h2>Servicios</h2>
            <hr>

            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card">
                        <a data-bs-toggle="collapse" data-bs-placement="top" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                            <img src="./Images/barberia.jpeg" class="card-img-top" alt="Barberia" data-bs-toggle="tooltip" data-bs-placement="top" title="Click aquí">                    
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Barbería</h5>
                            <div class="collapse" id="collapse1">
                                <div class="card card-body">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <a data-bs-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                            <img src="./Images/manicure1.jpeg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Click aquí">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Manicure</h5>
                            <div class="collapse" id="collapse2">
                                <div class="card card-body">
                                    Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <a data-bs-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                            <img src="./Images/tintes.jpeg" class="card-img-top" alt="..." data-bs-toggle="tooltip" data-bs-placement="top" title="Click aquí">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title">Tintes</h5>
                            <div class="collapse" id="collapse3">
                                <div class="card card-body">
                                    No sólo cambiamos el color de tu cabello, sino te ofrecemos la mejor experiencia con los mejores productos y profesionales.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </table>
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

    <script src="./jquery/jquery-3.6.0.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('.carousel').carousel({
                interval: 2000
            });
        });
    </script>
</body>

</html>