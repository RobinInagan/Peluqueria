<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>About Us</title>
</head>

<body>
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
                        <a class="nav-link " aria-current="page" href="./Home.php">Home</a>
                    </li>
                    <?php
                    if ($_SESSION['usuario'] == null && $_SESSION['rol'] == NULL) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Sobre Nosotros</a>
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
                    <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Mi_Perfil.php">Mi Perfil</a>
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
    <div class="container posicion">
        <div class="row">
            <div class="col-md-5">
                <h1>Galfersh Barber</h1>
                <p>Lorem aute commodo eiusmod sit proident dolor occaecat dolor cillum
                    anim ullamco. Ut officia officia laborum consequat fugiat ullamco proident
                    nostrud fugiat labore. Consectetur sunt et sint culpa mollit aute nulla.
                    Qui esse laboris ad magna nulla consequat aliquip proident ad.
                    Pariatur non labore reprehenderit tempor tempor. In ea enim nostrud voluptate.
                    Cupidatat ullamco proident anim dolor irure.
                </p>
                <p>Non ut sint ipsum pariatur exercitation excepteur voluptate elit ut.
                    Quis labore do nisi nostrud nisi tempor. Laborum id sunt magna occaecat cillum
                    irure incididunt ut nisi pariatur ipsum excepteur aliquip.</p>
            </div>
            <div class="col-md-7">
                <img style="height: 400px; width: 100%;" src="./Images/local3.jpeg" alt="Local">
            </div>
            <div style="margin-top: 25px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5624.43371370802!2d-74.15680541075233!3d4.580514819798787!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9f1aa7475d81%3A0x6f28a2ff1bedb5!2sUniversidad%20Distrital%20Francisco%20Jos%C3%A9%20De%20Caldas%20Facultad%20Tecnol%C3%B3gica!5e0!3m2!1ses!2sco!4v1648919038133!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <footer class="bg bg-dark text-white">
        <div class="centrar">
            <address>
                <h3>Galfersh Barber</h3>
                <p> <span class="oi oi-home footer-address-icon"></span>Cra 34 #43-44</p>
                <p><span class="oi oi-phone footer-address-icon"></span>34322123</p>
                <p><span class="oi oi-inbox footer-address-icon"></span>galfersh@gmail.com</p>
            </address>
        </div>
    </footer>

    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>