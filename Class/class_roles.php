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
    <title>roles</title>
</head>

<body>
    <?php

    include("../Conexion/Conexion.php");

    //clase roles 
    class roles
    {
        private $roles;

        public function __construct()
        {
            $this->roles = array();
        }

        //mostar Empleados

        public function Mostrar()
        {
            $sql = "select * from roles";

            $res = mysqli_query(Conexion::conectar(), $sql);

            while ($row = mysqli_fetch_assoc($res)) {
                $this->roles[] = $row;
            }
            return $this->roles;
        }

        public function insertar($id, $rol)
        {
            $sql = "INSERT INTO `roles`(`idRoles`, `Rol`) VALUES ('$id','$rol')";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al insertar roles");
            echo " 
                <script type = 'text/javascript'>
                Swal.fire({
                    title: 'Exito',
                    text: 'El rol se registro correctamente',
                    icon: 'success',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                      },
                      hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                      }
                }).then((result)=>{
                        if(result.value){
                            window.location ='../roles/gestionR.php';
                        }
                    });
                </script>
            ";
        }



        public function  editar($id, $rol)
        {
            $sql = "UPDATE `roles` SET `descripcion`='$rol' WHERE `idroles` ='$id'";
            $res = mysqli_query(Conexion::conectar(), $sql) or die("Error en la consulta sql al editar roles");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El rol con id $id fue modificado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../roles/gestionR.php';
                    }
                });
            </script>
        ";
        }

        //Crear una función para capturar el id de los botones de acción 
        public function rolesId($id)
        {
            $sql = "select * from `roles` where `idRoles` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al buscar roles");
            if ($reg = mysqli_fetch_assoc($res)) {
                $this->roles[] = $reg;
            }
            return $this->roles;
        }

        public function Eliminar($id)
        {
            $sql = "DELETE FROM `roles` WHERE `roles`.`idRoles` = $id";
            $res = mysqli_query(Conexion::Conectar(), $sql) or die("Error en la consulta sql al Eliminar roles");
            echo " 
            <script type = 'text/javascript'>
            Swal.fire({
                title: 'Exito',
                text: 'El rol con id $id fue eliminado',
                icon: 'success',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                  },
                  hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                  }
            }).then((result)=>{
                    if(result.value){
                        window.location ='../roles/gestionR.php';
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