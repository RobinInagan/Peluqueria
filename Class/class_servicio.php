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
    <title>servicios</title>
</head>

<body>
    <?php

    include("../Conexion/Conexion.php");

    //clase servicios 
    class servicios
    {
        private $servicios;

        public function __construct()
        {
            $this->servicios = array();
        }

        //mostar Empleados

        public function Mostrar()
        {
            $sql = "select idServicio,servicio.descripición,precio,cargo.descripcion from servicio inner join cargo on cargo.idcargo=servicio.cargo_idcargo";

            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->servicios[] = $row;
            }
            return $this->servicios;
        }

        public function insertar($id,$desc,$precio,$cargo)
        {
            $sql = "INSERT INTO `servicio`(`idServicio`, `descripición`,precio,cargo_idcargo) VALUES ('$id','$desc','$precio','$cargo')";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar servicios");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El servicio se registro correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../servicios/gestionS.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($id,$desc,$precio,$cargo)
        {
            $sql = "UPDATE `servicio` SET `descripición`='$desc',`precio`='$precio',`cargo_idcargo`='$cargo' WHERE servicio.idServicio= '$id'";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar servicios");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El servicio con id $id fue modificado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../servicios/gestionS.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function serviciosId($id)
        {
            $sql = "select idServicio,servicio.descripición,precio,cargo.idcargo,cargo.descripcion from servicio inner join cargo on cargo.idcargo=servicio.cargo_idcargo
                    where servicio.idServicio=$id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar servicios");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->servicios[] = $reg;
            }
            return $this->servicios;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `servicios` WHERE `servicios`.`idservicios` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar servicios");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'La hora con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../servicios/gestionH.php';
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