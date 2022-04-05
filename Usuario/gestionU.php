<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
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

    <body style="background-color: #939493">
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
                        <?php
                        if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
                        ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Gestiones
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="../Cliente/gestionC.php">Gestión clientes</a></li>
                                    <li><a class="dropdown-item" href="../Empleado/gestionE.php">Gestión Empleado</a></li>
                                    <li><a class="dropdown-item active" href="#">Gestión Usuario</a></li>
                                    <li><a class="dropdown-item" href="../Cargo/gestionCg.php">Gestión Cargo</a></li>
                                    <li><a class="dropdown-item" href="../dias/gestionD.php">Gestión Días</a></li>
                                    <li><a class="dropdown-item" href="../horas/gestionH.php">Gestión Horas</a></li>
                                    <li><a class="dropdown-item" href="../roles/gestionR.php">Gestión Roles</a></li>
                                    <li><a class="dropdown-item" href="../servicios/gestionS.php">Gestión Servicios</a></li>
                                    <li><a class="dropdown-item" href="../citas/gestionCi.php">Gestión Citas</a></li>
                                </ul>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <a type="button" class="btn btn-outline-danger" href="../logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>

        <div class="posicion">
            <br>
            <div class="container">
                <div class="card-header ">
                    <br>
                    <h3 class="text-white">GESTIÓN USUARIO</h3>
                </div>

                <form action="./gestionU.php" method="POST" class="centrar">
                    <div class="btn-group btn-group-lg" role="group" aria-label="...">
                        <button type="submit" name="admin" class="btn btn-outline-dark">Administradores</button>
                        <button type="submit" name="cliente" class="btn btn-outline-dark">Clientes</button>
                        <button type="submit" name="empleado" class="btn btn-outline-dark">Empleados</button>
                    </div>
                </form>
                <?php
                //crear el objeto de tipo Usuario
                include("../Class/class_Usuario.php");

                if (isset($_POST['admin'])) {
                    $us = new Usuario();
                    $reg = $us->Mostrar(1);
                ?>
                    <br>
                    <div class="card-footer">
                        <table class="table table-dark table-striped centrar" style="width: 400px;margin: 0 auto;">
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
                        <table class="table table-dark table-striped centrar" style="width: 500px;margin: 0 auto;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Cedula</th>
                                    <th>Acciones</th>
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
                                <td class="col-4">
                                    <button class="btn btn-warning" onclick=window.location="./editarU.php?idUsuario=<?php echo $reg[$i]['idUsuario']; ?>">
                                        <span class="material-icons">mode_edit</span>
                                    </button>

                                </td>
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
                        <table class="table table-dark table-striped centrar" style="width: 500px;margin: 0 auto;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Cedula</th>
                                    <th>Acciones</th>
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
                                <td class="col-4">
                                    <button class="btn btn-warning" onclick=window.location="./editarU.php?idUsuario=<?php echo $reg[$i]['idUsuario']; ?>">
                                        <span class="material-icons">mode_edit</span>
                                    </button>

                                </td>
                                </tr>
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



        <footer class="bg bg-dark text-white ">
            <div class="centrar">
                <address>
                    <h3>Galfersh Barber</h3>
                    <p> <span class="oi oi-home footer-address-icon"></span>Cra 34 #43-44</p>
                    <p><span class="oi oi-phone footer-address-icon"></span>34322123</p>
                    <p><span class="oi oi-inbox footer-address-icon"></span>galfersh@gmail.com</p>
                </address>
            </div>
        </footer>
    </body>

    </html>
<?php
} else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 3 || $_SESSION['rol'] == 2) {
    echo "
    <script type='text/javascript'>
    alert('Acceso denegado');
    window.location ='../Home.php';
    </script>
";
} else if ($_SESSION['usuario'] == null) {
    echo "
    <script type='text/javascript'>
    alert('Por favor acceder como administrador');
    window.location ='../Home.php';
    </script>
";
}
?>