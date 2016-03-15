<?php
//Recepción de variables POST, asignación a variable según nombre

	foreach($_GET as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        if(!is_numeric($nombre_campo))
            eval($asignacion);
    }
	
    $objestatus = new Estatus($conn);

    if(!empty($id_estatus)){//Edita
		$objestatus->setId_estatus($id_estatus);
	}
    $exito = $objestatus->delete();

?>