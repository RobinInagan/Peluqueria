<?php
include("../Class/class_citas.php");
session_start();
if (!isset($_SESSION['usuario'])) {
    $_SESSION['usuario'] = NULL;
    $_SESSION['rol'] = NULL;
}

if ($_SESSION['usuario'] && $_SESSION['rol'] == 1) {

    $con = new Conexion();
    $link = $con->Conectar();
    $query = $link->query("select `idcita`,`servicio`.`idServicio`, `servicio`.`descripición`, `servicio`.`precio`, 
    `cliente`.`idCliente`, `cliente`.`nombres`, `empleado`.`cedula`, `empleado`.`nombre`,
     `horas`.`idHoras`, `horas`.`descripcion`, `Fecha_cita`, `estado_cita`.`idEstado_cita`,
     `estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio= idServicio 
     inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
     Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
     on Estado_cita_idEstado_cita = idEstado_cita where citas.Empleado_idEmpleado = " . $_POST['empleado'] . " ORDER BY citas.Fecha_cita ASC");
    $citas = array();
    $n = 0;
    while ($r = $query->fetch_object()) {
        $citas[] = $r;
        $n++;
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
        <script src="../jspdf/dist/jspdf.min.js"></script>
        <script src="../JavasScript/jspdf.plugin.autotable.min.js"></script>

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
                        <li class="nav-item">
                            <a class="nav-link active" href="./informes.php">Informes</a>
                        </li>
                    </ul>
                    <a type="button" class="btn btn-outline-danger" href="../logout.php">Cerrar sesión</a>
                </div>
            </div>
        </nav>

        <div class="posicion">
            <div class="container">
                <div class="card-header ">
                    <br>
                    <h3 class="text-white">INFORME EMPLEADO</h3>
                </div>
                <div class=" card-body">
                    <div class="row">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <label for="dir_e"> Informe Empleado</label>
                            <?php
                            $con = new Conexion();
                            $link = $con->Conectar();
                            $sql = "select * from empleado where cedula =" . $_POST['empleado'] . "";
                            $res = mysqli_query($link, $sql);
                            $reg = mysqli_fetch_array($res);
                            ?>

                            <input type="text" id="dir_e" name="empleado1" class="form-control" value="<?php echo "" . $reg['nombre'] . " " . $reg['Apellidos'] . "" ?>" readonly>
                        </div>
                        <br><br><br>
                        <div class="col-md-12 centrar">
                            <a name="volver" class="btn btn-dark" href="./infoemple.php">Volver</a>
                        </div>
                    </div>
                </div>


                <div class="card-footer table-responsive">
                    <div class="card-footer">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Servicio</th>
                                    <th>Cliente</th>
                                    <th>Hora</th>
                                    <th>Precio</th>
                                    <th>Fecha </th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <?php

                            $con = new Conexion();
                            $link = $con->Conectar();
                            $sql1 = "select `idcita`,`servicio`.`idServicio`, `servicio`.`descripición`, `servicio`.`precio`, 
                         `cliente`.`idCliente`, `cliente`.`nombres`, `empleado`.`cedula`, `empleado`.`nombre`,
                          `horas`.`idHoras`, `horas`.`descripcion`, `Fecha_cita`, `estado_cita`.`idEstado_cita`,
                          `estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio= idServicio 
                          inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
                          Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
                          on Estado_cita_idEstado_cita = idEstado_cita where citas.Empleado_idEmpleado = " . $_POST['empleado'] . " ORDER BY citas.Fecha_cita ASC";
                            $res1 = mysqli_query($link, $sql1);


                            //traer datos de la función mostrar.
                            while ($reg = mysqli_fetch_array($res1)) {
                                echo "<tr>";
                                echo "<td>" . $reg['idcita'] . "</td>";
                                echo "<td>" . $reg['descripición'] . "</td>";
                                echo "<td>" . $reg['nombres'] . "</td>";
                                echo "<td>" . $reg['descripcion'] . "</td>";
                                echo "<td>" . $reg['precio'] . "</td>";
                                echo "<td>" . $reg['Fecha_cita'] . "</td>";
                                echo "<td>" . $reg['descripciòn'] . "</td> </tr>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 centrar">
                    <button name="volver" id="GenerarMensual" class="btn btn-dark">Generar PDF</button>
                </div>
                <br>
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
        
        <script>
            $("#GenerarMensual").click(function() {
                var pdf = new jsPDF();
                pdf.text(20, 20, "Informe para Empleado:");

                console.log(1);


                var columns = ["Id", "Servicio", "Cliente", "Hora", "Precio", "Fecha", "Estado"];

                var data = [
                    <?php foreach ($citas as $c) : ?>[<?php echo $c->idcita; ?>, "<?php echo $c->descripición; ?>", "<?php echo $c->nombres; ?>",
                            "<?php echo $c->descripcion; ?>", "<?php echo $c->precio; ?>", "<?php echo $c->Fecha_cita; ?>", "<?php echo $c->descripciòn; ?>"],
                    <?php endforeach; ?>
                ];


                pdf.autoTable(columns, data, {
                    margin: {
                        top: 25
                    }
                });

                pdf.save('InformeEmpleado.pdf');
            });
        </script>
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