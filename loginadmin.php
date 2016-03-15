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
                
          		                
                $sql ="SELECT id_administrador,password FROM administrador WHERE email = '$email'";
                /* Consultas de selección que devuelven un conjunto de resultados */
                if ($resultado = mysqli_query($conn, $sql)) {
                    printf("La selección devolvió %d filas.\n", mysqli_num_rows($resultado));

                    /* liberar el conjunto de resultados */
                    mysqli_free_result($resultado);
                }

                exit();
                if($validado){
                    echo "Acceso correcto";
                }else{
                    echo"<script type='text/javascript'>
                            alert('Usuario incorrecto');
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