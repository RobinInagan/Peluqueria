<?php
include("../Class/class_citas.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

if ($_SESSION['usuario'] && $_SESSION['rol'] == 2) {
?>
    <!doctype html>
    <html lang="es">

    <html>

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
                    <h3 class="text-white">AGENDAMIENTO DE CITAS</h3>
                </div>
                <form action="insertci.php" method="POST">
                    <div class=" card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <label for="nom_e">Servicio</label>
                                <?php 
                                    $con = new Conexion();
                                    $link = $con->Conectar();
                                    $sql1 = "select * from servicio where idServicio = ".$_POST['servicioo']."";
                                    $res1 = mysqli_query($link, $sql1);
                                    $row1 = mysqli_fetch_array($res1);
                                ?>
                                <input type="text" id="servicio" name="servicio" class="form-control" value="<?php echo $row1['descripición'] ?>" readonly>
                                <input type='hidden' name='servicio2' value="<?php echo $_POST['servicioo']?>">
                            </div>
                            <div class="col-md-5">
                                <label for="dir_e">Fecha Cita</label>
                                <input type="date" id="dir_e" name="fecha" class="form-control" value="<?php echo $_POST['fecha'] ?>" readonly>
                                
                            </div>
                            <div class="col-md-5">
                                <label for="email_e">Empleado</label>
                                <?php 
                                    $con = new Conexion();
                                    $link = $con->Conectar();
                                    $sql = "select * from empleado where cedula = ".$_POST['empleado']."";
                                    $res = mysqli_query($link, $sql);
                                    $row = mysqli_fetch_array($res);

                                ?>
                                <input type="text" id="emple" name="emple" class="form-control" value="<?php echo "".$row['nombre']." ".$row['Apellidos'].""?>" readonly>    
                                <input type='hidden' name='empleado1' value="<?php echo $_POST['empleado']?>">
                            </div>
                            <div class="col-md-5">
                                <label>Horas Disponibles</label>
                                <div class="form-group">
                                    <select class="form-select" name="horas" Required>
                                        <option value="">Seleccione Hora</option>
                                        <?php
                                        $fecha = $_POST['fecha'];
                                        // $sql2 = "SELECT * FROM horas WHERE NOT EXISTS(SELECT null FROM citas WHERE Empleado_idEmpleado = ".$_POST['empleado']." and idHoras = 10 and Fecha_cita = '2021-10-13')";
                                        $sql2 = "SELECT * FROM horas where NOT horas.idHoras = EXISTS((SELECT citas.Horas_idHoras from citas where citas.Empleado_idEmpleado = ".$_POST['empleado']." and citas.Fecha_cita = '".$_POST['fecha']."'))";
                                        $res2 = mysqli_query($link, $sql2);
                                        while ($row2 = mysqli_fetch_array($res2)) {
                                            echo "<option value='" . $row2['idHoras'] . "'>" . $row2['descripcion'] . "</option>";
                                        }

                                        ?>
                                    </select>
                                    <?php 
                                        $sql3 = "SELECT usuario.Cliente_idCliente FROM usuario where usuario.Usuario = '".$_SESSION['usuario']."'";
                                        $res3 = mysqli_query($link, $sql3);
                                        $row3 = mysqli_fetch_array($res3);
                                    ?>
                                    <input type='hidden' name='idcliente' value="<?php echo $row3['Cliente_idCliente']?>">
                                </div>
                            </div>
                            
                            <div class="col-md-12 centrar">
                            <br>
                                <input type="button" value="Volver" class="btn btn-dark" title="Volver" onclick="window.location='./citaclientes.php'">
                                <input type="submit" value="Continuar" class="btn btn-dark" title="inserta">
                            </div>
                </form>
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
} else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 3 || $_SESSION['rol'] == 1) {
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