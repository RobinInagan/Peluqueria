<?php

class Conexion{
    public static function Conectar (){
        $link = mysqli_connect("localhost","root","") or die ("Error al conectar a la BD");
        mysqli_select_db($link,"peluqueriaf") or die ("Error al seleccionar la BD");
        return $link;
    }
}

?>


  <script src="./jquery/jquery-3.6.0.min.js"></script>
  <script src="./sw/dist/sweetalert2.all.min.js"></script>
  <script src="./bootstrap/js/bootstrap.min.js"></script>

</body>

</html>