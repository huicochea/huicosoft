<?php
	$tpl = new TemplatePower('template/main/form.tpl');
	$tpl->prepare();	

	$objEmpresa = new Empresa($conn);
	$objaplicacion = new Aplicacion($conn);
	$objtipo_aplicacion = new Tipo_aplicacion($conn);
	$objRquerimiento = new Requerimiento($conn);
	$objseveridad = new Severidad($conn);

	//Validamos si el usuario que accedio al sistema puede ver los requerimientos y asignarle recursos
	$tpl->assign("super",$_SESSION['superadmin']);//Para la asignacion de recursos

/*
	if(!empty($_GET['editar'])){
		if($_GET['editar']!='' ){
			if($_GET['id_requerimiento']!='' ){
				$tpl->assign("super",1);
				//Obtenemos los datos del requerimiento
				$objRquerimiento->setId_requerimiento($_GET['id_requerimiento']);
				$datos_requerimientos = $objRquerimiento->listaByid();

				echo "<pre>";
					print_r($datos_requerimientos);
				echo "</pre>";



			}						
		}		
	}
	else{//Nuevo requerimiento
		*/

		$lista_tipo_aplicacion = $objtipo_aplicacion->lista();

		if($lista_tipo_aplicacion!=0){
			
			foreach ($lista_tipo_aplicacion as $tipo) {
		        $tpl->newBlock('tipo_aplicacion');
		            $tpl->assign("id_tipo_aplicacion",$tipo['id_tipo_aplicacion']."-".$tipo['tiene_modulos']);
		            $tpl->assign("nombre",$tipo['nombre']);	            
		        $tpl->gotoBlock('_ROOT');       
		    }
		}	

			
		$listaempresas = $objEmpresa->lista_todo_interno();
		if($listaempresas!=0){
			foreach ($listaempresas as $empresa) {
		        $tpl->newBlock('empresas');
		            $tpl->assign("id_empresa",$empresa['id_empresa']);
		            $tpl->assign("nombre",$empresa['nombre']);
		        $tpl->gotoBlock('_ROOT');       
		    }
		}

		$tpl->assign("nombre_unidad",$_SESSION['unidad']);


	//}
	

	$listaseveridad = $objseveridad->lista_todo();
		if($listaseveridad!=0){
			foreach ($listaseveridad as $severidad) {
		        $tpl->newBlock('severidad');
		            $tpl->assign("id_severidad",$severidad['id_severidad']);
		            $tpl->assign("nombre_severidad",$severidad['nombre']);
		        $tpl->gotoBlock('_ROOT');       
		    }
		}

	if($_SESSION['lista_permisos']['es_lider']==1){//Puede solicitar sistemas a nombre de otra persona


	}	
	else{
		$tpl->assign("visiblesistemas","oculto");
	}


	$tpl->printToScreen();	
?>