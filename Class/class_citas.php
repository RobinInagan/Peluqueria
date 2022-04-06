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
    <title>Citas</title>
</head>

<body>
    <?php

    include("../Conexion/Conexion.php");

    //clase citas 
    class Citas
    {
        private $citas;

        public function __construct()
        {
            $this->citas = array();
        }

        //mostar Empleados

        public function Mostrar()
        {
            $sql = "select `idcita`, `servicio`.`descripición`, `cliente`.`nombres`, `empleado`.`nombre`, `horas`.`descripcion`, 
            `Fecha_cita`, `estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio = 
            idServicio inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
            Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
            on Estado_cita_idEstado_cita = idEstado_cita";

            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->citas[] = $row;
            }
            return $this->citas;
        }

        public function insertar($serv, $cliente, $emple, $hora, $fecha)
        {
            $sql = "INSERT INTO `citas`(`Servicio_idServicio`, `Cliente_idCliente`, `Empleado_idEmpleado`, `Horas_idHoras`, `Fecha_cita`, `Estado_cita_idEstado_cita`) VALUES ($serv,$cliente,$emple,$hora,'$fecha',1)";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar citas");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'La cita se registró correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../Home.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($id, $servicio,$cliente, $empleado,$hora, $fecha,$estado)
        {
            $sql = "UPDATE `citas` SET `Servicio_idServicio`='$servicio',`Cliente_idCliente`=
            '$cliente',`Empleado_idEmpleado`='$empleado',`Horas_idHoras`='$hora',`Fecha_cita`='$fecha',
            `Estado_cita_idEstado_cita`='$estado' WHERE `citas`.`idcita`=$id";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar citas");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'La cita con id $id fue modificado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../citas/gestionCi.php';
                    }
                });
            </script>
        ";
        }

        public function  cancelarCita($id)
        {
            $sql = "UPDATE `citas` SET `Estado_cita_idEstado_cita`=3 WHERE `citas`.`idcita`=$id";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar citas");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'La cita con id $id fue Cancelada',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../citas/gestionCi.php';
                    }
                });
            </script>
        ";
        }

        public function finalizarCita($id){
            $sql = "UPDATE `citas` SET `Estado_cita_idEstado_cita`=2 WHERE `citas`.`idcita`=$id";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar citas");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'La cita con id $id fue finalizada',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../citas/gestionCi.php';
                    }
                });
            </script>
        ";
        }
        
        //Crear una función para capturar el id de los botones de acción 
        public function citasId($id)
        {
            $sql = "select `idcita`,`servicio`.`idServicio`, `servicio`.`descripición`, `cliente`.`idCliente`, 
            `cliente`.`nombres`, `empleado`.`cedula`, `empleado`.`nombre`, `horas`.`idHoras`, `horas`.`descripcion`, 
            `Fecha_cita`, `estado_cita`.`idEstado_cita`,`estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio = 
            idServicio inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
            Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
            on Estado_cita_idEstado_cita = idEstado_cita where idcita='$id'";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar citas");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->citas[] = $reg;
            }
            return $this->citas;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `citas` WHERE `citas`.`idcitas` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar citas");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El citas con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../citas/gestionCg.php';
                    }
                });
            </script>
        ";
        }


        public function Filtrar($servicio){
            $sql = "select * from empleado inner JOIN cargo ON empleado.cargo_idcargo = cargo.idcargo inner join servicio on servicio.cargo_idcargo = cargo.idcargo where servicio.idServicio = $servicio";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar id cargo");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->citas[] = $reg;
            }
            return $this->citas;
        }

        public function mensual($date){
            $sql = "select `idcita`,`servicio`.`idServicio`, `servicio`.`descripición`, 
            `cliente`.`idCliente`, `cliente`.`nombres`, `empleado`.`cedula`, `empleado`.`nombre`,
             `horas`.`idHoras`, `horas`.`descripcion`, `Fecha_cita`, `estado_cita`.`idEstado_cita`,
             `estado_cita`.`descripciòn` from citas inner join servicio on Servicio_idServicio= idServicio 
             inner join cliente on Cliente_idCliente = idCliente inner join empleado on 
             Empleado_idEmpleado = cedula inner join horas on Horas_idHoras = idHoras inner join estado_cita 
             on Estado_cita_idEstado_cita = idEstado_cita where citas.Fecha_cita LIKE '$date%'ORDER BY citas.Fecha_cita ASC";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar id cargo");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->citas[] = $reg;
            }
            return $this->citas;
        }
    }
    ?>
    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../sw/dist/sweetalert2.all.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>

</body>

</html>