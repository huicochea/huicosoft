<?php

if (!isset($_SESSION['id_usuario'])){
    echo"<script type='text/javascript'>            
                   window.location='controladmin.php?mod=admin&acc=log';
        </script>";
    
  
}
else{
  $_username=$_SESSION['usuario'];
}
?>
