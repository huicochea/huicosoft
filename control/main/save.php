<?php

	foreach($_POST as $nombre_campo => $valor){
        $asignacion = '$' . $nombre_campo . '=\'' . $valor . '\';';
        //echo $nombre_campo.": ".$valor."<br>";
        if(!is_numeric($nombre_campo))
            eval($asignacion);
    }

        
    $objrequerimiento = new Requerimiento($conn);
    $objmodulo = new Aplicacion($conn);//Aplicacion es lo mismo que módulo
    $objtipo_aplicacion = new Tipo_aplicacion($conn);
    $objUsuario = new Usuario($conn);

    //Validar si me mandan el id_requerimiento
    $usrfinalIskey=0;//Para indicar si el usuario final es el mismo que el key user

    $arraux = explode('-', $tipoap);
    $tipoap = $arraux[0];

    $objrequerimiento->setId_tipo_solicitud($tipo_sol);
    $objrequerimiento->setId_tipo_aplicacion($tipoap);

    if(!empty($id_aplicacion)){
        $objrequerimiento->setId_aplicacion($id_aplicacion);
    }
    elseif(!empty($id_modulo)){
        $objrequerimiento->setId_aplicacion($id_modulo);
    }

    $objrequerimiento->setId_usr_solicita($_SESSION['id_usuario']);
    $id_usuario_comentario = $_SESSION['id_usuario'];
    //Validamos si el usuario key user selecciono a otra persona como solocitante 
    
    if(!empty($usrsolicitante)){
        if($usrsolicitante!=''){            
            //Obtenemos el id del usuario que solicito

            $arrestafeta =explode(":", $usrsolicitante);
            $estafetainvitado = $arrestafeta[0];
            $nombreinvitado = $arrestafeta[1];
            $emailsolicitante = $arrestafeta[2];
            $emailsolicitante = ltrim($emailsolicitante);

            //Validamos que la estafeta sea valida,  debe existir en la tabla rh.mempleados
            $estafeta_valida = $objUsuario->validaEstafeta($estafetainvitado);
            if($estafeta_valida==1){//La estafeta existe en RH.dbo.mempleados

                    $objUsuario->setEstafeta($estafetainvitado);
                    $invitadoExiste = $objUsuario->existeByestafeta();//Verifica si el usuario existe en base a la estafeta
                    if($invitadoExiste['id_usuario']!=''){
                        $objrequerimiento->setId_usr_solicita($invitadoExiste['id_usuario']);
                    }//No existe,  lo damos de alta 
                    else{
                        //Buscamos el email de la persona invitada en la tabla mempleados                
                        $objUsuario->setNombre_completo($nombreinvitado);
                        $objUsuario->setEstafeta($estafetainvitado);
                        $objUsuario->setId_empresa(1);
                        $objUsuario->setPassword('temporal');
                        $objUsuario->setEmail($emailsolicitante);
                        $str = 1;
                        $exito = $objUsuario->save($str);                     
                        if($exito==1){
                            $objUsuario->setEstafeta($estafetainvitado);
                            $invitadoExiste = $objUsuario->existeByestafeta();
                            $objrequerimiento->setId_usr_solicita($invitadoExiste['id_usuario']);
                            $id_usuario_comentario = $invitadoExiste['id_usuario'];

                        }
                    }


            }



        }            
    }


    
    $objrequerimiento->setId_empresa($id_empresa);
    $objrequerimiento->setActivo(1);
    $objrequerimiento->setNivel_autoriza_actual(1);
    $objrequerimiento->setClave_unidad_solicita($_SESSION['clave_unidad']);
    $objrequerimiento->setNombre_requerimiento($nombre_requerimiento);
    $objrequerimiento->setNombre_area_solicita($asolicita);
    $objrequerimiento->setFuncion_principal($funcion_principal);
    $objrequerimiento->setBeneficios($beneficios);
    $objrequerimiento->setReglas($reglas);
    $objrequerimiento->setRequerimientos($requerimientos);
    $objrequerimiento->setEntrada($entrada);
    $objrequerimiento->setSalida($salida);
    $objrequerimiento->setId_severidad($id_severidad);
    $objrequerimiento->setId_usr_levanta($_SESSION['id_usuario']);

    //id_usr_levanta  indica el id del usuario que generó el requerimiento  ya que me acaban de pedir que un lider
    //puede hacer requerimientos a nombre de otra persona ahora es necesario indicar quien levanta a nombre de otra persona


    if($tipo_sol==1){//El requerimiento esta dando de alta un nuevo sistema
        //Si el tipo de aplicacion no contiene modulos, el  key user será la persona que esta dando de alta el requerimiento    
        //verificar el tipo de aplicacion
        $objtipo_aplicacion->setId_tipo_aplicacion($tipoap);
        $datos_tipoaplicacion = $objtipo_aplicacion->listaByid();
        if($datos_tipoaplicacion['tiene_modulos']==1){//Tiene modulos

        }
        else{//No tiene Modulos, el key user es el mismo usuario que lo esta solicitando
            //
            $usrfinalIskey=1;
            $objmodulo->setNombre($nombresistema);
            $objmodulo->setDescripcion('');
            $objmodulo->setId_tipo_aplicacion($tipoap);    
            $id_aplicacion = $objmodulo->save();



            //Le asignamos el perfil de key user al usuario que esta dando de alta el sistema
            $objUsuario->setEstafeta($_SESSION['estafeta']);
            $datos_usuario = $objUsuario->existeByestafeta();
            $objUsuario->setId_perfil(4);//El 4 es el id del usuario clave
            $objUsuario->setId_usuario($datos_usuario['id_usuario']);
            $existe_perfilusuario =   $objUsuario->validar_existencia_perfiles();
                
            if($existe_perfilusuario==0){//No existe la relacion entre el usuario y el perfil key user, procedemos a crearla
                $objUsuario->crea_key_user();
            }

            $objmodulo->save_usrclave_estafeta($_SESSION['estafeta'],$id_aplicacion);

            //El lider de sistema en aplicaciones web siempre es Letycia Serrano            
            $objmodulo->save_usrlider_estafeta('53012',$id_aplicacion);
            $objrequerimiento->setId_aplicacion($id_aplicacion);
        }

    }


    //Exito contiene el id insertado del requerimiento
    $id_requerimiento = $objrequerimiento->save();

    //Guardmaos los comentarios
    if($id_requerimiento!=''){
        //Creamos el objeto de comentarios 
        $objcomentario = new Comentario($conn);
        $objarchivo = new Archivos($conn);
        $objcomentario->setId_requerimiento($id_requerimiento);
        $objcomentario->setId_usuario($id_usuario_comentario);
        $objcomentario->setComentario("Nuevo requerimiento");
        $objcomentario->setOculto(0);
        $id_comentario =  $objcomentario->save();

        if($id_comentario!=''){//Iteramos los archivos para asociarlos al comentario



            $contador = 0;
                $listaarchivos = array();
                foreach ($_FILES['adjuntos']  as $indice => $valor) {            
                    foreach ($valor as $key => $value) {
                        $archivo[$key][$indice]=$value;
                    }
                    $contador++;
                }

                foreach ($archivo as $key => $valor) {

                    if($valor['name'] != ""){ // El campo foto contiene un archivo
                        $extension = end(explode('.', $valor['name']));
                        $archivo = substr(md5(uniqid(rand())),0,10).".".$extension;
                        $directorio = "control/main/archivos";//dirname("empresas/logotipos"); // directorio de tu elección
                        $minFoto = 'archivo_'.$archivo;
                        // almacenar imagen en el servidor
                        move_uploaded_file($valor['tmp_name'], $directorio.'/'.$archivo);                        
                        $archivo =  $directorio."/".$archivo;

                        //Cargamos el archivo
                        $objarchivo->setNombre($valor['name']);
                        $objarchivo->setId_comentario($id_comentario);
                        $objarchivo->setUbicacion($archivo);
                        $objarchivo->save();

                    } 
                    
                }

        }//Termina if id_comentario
    }//Termina if id_requerimiento
    

    //Hacemos el envío de mails si todo salío de manera correcta.    
    if($id_requerimiento!='' && $id_comentario!=''){     
        include("email/Correos.php");
        $email = '';
        $objemail = new Correos($email,$email);

        //Obtenemos los detalles de la aplicacion    
        $objrequerimiento->setId_requerimiento($id_requerimiento);
        $info_requerimiento =  $objrequerimiento->detalleRequerimiento();

        //Enviamos el mail al usuario
        $objUsuario->setEstafeta($_SESSION['estafeta']);
        $datos_usuario = $objUsuario->existeByestafeta();

 
        if($usrfinalIskey==1){//El usuario final es el mismo que el key user

            

            $email_usr_solicita = $datos_usuario['email'];
            
            //
            $objemail->nuevorequerimiento($email_usr_solicita,$id_requerimiento,$nombre_requerimiento);
            //En lugar de hacer el envio,  guardamos los datos en la base de datos para hacer el envio por ajax
            //$objemail->guarda_emails($email_usr_solicita,$texto='',$id_requerimiento,'nuevorequerimiento',$nombre_requerimiento);
            

        }
        else{//El usuario no es el mismo que el key user
            
            
            //Enviamos el mail al usuario
            $objUsuario->setEstafeta($_SESSION['estafeta']);
            $datos_usuario = $objUsuario->existeByestafeta();

            $email_usr_solicita = $datos_usuario['email'];
            $objemail->nuevorequerimiento($email_usr_solicita,$id_requerimiento,$nombre_requerimiento);

            //Obtenemos los email de los key user y les mandamos el correo correspondiente
            $listakeyuser = $objrequerimiento->lista_keyuserByidAplicacion($info_requerimiento['id_aplicacion']);
            foreach ($listakeyuser as $usuarokey) {                    
                $objemail->aviso_a_keyuser($usuarokey['email'],$id_requerimiento,$nombre_requerimiento,$datos_usuario['nombre_completo']);
            }

            //Obtenemos los email de los lideres de sistema            
            $listalider = $objrequerimiento->lista_liderByidAplicacion($info_requerimiento['id_aplicacion']);
            foreach ($listalider as $lider) {
                $objemail->aviso_a_lider_sistemas($lider['email'],$id_requerimiento,$nombre_requerimiento,$datos_usuario['nombre_completo']);
            }   



        } 
    }//Termina envío de mails
    

?>