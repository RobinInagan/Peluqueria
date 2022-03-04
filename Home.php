<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    -->
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">

    <!-- Sweet alert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">

    <!-- Iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="js/funciones.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/Style.css">

    <title>Galfersh Barber</title>
    <link rel="icon" type="image/x-icon" href="./Images/Logo.jpg">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="./Home.php">
                <img src="./Images/LogoPequeño.jpg" alt="" width="100" height="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
                </ul>
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#Login">Acceder</button>
                <div class="modal fade" id="Login" tabindex="-1" aria-labelledby="Login" aria-hidden="true">
                    <div class="modal-dialog">
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
                                <button type="button" class="btn btn-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Hide this modal and show the first with the button below.
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#Login" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
                            </div>
                        </div>
                    </div>
                </div>
    </nav>
    <div class="p-3 mb-2 centrar">
        <div id="carouselExampleIndicators" class="carousel slide tamanio centrar" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner tamanio centrar">
                <div class="carousel-item active">
                    <img src="./Images/Local.jpeg" class="d-block w-100" alt="..." height="500" width="250">
                </div>
                <div class="carousel-item">
                    <img src="./Images/Local2.jpeg" class="d-block w-100" alt="..." height="500" width="250">
                </div>
                <div class="carousel-item">
                    <img src="./Images/Local3.jpeg" class="d-block w-100" alt="..." height="500" width="250">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <?php
    /*
    //crear el objeto de tipo empleado
    include("./Class/class_Cliente.php");
    include("./Conexion.php");
    $cl = new Cliente();
    $reg = $cl->Mostrar();
    ?>
    <div class="card-footer">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th class="col-2">Acciones</th>
                </tr>
            </thead>
            <?php

            //traer datos de la función mostrar.
            for ($i = 0; $i < count($reg); $i++) {
                echo "<tr>";
                echo "<td>" . $reg[$i]['idCliente'] . "</td>";
                echo "<td>" . $reg[$i]['nombre'] . "</td>";
                echo "<td>" . $reg[$i]['direccion'] . "</td>";
            ?>
                <td>
                    <button class="btn btn-warning" onclick=window.location="./editar.php?id=<?php echo $reg[$i]['idCliente']; ?>">
                        <span class="material-icons">mode_edit</span>
                    </button>
                </td>
                <td>
                <td><button class="btn btn-danger" onclick="eliminar('eliminar.php?id=<?php echo $reg[$i]['idCliente']; ?>')">
                        <span class="material-icons">delete_sweep </span>
                    </button>
                </td>
                </td>
                </tr>
            <?php
            }
            */
    ?>

    </table>

    <script src="./jquery/jquery-3.6.0.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('.carousel').carousel({
                interval: 2000
            });
        });
    </script>
</body>

</html>