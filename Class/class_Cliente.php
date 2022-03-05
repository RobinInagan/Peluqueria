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
    <script type="text/javascript" language="javascript" src="./js/funciones.js"></script>
    <title>Gestión Empleados</title>
</head>

<body>
    <?php

    //clase empleado 
    class Cliente{
        private $cliente;
        
        public function __construct()
        {
            $this->cliente = array();
        }

        //mostar Empleados

        public function Mostrar (){
            $sql=" Select * from cliente";

            $res = mysqli_query(Conexion::conectar(),$sql);

            while ($row = mysqli_fetch_assoc($res)){
                $this -> cliente[] = $row;
            }
            return $this-> cliente;
        }

        public function insertar($idC,$nomC,$apelC,$dirC,$email,$fn){
            $sql ="INSERT INTO `cliente`(`idCliente`, `nombres`, `Apellidos`, `direccion`, `Correo`, `Fecha_N`) VALUES ('$idC','$nomC','$apelC','$dirC','$email','$fn')";
            $res = mysqli_query(Conexion::conectar(),$sql) or die ("Error en la consulta sql al insertar");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El cliente se registro correctamente',
                    icon: 'Success',
                }).then((result)=>{
                        if(result.value){
                            window.location ='Home.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($idC,$nomC,$apelC,$dirC,$email,$fn){
            $sql="UPDATE `cliente` SET `nombres`='$nomC',`Apellidos`='$apelC',`direccion`='$dirC',`Correo`='$email',`Fecha_N`='$fn' WHERE `idCliente` =$idC'";
            $res = mysqli_query(Conexion::conectar(),$sql)or die ("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $idC fue modificado',
                icon: 'Success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='menu.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function clientepid($id){
            $sql="select * from `cliente` where `idCliente` = $id";
            $res = mysqli_query(Conexion::Conectar(),$sql)or die ("Error en la consulta sql al buscar");
            if($reg=mysqli_fetch_assoc($res)){
                $this -> cliente[]=$reg;
            }
            return $this -> cliente;
        }
        
        public function Eliminar($id){
            $sql="Delete from `cliente` where `idCliente` = $id ";
            $res = mysqli_query(Conexion::Conectar(),$sql)or die ("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El cliente con id $id fue eliminado',
                icon: 'Success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='menu.php';
                    }
                });
            </script>
        ";
        }
    }
    ?>
    <script src="./jquery/jquery-3.6.0.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>