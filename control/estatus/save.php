<?php
//Recepción de variables POST, asignación a variable según nombre

	foreach($_POST as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        if(!is_numeric($nombre_campo))
            eval($asignacion);
    }

	$objestatus = new Estatus($conn);
    $objperfilesestatus = new Perfiles_estatus($conn);

    if(!empty($id_estatus)){//Edita
		$objestatus->setId_estatus($id_estatus);
	}

    if(!empty($fin_proceso)){//Edita
        $fin_proceso = 1;
    }
    else{
        $fin_proceso = 0;
    }

    $objestatus->setFin_proceso($fin_proceso);
    

	$objestatus->setNombre($nombre);
	$objestatus->setDescripcion($descripcion);

    // comprobar que han seleccionado una foto
    if($_FILES['logo']['name'] != ""){ // El campo foto contiene una imagen...
        
        // Primero, hay que validar que se trata de un JPG/GIF/PNG
        $allowedExts = array("jpg", "jpeg", "gif", "png", "JPG", "GIF", "PNG");

        $extension = end(explode(".", $_FILES["logo"]["name"]));
        if ((($_FILES["logo"]["type"] == "image/gif")
                || ($_FILES["logo"]["type"] == "image/jpeg")
                || ($_FILES["logo"]["type"] == "image/png")
                || ($_FILES["logo"]["type"] == "image/pjpeg"))
                && in_array($extension, $allowedExts))
        {
            // el archivo es un JPG/GIF/PNG, entonces...
            $extension = end(explode('.', $_FILES['logo']['name']));
            $foto = substr(md5(uniqid(rand())),0,10).".".$extension;
            $directorio = "control/estatus/iconos";//dirname("empresas/logotipos"); // directorio de tu elección
            
            // almacenar imagen en el servidor
            move_uploaded_file($_FILES['logo']['tmp_name'], $directorio.'/'.$foto);
            $minFoto = 'min_'.$foto;
            $resFoto = 'res_'.$foto;
            resizeImagen($directorio.'/', $foto, 30, 30,$minFoto,$extension);
            //resizeImagen($directorio.'/', $foto, 500, 500,$resFoto,$extension);
            //unlink($directorio.'/'.$foto);
            $objestatus->setImagen($directorio."/".$minFoto);
            
        } else { // El archivo no es JPG/GIF/PNG
            $malformato = $_FILES["logo"]["type"];
            echo  "Formato de imagen incorrecto, no se realizaron cambios";
            exit;
          }
        
    } else { // El campo foto NO contiene una imagen

        //Recuerda descomentar*************************************************************
        /*
        $exito = $objestatus->save();
        echo"<script type='text/javascript'>
                        window.location='control.php?mod=estatus&acc=con&exito=$exito';
            </script>";
        exit;
        */
        
    }	

    $exito = $objestatus->save();

    
    //Hacer la relación entre los perfiles y los estatus 
    //Origen: Los perfiles no asignados
    //Destino: Los perfiles asignados
    if($exito!=''){
        $objperfilesestatus->setId_estatus($exito);

        foreach ($_POST['origen'] as $key => $value) {//No asignado
            $objperfilesestatus->setId_perfil($value);
            $objperfilesestatus->baja_relacion();
        }

        foreach ($_POST['destino'] as $key => $value) {//Asignados
            $objperfilesestatus->setId_perfil($value); 
            $objperfilesestatus->crea_relacion();
        }
    }


	function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
	    $rutaImagenOriginal = $ruta.$nombre;
	    if($extension == 'GIF' || $extension == 'gif'){
	    $img_original = imagecreatefromgif($rutaImagenOriginal);
	    }
	    if($extension == 'jpg' || $extension == 'JPG'){
	    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
	    }
	    if($extension == 'png' || $extension == 'PNG'){
	    $img_original = imagecreatefrompng($rutaImagenOriginal);
	    }
	    $max_ancho = $ancho;
	    $max_alto = $alto;
	    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
	    $x_ratio = $max_ancho / $ancho;
	    $y_ratio = $max_alto / $alto;
	    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
	  	$ancho_final = $ancho;
			$alto_final = $alto;
		} elseif (($x_ratio * $alto) < $max_alto){
			$alto_final = ceil($x_ratio * $alto);
			$ancho_final = $max_ancho;
		} else{
			$ancho_final = ceil($y_ratio * $ancho);
			$alto_final = $max_alto;
		}
	    $tmp=imagecreatetruecolor($ancho_final,$alto_final);
	    imagecopyresampled($tmp,$img_original,0,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
	    imagedestroy($img_original);
	    $calidad=70;
	    imagejpeg($tmp,$ruta.$nombreN,$calidad);
	    
	}


?>