<?php
include("../Class/class_dias.php");

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
        <!-- Link para animation -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
        
        <title>Días</title>
        
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
                        <?php
                        if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
                        ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../Cliente/gestionC.php">Gestión clientes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Empleado/gestionE.php">Gestión Empleado</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Usuario/gestionU.php">Gestión Usuario</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="../Cargo/gestionCg.php">Gestión Cargo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Gestión Días</a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <a type="button" class="btn btn-outline-danger" href="../logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>

        <div class="container posicion-footer">
            <?php
            //crear el objeto de tipo cliente

            $dia = new dias();
            $reg = $dia->Mostrar();

            ?>

            <div class="posicion">
                <div class="card-footer table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id Día</th>
                                <th>Día</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php
                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['iddias'] . "</td>";
                            echo "<td>" . $reg[$i]['dia'] . "</td>";
                        ?>
                            <td class="col-2">
                                <button class="btn btn-warning" onclick=window.location="./editarD.php?iddia=<?php echo $reg[$i]['iddias']; ?>">
                                    <span class="material-icons">mode_edit</span>
                                </button>
                                <button class="btn btn-danger" onclick="eliminar('eliminarD.php?iddia=<?php echo $reg[$i]['iddias']; ?>')">
                                    <span class="material-icons">delete_sweep </span>
                                </button>
                            </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="container">
                        <div class=" card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <form name="form" action="./insertD.php" method="POST">
                                        <input class="form-control" type="number" name="id" value="" min="0" placeholder="ID Cargo">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" id="desc" name="dia" class="form-control" placeholder="Día" Required>
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

        <script src="../jquery/jquery-3.6.0.min.js"></script>
        <script src="../sw/dist/sweetalert2.all.min.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
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
}
?>