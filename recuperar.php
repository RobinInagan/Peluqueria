<?php
include('./Conexion/Conexion.php');
?>
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 
    <link rel="stylesheet" language="javascript" href="./bootstrap/css/bootstrap.min.css">

    <!-- Sweet alert-->
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&family=Outfit:wght@300&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <!-- Iconos -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script type="text/javascript" language="javascript" src="./JavasScript/login.js"></script>
    <link rel="stylesheet" href="./CSS/Style.css">

    <title>Galfersh Barber</title>
    <link rel="icon" type="image/x-icon" href="./Images/Logo.jpg">
</head>

<body>
    <div class="container position-absolute top-50 start-50 translate-middle" style="width: 600px; margin:auto;border-radius: 5px;background:white;">
        <table class="table table-borderless">
            <div class="card-body">
                <h2 class="Centrar">Recuperar contraseña</h2>
                <hr>
                <form action="#" method="POST">
                    <tr>
                        <td  class="align-baseline"> 
                        <label for="Mail">Correo</label>
                            <input class="form-control" type="email" name="user" >
                        </td>
                        <td  class="align-baseline">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="rol">
                                <option>---Seleccione rol----</option>
                                <?php
                                $con = new Conexion();
                                $link = $con->Conectar();
                                $sql = "select * from roles";
                                $res = mysqli_query($link, $sql);
                                while ($row = mysqli_fetch_array($res)) {
                                    echo "<option value='" . $row['idRoles'] . "'>" . $row['Rol'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-bottom">
                            <div class="col-md-4">
                                <button class="btn btn-success" name="correo">Enviar</button>
                            </div>
                        </td>
                    </tr>
                </form>
        </table>

    </div>
    </div>
    <script src="./jquery/jquery-3.6.0.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<?php
if (isset($_POST['correo'])) {

    $correo = $_POST['user'];

    if ($_POST['rol'] == 2) {
        $queryusuario     = mysqli_query(Conexion::Conectar(), "SELECT Correo,Contraseña FROM cliente inner join usuario on Cliente_idCliente
        =idCliente where Correo = '$correo'");
    }
    if ($_POST['rol'] == 3) {
        $queryusuario     = mysqli_query(Conexion::Conectar(), "SELECT Correo,Contraseña FROM empleado  inner join usuario on Empleado_cedula=cedula WHERE Correo = '$correo'");
    }

    $nr             = mysqli_num_rows($queryusuario);
    if ($nr == 1) {
        $mostrar        = mysqli_fetch_array($queryusuario);
        $enviarpass     = $mostrar['Contraseña'];

        $paracorreo         = $correo;
        $titulo                = "Recuperar contraseña";
        $mensaje            = "tu contraseña para ingresar es: " . $enviarpass;
        $tucorreo            = "From: natdan712@gmail.com";

        if (mail($paracorreo, $titulo, $mensaje, $tucorreo)) {
            echo "<script> alert('Contraseña enviada');window.location= './Login.php' </script>";
        } else {
            echo "<script> alert('Error');window.location= './Login.php' </script>";
        }
    } else {
        echo "<script> alert('Este correo no existe');window.location= './Login.php' </script>";
    }
    /*VaidrollTeam*/
}

?>