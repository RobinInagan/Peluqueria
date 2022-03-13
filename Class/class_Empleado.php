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
    class Empleado{
        private $empleado;
        
        public function __construct()
        {
            $this->empleado = array();
        }

        //mostar Empleados

        public function Mostrar (){
            $sql=" Select e.cedula, e.nombre, e.Apellidos, e.Correo, e.Dirección, d.dia, c.descripcion, t.numero from empleado e inner join cargo c on cargo_idcargo=idcargo inner join dias d on dias_iddias=iddias 
            inner join telefonos_e t on cedula=empleado_cedula";

            $res = mysqli_query(Conexion::conectar(),$sql);

            while ($row = mysqli_fetch_assoc($res)){
                $this -> empleado[] = $row;
            }
            return $this-> empleado;
        }

        public function insertar($idC,$nom,$apel,$email,$dir,$dias,$cargo,$tel, $user, $pwd){
            $sql ="INSERT INTO `empleado`(`cedula`, `nombre`, `Apellidos`, `Correo`,`Dirección`,`dias_iddias`,`cargo_idcargo`) VALUES ('$idC','$nom','$apel','$email','$dir','$dias','$cargo')";
            $sql2 = "INSERT INTO `telefonos_e`(`Empleado_cedula`, `numero`) VALUES ('$idC','$tel')";
            $sql3 = "INSERT INTO `usuario`(`idUsuario`, `Usuario`, `Contraseña`, `Roles_idRoles`, `Cliente_idCliente`, `Empleado_cedula`) VALUES (4,'$user','$pwd',3,null,'$idC')";

            $res = mysqli_query(Conexion::conectar(),$sql) or die ("Error en la consulta sql al insertar");
            $res2 = mysqli_query(Conexion::conectar(),$sql2) or die ("Error en la consulta sql2 al insertar telefono");
            $res3 = mysqli_query(Conexion::conectar(),$sql3) or die ("Error en la consulta sql2 al insertar usuario");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El empleado se registro correctamente',
                    icon: 'success',
                }).then((result)=>{
                        if(result.value){
                            window.location ='gestionE.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($idC,$nom,$apel,$email,$dir,$dias,$cargo){
            $sql="UPDATE `empleado` SET `nombre`='$nom',`Apellidos`='$apel',`Correo`='$email',`Dirección`='$dir',`dias_iddias`='$dias',`cargo_idcargo`='$cargo' WHERE `cedula` ='$idC'";
            $res = mysqli_query(Conexion::conectar(),$sql)or die ("Error en la consulta sql al editar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $idC fue modificado',
                icon: 'success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='gestionE.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function empleadoId($id){
            $sql=" Select e.cedula, e.nombre, e.Apellidos, e.Correo, e.Dirección, d.iddias, d.dia, c.idcargo, c.descripcion, t.numero from empleado e inner join cargo c on cargo_idcargo=idcargo inner join dias d on dias_iddias=iddias 
            inner join telefonos_e t on cedula=empleado_cedula where cedula = '$id'";
            // $sql ="select * from empleado where cedula = '$id'";
            $res = mysqli_query(Conexion::Conectar(),$sql)or die ("Error en la consulta sql al buscar");
            if($reg=mysqli_fetch_assoc($res)){
                $this -> empleado[]=$reg;
            }
            return $this -> empleado;
        }
        
        public function Eliminar($id){
            $sql="DELETE FROM `empleado` WHERE `empleado`.`cedula` = '$id'";
            $res=mysqli_query(Conexion::Conectar(),$sql)or die ("Error en la consulta sql al Eliminar");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El empleado con id $id fue eliminado',
                icon: 'success',
            }).then((result)=>{
                    if(result.value){
                        window.location ='gestionE.php';
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