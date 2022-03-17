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
    <!-- Link para animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script type="text/javascript" language="javascript" src="../JavasScript/Funciones.js"></script>
    <title>Gestión Empleados</title>
</head>

<body>
    <?php

    include("../Conexion/Conexion.php");

    //clase empleado 
    class Cliente
    {
        private $cliente;

        public function __construct()
        {
            $this->cliente = array();
        }

        //mostar Empleados

        public function Mostrar()
        {
            $sql = "select c.idCliente, c.nombres, c.Apellidos, c.Correo, c.Fecha_N, t.numero from cliente c inner join telefonos_c t on idCliente=idCliente_fk";

            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->cliente[] = $row;
            }
            return $this->cliente;
        }

        public function insertar($idC, $nomC, $apelC, $email, $fn, $tel, $user, $pwd)
        {
            $sql = "INSERT INTO `cliente`(`idCliente`, `nombres`, `Apellidos`, `Correo`, `Fecha_N`) VALUES ('$idC','$nomC','$apelC','$email','$fn')";
            $sql2 = "INSERT INTO `telefonos_c`(`idCliente_fk`, `numero`) VALUES ('$idC','$tel')";
            $sql3 = "INSERT INTO `usuario`(`Usuario`, `Contraseña`, `Roles_idRoles`, `Cliente_idCliente`, `Empleado_cedula`) VALUES ('$user','$pwd',2,'$idC',null)";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar");
            $res2 = mysqli_query(Conexion::conectar(), $sql2) or die("Error en la consulta sql al insertar telefono");
            $res3 = mysqli_query(Conexion::conectar(), $sql3) or die("Error en la consulta sql al insertar usuario");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El cliente se registro correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../Login.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($idC, $nomC, $apelC, $email, $fn)
        {
            $sql = "UPDATE `cliente` SET `nombres`='$nomC',`Apellidos`='$apelC',`Correo`='$email',`Fecha_N`='$fn' WHERE `idCliente` ='$idC'";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $idC fue modificado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='gestionC.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function clienteid($id)
        {
            $sql = "select * from `cliente` where `idCliente` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->cliente[] = $reg;
            }
            return $this->cliente;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `cliente` WHERE `cliente`.`idCliente` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El cliente con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='gestionC.php';
                    }
                });
            </script>
        ";
        }
    }
    ?>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>