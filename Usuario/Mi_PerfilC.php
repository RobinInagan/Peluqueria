<?php
include("../Class/class_Cliente.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

$cli = new Cliente();

if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $cli->editarperfil($_POST['id'], $_POST['nom_c'], $_POST['apel_c'], $_POST['email_c'], $_POST['fecha_c']);
    exit();
}

if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
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
                    </li>
                    <?php
                    if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../about.php">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./Mi_PerfilC.php">Mi Perfil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../citas/gestionCi.php">Mis Citas</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <?php
                if (!isset($_SESSION['usuario'])) {
                    echo "<a type='button' class='btn btn-outline-success' href='../Login.php'>Acceder</a>";
                }
                if ($_SESSION['usuario']) {
                    echo "<a type='button' class='btn btn-outline-danger' href='../logout.php'>Cerrar Sesión</a>";
                }
                ?>
            </div>
        </div>
    </nav>
    <div class="posicion">
        <div class="container">
            <div class="card-header ">
                <br>
                <h3 class="text-white">ACTUALIZACIÓN DE MI PERFIL</h3>
            </div>
            <div class=" card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form name="form" action="./Mi_Perfil.php" method="POST">
                            <?php
                            $con = new Conexion();
                            $link = $con->Conectar();
                            $sql = "SELECT * FROM cliente INNER JOIN usuario ON cliente.idCliente = usuario.Cliente_idCliente WHERE usuario.Usuario = '" . $_SESSION['usuario'] . "'";
                            $res = mysqli_query($link, $sql);
                            $row = mysqli_fetch_array($res);
                            ?>
                            <input type="hidden" name="grabar" value="si">
                            <label for="idCliente">Cedula</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $row['idCliente'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nom_e">Nombre</label>
                        <input type="text" id="nom_c" name="nom_c" class="form-control" value="<?php echo $row['nombres'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="apel_e">Apellidos</label>
                        <input type="text" id="apel_c" name="apel_c" class="form-control" value="<?php echo $row['Apellidos'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="email_e">Correo</label>
                        <input type="text" id="email_c" name="email_c" class="form-control" value="<?php echo $row['Correo'] ?>">
                    </div>

                    <div class="col-md-4">
                        <label for="fecha_e">Fecha de Nacimiento</label>
                        <input type="date" id="fecha_c" name="fecha_c" class="form-control" value="<?php echo $row['Fecha_N'] ?>">
                    </div>
                    <br><br><br>
                    <div class="col-md-12 centrar">
                        <input type="button" value="Volver" class="btn btn-dark" title="Volver" onclick="window.location='../Home.php'">
                        <input type="submit" value="Editar" class="btn btn-dark" title="Editar">
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <footer class="bg bg-dark text-white fixed-bottom" style="margin-top: 30px;">
        <div class="centrar">
            <address>
                <h3>Galfersh Barber</h3>
                <p> <span class="oi oi-home footer-address-icon"></span>Calle 27sur 12g-24</p>
                <p><span class="oi oi-phone footer-address-icon"></span>3153242040</p>
                <p><span class="oi oi-inbox footer-address-icon"></span>Galfershbarber@gmail.com</p>
            </address>
        </div>
    </footer>

    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
<?php
} else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1 || $_SESSION['rol'] == 3) {
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