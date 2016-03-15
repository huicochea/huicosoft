<?php
//Recepción de variables POST, asignación a variable según nombre

	foreach($_POST as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        
        if(!is_numeric($nombre_campo))
            eval($asignacion);
    }

	$objUsuario = new Usuario($conn);

    if(!empty($id_usuario)){//Edita
		$objUsuario->setId_usuario($id_usuario);

            if(!empty($resetpass)){//Resetea el password
                $resetpass = 1;        
            }
            else{
                $resetpass = 0;
            }            
            if($resetpass==1){//Mandamos a recetear el password con la contraseña temporal
                $objUsuario->resetpass2();
            }
	}
    else{//Nuevo
        $str=1;
    }



    if(!empty($visiblesistemas)){//Edita
        $visiblesistemas = 1;
    }
    else{
        $visiblesistemas = 0;
    }






    $objUsuario->setPassword("temporal");
    $objUsuario->setVisibles_sistemas($visiblesistemas);
	$objUsuario->setNombre_completo($nombre);
	$objUsuario->setEmail($email);
    $objUsuario->setId_empresa($id_empresa);
    if(!empty($_POST['destino'])){
        $objUsuario->setId_perfil($_POST['destino']);    
    }
    else{
     $objUsuario->setId_perfil(0);       
    }

    $objUsuario->setEstafeta($idestafeta);
    $exito = $objUsuario->save($str);


	

?>