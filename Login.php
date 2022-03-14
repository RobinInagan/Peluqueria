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


    <div class="container2">
        <div class="backbox">
            <div class="loginMsg">
                <div class="textcontent">
                    <p class="title">¿No tienes cuenta?</p>
                    <p>Regístrate</p>
                    <button id="switch1">Registrarme</button>
                </div>
            </div>
            <div class="signupMsg visibility">
                <div class="textcontent">
                    <p class="title">¿Ya tienes una cuenta?</p>
                    <p>Entra para ver opciones de la peluquería</p>
                    <button id="switch2">Ingresar</button>
                </div>
            </div>
        </div>
        <!-- backbox -->

        <div class="frontbox">
            <div class="login">
                <h2>Iniciar Sesión</h2>
                <form action="./validar.php" method="POST">
                    <div class="inputbox">
                        <input type="text" name="user" placeholder="  Usuario">
                        <input type="password" name="pwd" placeholder="  Contraseña">
                    </div>
                    <a href="./recuperar.php">¿Olvidaste tu contraseña?</a>
                    <button >Ingresar</button>
                </form>
            </div>

            <div class="signup hide">
                <h2>Registrar</h2>
                <form action="./Cliente/insertC.php" method="POST">
                    <div class="inputbox">
                        <table>
                            <tr>
                                <td>
                                    <input type="text" name="nombre" placeholder="  Nombre">
                                </td>
                                <td>
                                    <input type="text" name="apellido" placeholder="  Apellido">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="cedula" placeholder="  Cédula">
                                </td>
                                <td>
                                    <input type="email" name="correo" placeholder="  Correo">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="usuario" placeholder="  Usuario">
                                </td>
                                <td>
                                    <input type="password" name="passwd" placeholder="  Contraseña">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="number" name="tel" placeholder="  Teléfono">
                                </td>
                                <td>
                                    <input type="date" name="date" placeholder="  Fecha Nacimiento">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <button>Registrarme</button>
                                </div>
                </form>

        </div>
        <!-- frontbox -->
    </div>
    <script src="./jquery/jquery-3.6.0.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script>
        var $loginMsg = $('.loginMsg'),
            $login = $('.login'),
            $signupMsg = $('.signupMsg'),
            $signup = $('.signup'),
            $frontbox = $('.frontbox');

        $('#switch1').on('click', function() {
            $loginMsg.toggleClass("visibility");
            $frontbox.addClass("moving");
            $signupMsg.toggleClass("visibility");

            $signup.toggleClass('hide');
            $login.toggleClass('hide');
        })

        $('#switch2').on('click', function() {
            $loginMsg.toggleClass("visibility");
            $frontbox.removeClass("moving");
            $signupMsg.toggleClass("visibility");

            $signup.toggleClass('hide');
            $login.toggleClass('hide');
        })

    </script>
</body>

</html>