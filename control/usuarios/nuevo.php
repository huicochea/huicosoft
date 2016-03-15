<?php
//Recepción de variables POST, asignación a variable según nombre
	foreach($_POST as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        if(!is_numeric($nombre_campo))
            eval($asignacion);
    }
    include("../../config/connect.php");
    include("../../class/usuario.php");
    include("../../class/perfil.php");
    include("../../class/empresa.php");

	$objUsuario = new Usuario($conn);
    if($email!=''){
        $str=1;
        $objUsuario->setNombre_completo($nombre);
        $objUsuario->setEmail($email);
        $objUsuario->setId_empresa(1);//N/A
        $objUsuario->setId_perfil(2);//Solicitante
        $objUsuario->setEstafeta($idestafeta);
        $objUsuario->setPassword($pass);
        $exito = $objUsuario->save($str);
    }    
    else{
        $exito = 2;//Error
    }



    if ($exito==1){//Exito
        echo"<script type='text/javascript'>            
                window.location='../../acceso.php?exito=$exito';
            </script>";
    }
    elseif ($exito==0) {//Error
        echo"<script type='text/javascript'>            
                window.location='../../registro.php?exito=$exito';
            </script>";
    }        
    elseif ($exito==2) {//Error

                echo"<script type='text/javascript'>            
                window.location='../../registro.php?exito=$exito';
            </script>";
    }    
    elseif ($exito==3) {//Ya existe 
        echo"<script type='text/javascript'>            
                window.location='../../registro.php?exito=$exito';
            </script>";
    }    

?>