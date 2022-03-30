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
    <title>Cargo</title>
</head>

<body>
    <?php

    include("../Conexion/Conexion.php");

    //clase cargo 
    class Cargo
    {
        private $cargo;

        public function __construct()
        {
            $this->cargo = array();
        }

        //mostar Empleados

        public function Mostrar()
        {
            $sql = "select * from cargo";

            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->cargo[] = $row;
            }
            return $this->cargo;
        }

        public function insertar($id, $desc)
        {
            $sql = "INSERT INTO `cargo`(`idcargo`, `descripcion`) VALUES ('$id','$desc')";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar cargo");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El cargo se registro correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../Cargo/gestionCg.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($id, $desc)
        {
            $sql = "UPDATE `cargo` SET `descripcion`='$desc' WHERE `idcargo` ='$id'";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar cargo");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El cargo con id $id fue modificado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../Cargo/gestionCg.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function cargoId($id)
        {
            $sql = "select * from `cargo` where `idcargo` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar cargo");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->cargo[] = $reg;
            }
            return $this->cargo;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `cargo` WHERE `cargo`.`idcargo` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar cargo");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El cargo con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../Cargo/gestionCg.php';
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