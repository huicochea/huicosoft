<?php
  	$host_name  = "db618110615.db.1and1.com";
    $database   = "db618110615";
    $user_name  = "dbo618110615";
    $password   = "nomelase";


    $conn = mysqli_connect($host_name, $user_name, $password, $database);
    
    if(mysqli_connect_errno())
    {
    echo '<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>';
    }
    else
    {
     //echo '<p>Conexion exito</p>';
    }

?>