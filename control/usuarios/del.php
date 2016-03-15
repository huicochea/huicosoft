<?php
//Recepción de variables POST, asignación a variable según nombre
	foreach($_GET as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        if(!is_numeric($nombre_campo))
            eval($asignacion);
    }

    $objUsuario = new Usuario($conn);

    if(!empty($id_usuario)){//Edita
		$objUsuario->setId_usuario($id_usuario);
	}

    $exito = $objUsuario->delete();


?>