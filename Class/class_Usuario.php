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
    <script type="text/javascript" language="javascript" src="../JavasScript/Funciones.js"></script>
    <title>Gestión Empleados</title>
</head>

<body>
    <?php

    include("../Conexion/Conexion.php");

    //clase empleado 
    class Usuario{
        private $usuario;
        
        public function __construct()
        {
            $this->usuario = array();
        }

        //mostar Empleados

        public function Mostrar ($id){
            $sql=" Select * from usuario where Roles_idRoles='$id'";

            $res = mysqli_query(Conexion::conectar(),$sql);

            while ($row = mysqli_fetch_assoc($res)){
                $this -> usuario[] = $row;
            }
            return $this-> usuario;
        }

        public function  editar($idC,$user,$pwd){
            $sql="UPDATE `usuario` SET `Usuario`='$user',`Contraseña`='$pwd' WHERE idUsuario = '$idC'";
            $res = mysqli_query(Conexion::conectar(),$sql)or die ("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $idC fue modificado',
                icon: 'success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='gestionU.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function usuarioID($id){
            $sql=" Select * from usuario where idUsuario = '$id'";
            // $sql ="select * from empleado where cedula = '$id'";
            $res = mysqli_query(Conexion::Conectar(),$sql)or die ("Error en la consulta sql al buscar");
            if($reg=mysqli_fetch_assoc($res)){
                $this -> usuario[]=$reg;
            }
            return $this -> usuario;
        }

        
        public function Eliminar($id){
            $sql="DELETE FROM `usuario` WHERE `usuario`.`idUsuario` = '$id'";
            $res=mysqli_query(Conexion::Conectar(),$sql)or die ("Error en la consulta sql al Eliminar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El usuario con id $id fue eliminado',
                icon: 'success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='gestionU.php';
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