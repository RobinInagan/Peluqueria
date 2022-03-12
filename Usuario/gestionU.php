<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    -->
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
                <img src="../Images/LogoPequeño.jpg" alt="Logo" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="../Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Cliente/gestionC.php">Gestión clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="../Empleado/gestionE.php">Gestión Empleado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Gestión Usuario</a>
                    </li>
                </ul>
                <a type="button" class="btn btn-outline-danger" >Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="posicion">
        <br>
        <div class="container">
            <form action="./gestionU.php" method="POST" class="centrar">
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <button type="submit" id="admin" name="admin" class="btn btn-outline-dark">Administradores</button>
                    <button type="submit" name="cliente" class="btn btn-outline-dark">Clientes</button>
                    <button type="submit" name="empleado" class="btn btn-outline-dark">Empleados</button>
                </div>
            </form>
            <?php
            //crear el objeto de tipo cliente
            include("../Class/class_Usuario.php");

            if (isset($_POST['admin'])) {
                $us = new Usuario();
                $reg = $us->Mostrar(1);
            ?>
                <br>
                <div class="card-footer">
                    <table class="table table-dark table-striped centrar">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idUsuario'] . "</td>";
                            echo "<td>" . $reg[$i]['Usuario'] . "</td>";
                        ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            <?php

            }

            if (isset($_POST['cliente'])) {
                $us = new Usuario();
                $reg = $us->Mostrar(2);
            ?>
                <br>
                <div class="card-footer">
                    <table class="table table-dark table-striped centrar">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idUsuario'] . "</td>";
                            echo "<td>" . $reg[$i]['Usuario'] . "</td>";
                            echo "<td>" . $reg[$i]['Cliente_idCliente'] . "</td>";
                        ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            <?php

            }
            if (isset($_POST['empleado'])) {
                $us = new Usuario();
                $reg = $us->Mostrar(3);
            ?>
                <br>
                <div class="card-footer">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Usuario</th>
                                <th>Cedula</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idUsuario'] . "</td>";
                            echo "<td>" . $reg[$i]['Usuario'] . "</td>";
                            echo "<td>" . $reg[$i]['Empleado_cedula'] . "</td>";
                        ?>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            <?php
            }

            ?>

        </div>
    </div>



    <footer class="bg bg-dark text-white fixed-bottom">
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
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>