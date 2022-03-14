<?php
session_start();
unset($_SESSION['usuario']);
session_destroy();
echo "
    <script type='text/javascript'>
    alert('Sesion cerrada satisfactoriamente');
    window.location ='./Home.php';
    </script>
";