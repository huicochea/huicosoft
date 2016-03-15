<?php
require('template/class.TemplatePower.inc.php');

session_start();
//error_reporting(0);
error_reporting(E_ALL);

if(!empty($_POST['mod']) && !empty($_POST['acc'])){
    $mod = $_POST['mod'];
    $acc = $_POST['acc'];
}
include("config/connect.php");

if($mod!=''){
    if($mod == 'log'){
        if(isset($acc)){
            if($acc == "in"){//Verifica que sea Inicio session
                $email  = trim($_POST['user_login']);//Nombre de usuario
                $pass  = trim($_POST['user_password']);//Contraseña
                $validado = false;
          		                
                $sql ="SELECT id_administrador,password FROM administrador WHERE email = '$email'";
                /* Consultas de selección que devuelven un conjunto de resultados */
                if ($resultado = mysqli_query($conn, $sql)) {
                    if(mysqli_num_rows($resultado)>0)
                    {
                        while ($row = mysqli_fetch_row($resultado)) {
                            if($row[1] == md5($pass)){
                                $id_administrador = $row[0];
                                $validado = true;
                            }
                        }
                    }
                    /* liberar el conjunto de resultados */
                    mysqli_free_result($resultado);
                }
                if($validado){
                    echo"<script type='text/javascript'>
                            alert('Acceso correcto');
                            window.location='admin.php';
                        </script>";
                }else{
                    session_unset();
                    echo"<script type='text/javascript'>
                            alert('Usuario y/o contrasena incorrecto');
                            window.location='admin.php';
                        </script>";
                }
                //************************************
                include("config/disconnect.php");
            }else if($acc == "out"){
                session_unset();
               echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";
            }else if($acc == ""){
                session_unset();
               echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";
            }
        }
    }else if($mod == ""){
               session_unset();
               echo"<script type='text/javascript'>
                    window.location='admin.php';
                </script>";
    }
}else{
    session_unset();
    echo"<script type='text/javascript'>
        alert('Datos incorrectos.');
        window.location='admin.php';
    </script>";
}