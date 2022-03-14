<?php
include("../Class/class_Cliente.php");

$cli = new Cliente();

if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $cli->editar($_POST['id'], $_POST['nom_c'], $_POST['apel_c'], $_POST['email_c'], $_POST['fecha_c']);
    exit();
}

$reg = $cli->clienteid($_GET['idCliente']);

session_start();
if (!isset($_SESSION['usuario'])){
    $_SESSION['usuario']=NULL;
}

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
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                    </li>
                    <?php
                    if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="./Cliente/gestionC.php">Gestión clientes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../Empleado/gestionE.php">Gestión Empleado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Usuario/gestionU.php">Gestión Usuario</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <a type="button" class="btn btn-outline-danger" href="../logout.php" >Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="posicion">
        <div class="container">
            <div class="card-header ">
                <br>
                <h3 class="text-white">ACTUALIZACIÓN DE CLIENTES</h3>
            </div>
            <div class=" card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form name="form" action="editarC.php" method="POST">
                            <input type="hidden" name="grabar" value="si">
                            <label for="idCliente">Cedula</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $_GET['idCliente'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nom_e">Nombre</label>
                        <input type="text" id="nom_c" name="nom_c" class="form-control" value="<?php echo $reg[0]['nombres'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="apel_e">Apellidos</label>
                        <input type="text" id="apel_c" name="apel_c" class="form-control" value="<?php echo $reg[0]['Apellidos'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="email_e">Correo</label>
                        <input type="text" id="email_c" name="email_c" class="form-control" value="<?php echo $reg[0]['Correo'] ?>">
                    </div>

                    <div class="col-md-4">
                        <label for="fecha_e">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_c" name="fecha_c" class="form-control" value="<?php echo $reg[0]['Fecha_N'] ?>">
                    </div>
                    <br><br><br>
                    <div class="col-md-12 centrar">
                        <input type="button" value="Volver" class="btn btn-dark" title="Volver" onclick="window.location='gestionC.php'">
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
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>