<?php
include("../Class/class_servicio.php");

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
                                        <li><a class="dropdown-item" href="#">Gestión Días</a></li>
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

            $servicio = new servicios();
            $reg = $servicio->Mostrar();

            ?>

            <div class="posicion">
            <div class="card-header ">
                    <br>
                    <h3 class="text-white">GESTIÓN SERVICIO</h3>
                </div>
                
                <div class=" card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <form name="form" action="./insertS.php" method="POST">
                                <label for="idServicio">ID</label>
                                <input class="form-control" type="number" name="id" value="">
                        </div>
                        <div class="col-md-4">
                            <label for="descripción">descripción</label>
                            <input type="text" id="nom_c" name="desc" class="form-control" Required>
                        </div>
                        <div class="col-md-4">
                            <label for="precio">Precio</label>
                            <input type="text" id="apel_c" name="precio" class="form-control" Required>
                        </div>
                        <div class="col-md-4">
                            <label for="cargo">Cargo</label>
                            <div class="form-group">
                                <select class="form-select" name="cargo" Required>
                                    <option>---Seleccione cargo----</option>
                                    <?php
                                    $con = new Conexion();
                                    $link = $con->Conectar();
                                    $sql = "select * from cargo";
                                    $res = mysqli_query($link, $sql);
                                    while ($row = mysqli_fetch_array($res)) {
                                        echo "<option value='" . $row['idcargo'] . "'>" . $row['descripcion'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="col-md-12 centrar">
                            <input type="reset" value="Limpiar" class="btn btn-dark" title="limpiar">
                            <input type="submit" value="Insertar" class="btn btn-dark" title="insertar">
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Cargo</th>
                                <th class="col-2">Acciones</th>
                            </tr>
                        </thead>
                        <?php
                        //traer datos de la función mostrar.
                        for ($i = 0; $i < count($reg); $i++) {
                            echo "<tr>";
                            echo "<td>" . $reg[$i]['idServicio'] . "</td>";
                            echo "<td>" . $reg[$i]['descripición'] . "</td>";
                            echo "<td>" . $reg[$i]['precio'] . "</td>";
                            echo "<td>" . $reg[$i]['descripcion'] . "</td>";
                            ?>
                            <td class="col-2">
                                <button class="btn btn-warning" onclick=window.location="./editarS.php?idServicio=<?php echo $reg[$i]['idServicio']; ?>">
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