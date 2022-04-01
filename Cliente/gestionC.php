<?php
include("../Class/class_Cliente.php");
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
                            <?php
                            if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
                            ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Gestiones
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Gestión clientes</a></li>
                                <li><a class="dropdown-item" href="../Empleado/gestionE.php">Gestión Empleado</a></li>
                                <li><a class="dropdown-item" href="../Usuario/gestionU.php">Gestión Usuario</a></li>
                                <li><a class="dropdown-item" href="../Cargo/gestionCg.php">Gestión Cargo</a></li>
                                <li><a class="dropdown-item" href="../dias/gestionD.php">Gestión Días</a></li>
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
            <div class="container">
                <div class="card-header ">
                    <br>
                    <h3 class="text-white">GESTIÓN CLIENTE</h3>
                </div>
                <?php
                //crear el objeto de tipo cliente
                $cl = new Cliente();
                $reg = $cl->Mostrar();

                ?>
                <div class="card-footer">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Cédula</th>
                                <th>Nombre(s)</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>fecha Nacimiento</th>
                                <th>Telefono</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idCliente'] . "</td>";
                            echo "<td>" . $reg[$i]['nombres'] . "</td>";
                            echo "<td>" . $reg[$i]['Apellidos'] . "</td>";
                            echo "<td>" . $reg[$i]['Correo'] . "</td>";
                            echo "<td>" . $reg[$i]['Fecha_N'] . "</td>";
                            echo "<td>" . $reg[$i]['numero'] . "</td>";
                        ?>
                            <td class="col-2">
                                <button class="btn btn-warning " onclick=window.location="./editarC.php?idCliente=<?php echo $reg[$i]['idCliente']; ?>">
                                    <span class="material-icons">mode_edit</span>
                                </button>
                                <button class="btn btn-danger" onclick="eliminar('eliminarC.php?id=<?php echo $reg[$i]['idCliente']; ?>')">
                                    <span class="material-icons">delete_sweep </span>
                                </button>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
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