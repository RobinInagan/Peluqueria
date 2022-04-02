<?php
include("../Class/class_horas.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 3 || $_SESSION['rol'] == 2) {
    echo " 
    <script type = 'text/javascript'>
    Swal.fire({
        title: 'Error!',
        text: 'Usuario no autorizado',
        icon: 'error',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
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
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
          },
          hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
          }
    }).then((result)=>{
            if(result.value){
                window.location ='../Home.php';
            }
        });
    </script>
";
} else {

?>
    <!doctype html>
    <html lang="es">
    <html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

        <title>Días</title>
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
                            <a class="nav-link active" aria-current="page" href="../Home.php">Home</a>
                        </li>
                        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown2">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="nav2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Gestiones
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="nav2">
                                        <li><a class="dropdown-item" href="../Cliente/gestionC.php">Gestión clientes</a></li>
                                        <li><a class="dropdown-item" href="../Empleado/gestionE.php">Gestión Empleado</a></li>
                                        <li><a class="dropdown-item" href="../Usuario/gestionU.php">Gestión Usuario</a></li>
                                        <li><a class="dropdown-item" href="../Cargo/gestionCg.php">Gestión Cargo</a></li>
                                        <li><a class="dropdown-item" href="../horas/gestionD.php">Gestión Días</a></li>
                                        <li><a class="dropdown-item" href="#">Gestión Horas</a></li>
                                        <li><a class="dropdown-item" href="../roles/gestionR.php">Gestión Roles</a></li>
                                        <li><a class="dropdown-item" href="../servicios/gestionS.php">Gestión Servicios</a></li>
                                        <li><a class="dropdown-item" href="../citas/gestionCi.php">Gestión Citas</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </ul>
                    <a type="button" class="btn btn-outline-danger" href="../logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>


        <div class="container posicion-footer">
            <?php
            //crear el objeto de tipo cliente

            $horas = new horas();
            $reg = $horas->Mostrar();

            ?>
            <div class="posicion">
                <div class="container">
                <div class="card-header ">
                    <br>
                    <h3 class="text-white">GESTIÓN HORAS</h3>
                </div>
                    <div class=" card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <form name="form" action="./insertH.php" method="POST">
                                    <input class="form-control" type="number" name="id" value="" min="0" placeholder="ID Hora">
                            </div>
                            <div class="col-md-5">
                                <input type="text" id="desc" name="horas" class="form-control" placeholder="Hora" Required>
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-success">
                                    <span class="material-icons">add_circle</span>
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-footer table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id Hora</th>
                                <th>Hora</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php
                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idHoras'] . "</td>";
                            echo "<td>" . $reg[$i]['descripcion'] . "</td>";
                        ?>
                            <td class="col-2">
                                <button class="btn btn-warning" onclick=window.location="./editarD.php?idhoras=<?php echo $reg[$i]['idHoras']; ?>">
                                    <span class="material-icons">mode_edit</span>
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
        <footer class="bg bg-dark text-white">
            <div class="row">
                <div class="centrar">
                    <address>
                        <h3>Galfersh Barber</h3>
                        <p> <span class="oi oi-home footer-address-icon"></span>Cra 34 #43-44</p>
                        <p><span class="oi oi-phone footer-address-icon"></span>34322123</p>
                        <p><span class="oi oi-inbox footer-address-icon"></span>galfersh@gmail.com</p>
                    </address>
                </div>
            </div>
        </footer>


    </body>

    </html>

<?php
}
?>