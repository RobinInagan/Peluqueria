<?php
include("../Class/class_servicio.php");

$servicio = new servicios();

if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $servicio->editar($_POST['id'], $_POST['desc'], $_POST['precio'], $_POST['cargo']);
    exit();
}

$reg = $servicio->serviciosId($_GET['idServicio']);

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
        <!-- Link para animation -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <title>Galfersh Barber</title>
        <link rel="icon" type="image/x-icon" href="../Images/Logo.jpg">
    </head>

    <body class="bg-secondary bg-gradient">
        <nav class="navbar navbar-dark bg-dark navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="./Home.php">
                    <img src="../Images/LogoPequeño.jpg" alt="" width="100" height="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../Home.php">Home</a>
                        </li>
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
                                    <li><a class="dropdown-item" href="../servicios/gestionD.php">Gestión Días</a></li>
                                    <li><a class="dropdown-item" href="../horas/gestionH.php">Gestión Horas</a></li>
                                    <li><a class="dropdown-item" href="../roles/gestionR.php">Gestión Roles</a></li>
                                    <li><a class="dropdown-item" href="./servicios/gestionS.php">Gestión Servicios</a></li>
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
            <div class="container">
                <div class="card-header ">
                    <br>
                    <h3 class="text-white">ACTUALIZACIÓN DE SERVICIOS</h3>
                </div>
                <div class=" card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form name="form" action="editarS.php" method="POST">
                                <input type="hidden" name="grabar" value="si">
                                <label for="id">Id</label>
                                <input class="form-control" type="text" name="id" value="<?php echo $_GET['idServicio'] ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="descripcion">Descripción</label>
                            <input type="text" id="desc" name="desc" class="form-control" value="<?php echo $reg[0]['descripición'] ?>" Required>
                        </div>
                        <div class="col-md-6">
                            <label for="precio">Precio</label>
                            <input type="text" id="desc" name="precio" class="form-control" value="<?php echo $reg[0]['precio'] ?>" Required>
                        </div>
                        <div class="col-md-4">
                            <label for="cargo">Cargo</label>
                            <div class="form-group">
                                <select class="form-select" name="cargo" Required>
                                    <option value="<?php echo $reg[0]['idcargo'] ?>"><?php echo $reg[0]['descripcion'] ?></option>
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
                            <input type="button" value="Volver" class="btn btn-dark" title="Volver" onclick="window.location='gestionS.php'">
                            <input type="submit" value="Editar" class="btn btn-dark" title="Editar">
                        </div>
                        </form>
                    </div>
                </div>

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