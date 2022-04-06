<?php
include("../Class/class_citas.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}
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

    <?php
    if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
    ?>
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
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <li><a class="dropdown-item active" href="#">Gestión Citas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../informes/informes.php">Informes</a>
                        </li>
                    <?php
                            }
                            if ($_SESSION['usuario'] && ($_SESSION['rol'] == 2 || $_SESSION['rol'] == 3)) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Mi_Perfil.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Mis Citas</a>
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
                    <h3 class="text-white">GESTIÓN CITAS</h3>
                </div>
                <?php
                //crear el objeto de tipo citas
                $ci = new citas();
                $reg = $ci->Mostrar();

                ?>
                <div class="card-footer">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Servicio</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Hora</th>
                                <th>Fecha </th>
                                <th>Estado</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idcita'] . "</td>";
                            echo "<td>" . $reg[$i]['descripición'] . "</td>";
                            echo "<td>" . $reg[$i]['nombres'] . "</td>";
                            echo "<td>" . $reg[$i]['nombre'] . "</td>";
                            echo "<td>" . $reg[$i]['descripcion'] . "</td>";
                            echo "<td>" . $reg[$i]['Fecha_cita'] . "</td>";
                            echo "<td>" . $reg[$i]['descripciòn'] . "</td>";
                        ?>
                            <td class="col-2">
                                <button class="btn btn-warning " onclick=window.location="./editarci.php?idcita=<?php echo $reg[$i]['idcita']; ?>">
                                    <span class="material-icons">mode_edit</span>
                                </button>
                                <button class="btn btn-danger" onclick="editar1('editar1.php?id=<?php echo $reg[$i]['idcita']; ?>')">
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
    <?php
    } else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 2) {
    ?>
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
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <li><a class="dropdown-item active" href="#">Gestión Citas</a></li>
                            </ul>
                        </li>
                    <?php
                            }
                            if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Usuario/Mi_PerfilC.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Mis Citas</a>
                        </li>
                    <?php

                            }
                    ?>
                    <?php
                    if ($_SESSION['usuario'] &&  $_SESSION['rol'] == 3) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Usuario/Mi_PerfilE.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Mis Citas</a>
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
                    <h3 class="text-white">GESTIÓN CITAS</h3>
                </div>
                <?php
                //crear el objeto de tipo citas
                $ci = new citas();
                $con = new Conexion();
                $link = $con->Conectar();

                $sql3 = "SELECT usuario.Cliente_idCliente FROM usuario where usuario.Usuario = '" . $_SESSION['usuario'] . "'";
                $res3 = mysqli_query($link, $sql3);
                $row3 = mysqli_fetch_array($res3);

                $sql = "select `idcita`, `servicio`.`descripición`, `cliente`.`nombres`, `empleado`.`nombre`, `horas`.`descripcion`, 
                `Fecha_cita`, `estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio = 
                idServicio inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
                Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
                on Estado_cita_idEstado_cita = idEstado_cita where citas.Cliente_idCliente = " . $row3['Cliente_idCliente'] . "";

                $res = mysqli_query($link, $sql);


                ?>
                <div class="card-footer">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Servicio</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Hora</th>
                                <th>Fecha </th>
                                <th>Estado</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        while ($reg = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>" . $reg['idcita'] . "</td>";
                            echo "<td>" . $reg['descripición'] . "</td>";
                            echo "<td>" . $reg['nombres'] . "</td>";
                            echo "<td>" . $reg['nombre'] . "</td>";
                            echo "<td>" . $reg['descripcion'] . "</td>";
                            echo "<td>" . $reg['Fecha_cita'] . "</td>";
                            echo "<td>" . $reg['descripciòn'] . "</td>";
                        ?>
                            <td class="col-2">
                                <?php
                                if ($reg['descripciòn'] == 'asignada') {
                                ?>

                                    <button class="btn btn-danger" onclick="cancelarcita('editar1.php?id=<?php echo $reg['idcita']; ?>')">
                                        <span class="material-icons">
                                            cancel
                                        </span>
                                    </button>
                                <?php
                                }
                                ?>
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
    <?php
    } else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 3) {
    ?>
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
                                <li><a class="dropdown-item" href="../Cliente/gestionC.php">Gestión clientes</a></li>
                                <li><a class="dropdown-item" href="../Empleado/gestionE.php">Gestión Empleado</a></li>
                                <li><a class="dropdown-item" href="../Usuario/gestionU.php">Gestión Usuario</a></li>
                                <li><a class="dropdown-item" href="../Cargo/gestionCg.php">Gestión Cargo</a></li>
                                <li><a class="dropdown-item" href="../dias/gestionD.php">Gestión Días</a></li>
                                <li><a class="dropdown-item" href="../horas/gestionH.php">Gestión Horas</a></li>
                                <li><a class="dropdown-item" href="../roles/gestionR.php">Gestión Roles</a></li>
                                <li><a class="dropdown-item" href="../servicios/gestionS.php">Gestión Servicios</a></li>
                                <li><a class="dropdown-item" href="#">Gestión Citas</a></li>
                            </ul>
                        </li>
                    <?php
                            }
                            if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Usuario/Mi_PerfilC.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Mis Citas</a>
                        </li>
                    <?php

                            }
                            if ($_SESSION['usuario'] && $_SESSION['rol'] == 3) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Usuario/Mi_PerfilE.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Mis Citas</a>
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
                    <h3 class="text-white">GESTIÓN CITAS</h3>
                </div>
                <?php
                //crear el objeto de tipo citas
                $ci = new citas();
                $con = new Conexion();
                $link = $con->Conectar();

                $sql3 = "SELECT usuario.Empleado_cedula FROM usuario where usuario.Usuario = '" . $_SESSION['usuario'] . "'";
                $res3 = mysqli_query($link, $sql3);
                $row3 = mysqli_fetch_array($res3);

                $sql = "select `idcita`, `servicio`.`descripición`, `cliente`.`nombres`, `empleado`.`nombre`, `horas`.`descripcion`, 
                `Fecha_cita`, `estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio = 
                idServicio inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
                Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
                on Estado_cita_idEstado_cita = idEstado_cita where citas.Empleado_idEmpleado = " . $row3['Empleado_cedula'] . "";

                $res = mysqli_query($link, $sql);


                ?>
                <div class="card-footer">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Servicio</th>
                                <th>Cliente</th>
                                <th>Empleado</th>
                                <th>Hora</th>
                                <th>Fecha </th>
                                <th>Estado</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php

                        //traer datos de la función mostrar.
                        while ($reg = mysqli_fetch_array($res)) {
                            echo "<tr>";
                            echo "<td>" . $reg['idcita'] . "</td>";
                            echo "<td>" . $reg['descripición'] . "</td>";
                            echo "<td>" . $reg['nombres'] . "</td>";
                            echo "<td>" . $reg['nombre'] . "</td>";
                            echo "<td>" . $reg['descripcion'] . "</td>";
                            echo "<td>" . $reg['Fecha_cita'] . "</td>";
                            echo "<td>" . $reg['descripciòn'] . "</td>";
                        ?>
                            <td class="col-2">
                                <?php
                                if ($reg['descripciòn'] == 'asignada') {
                                ?>
                                    <button class="btn btn-success" onclick=window.location="./editar2.php?id=<?php echo $reg['idcita']; ?>">
                                        <span class="material-icons">
                                            done
                                        </span>
                                    </button>
                                    <button class="btn btn-danger" onclick="cancelarcita('editar1.php?id=<?php echo $reg['idcita']; ?>')">
                                        <span class="material-icons">
                                            cancel
                                        </span>
                                    </button>
                                <?php
                                }
                                ?>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
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
    <?php

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
</body>

</html>