<?php

if (!isset($_SESSION['id_usuario'])){
    /*echo"<script type='text/javascript'>
            alert('Se termino tu session, necesitas acceder nuevamente')
                    window.location='index.php';
        </script>";
    */
  
}
else{
  $_username=$_SESSION['usuario'];
}
?>
