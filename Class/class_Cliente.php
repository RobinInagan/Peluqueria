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

        public function insertar($cod,$nom,$apel,$email,$te,$fn,$dep){
            $sql ="insert into empleados values ($cod,'$nom','$apel','$email','$te','$fn',$dep)";
            $res = mysqli_query(Conectar::con(),$sql)or die ("Error en la consulta sql al insertar");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El empleado se registro correctamente',
                    icon: 'Success',
                }).then((result)=>{
                        if(result.value){
                            window.location ='menu.php';
                        }
                    });
                </script>
            ";
        }

        public function  editar($nom,$apel,$email,$fn,$te,$id){
            $sql="UPDATE `empleados` SET `nomb_e`='$nom',`apel_e`='$apel',`email_e`='$email',
            `tele_e`='$te',`fecha_e`='$fn' WHERE  id_e='$id'";
            $res = mysqli_query(Conectar::con(),$sql)or die ("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $id fue modificado',
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
        public function empid($id){
            $sql="select * from empleados where id_e = $id";
            $res = mysqli_query(Conectar::con(),$sql)or die ("Error en la consulta sql al buscar");
            if($reg=mysqli_fetch_assoc($res)){
                $this -> emple[]=$reg;
            }
            return $this -> emple;
        }
        
        public function Eliminar($id){
            $sql="Delete from empleados where id_e= $id ";
            $res = mysqli_query(Conectar::con(),$sql)or die ("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $id fue eliminado',
                icon: 'Success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='menu.php';
                    }
                });
            </script>
        ";;
        }
    }
    ?>
    <script src="./jquery/jquery-3.6.0.min.js"></script>
    <script src="./sw/dist/sweetalert2.all.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>