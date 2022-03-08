<?php
include("../Class/class_Empleado.php");

$emp = new Empleado();

if (isset($_POST['grabar']) && $_POST['grabar'] == "si") {
    $emp->editar($_POST['id'], $_POST['nombre'], $_POST['apell'], $_POST['email'], $_POST['dir'], $_POST['dia'], $_POST['cargo']);
    exit();
}

$reg = $emp->empleadoId($_GET['idEmpleado']);
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
    <script type="text/javascript" language="javascript" src="js/funciones.js"></script>
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
            <a class="navbar-brand" href="../Home.php">
                <img src="../Images/LogoPequeño.jpg" alt="" width="100" height="100">
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
                        <a class="nav-link active" href="../Cliente/gestionC.php">Gestión clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Empleado/gestionE.php">Gestión Empleado</a>
                    </li>
                </ul>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Login">Acceder</button>
            </div>
        </div>
    </nav>


    <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Login">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Usuario: </label>
                            <input type="text" class="form-control" id="user">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Contraseña:</label>
                            <input type="password" class="form-control" id="paswd">
                        </div>
                    </form>
                </div>
                <div class="modal-footer centrar">
                    <button type="button" class="btn btn btn-success ">Iniciar Sesión</button>
                </div>
                <div class="mb-3 centrar">
                    <a href=" ">Olvido Su Contraseña?</a>
                </div>
                <div class="mb-3 centrar">
                    <a>¿No tiene cuenta aún? Registrese!</a><br>
                    <button type="button" class="btn btn-secondary" data-bs-target="#Registrar" data-bs-toggle="modal" data-bs-dismiss="modal">Registrarse</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Registrar" aria-hidden="true" aria-labelledby="Registrar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="Registrar">Registrarse</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Cédula: </label>
                            <input type="number" class="form-control" id="id_c">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Nombre(s): </label>
                            <input type="text" class="form-control" id="nomb">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Apellidos: </label>
                            <input type="text" class="form-control" id="apel">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Correo: </label>
                            <input type="email" class="form-control" id="mail">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Teléfono: </label>
                            <input type="number" class="form-control" id="tel_u">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Dirección: </label>
                            <input type="text" class="form-control" id="dir">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Fecha de Nacimiento: </label>
                            <input type="date" class="form-control" id="fecha_n">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Usuario: </label>
                            <input type="text" class="form-control" id="user">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Contraseña: </label>
                            <input type="password" class="form-control" id="paswd">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Registrarse</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="posicion">
        <div class="container">
            <div class="card-header ">
                <br>
                <h3 class="text-white">ACTUALIZACIÓN DE EMPLEADOS</h3>
            </div>
            <div class=" card-body">
                <div class="row">
                    <div class="col-md-4">
                        <form name="form" action="editarE.php" method="POST">
                            <input type="hidden" name="grabar" value="si">
                            <label for="idEmpleado">Cedula</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $_GET['idEmpleado'] ?>" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="nom_e">Nombre</label>
                        <input type="text" id="nom_c" name="nombre" class="form-control" value="<?php echo $reg[0]['nombre'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="apel_e">Apellidos</label>
                        <input type="text" id="apel_c" name="apell" class="form-control" value="<?php echo $reg[0]['Apellidos'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="email_e">Correo</label>
                        <input type="text" id="email_c" name="email" class="form-control" value="<?php echo $reg[0]['Correo'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="dir_e">Dirección</label>
                        <input type="text" id="dir_e" name="dir" class="form-control" value="<?php echo $reg[0]['Dirección'] ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="dias">Dia de Descanso</label>
                        <div class="form-group">
                            <select class="form-select" name="dia">
                                <option value="<?php echo $reg[0]['iddias'] ?>"><?php echo $reg[0]['dia'] ?></option>
                                <?php
                                    $con = new Conexion();
                                    $link = $con->Conectar();
                                    $sql = "select * from dias";
                                    $res = mysqli_query($link, $sql);
                                    while($row = mysqli_fetch_array($res)){
                                        echo "<option value='".$row['iddias']."'>".$row['dia']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="cargo">Cargo</label>
                        <div class="form-group">
                            <select class="form-select" name="cargo">
                                <option value="<?php echo $reg[0]['idcargo'] ?>"><?php echo $reg[0]['descripcion'] ?></option>
                                <?php
                                    $con = new Conexion();
                                    $link = $con->Conectar();
                                    $sql = "select * from cargo";
                                    $res = mysqli_query($link, $sql);
                                    while($row = mysqli_fetch_array($res)){
                                        echo "<option value='".$row['idcargo']."'>".$row['descripcion']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="dir_e">Telefono</label>
                        <input type="text" id="dir_e" name="dir_e" class="form-control" value="<?php echo $reg[0]['numero'] ?>">
                    </div>
                    <br><br><br>
                    <div class="col-md-12 centrar">
                        <input type="button" value="Volver" class="btn btn-dark" title="Volver" onclick="window.location='gestionE.php'">
                        <input type="submit" value="Editar" class="btn btn-dark" title="Editar">
                    </div>
                    </form>
                </div>
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
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>

</html>