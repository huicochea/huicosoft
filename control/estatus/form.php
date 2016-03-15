<?php
	$tpl = new TemplatePower('template/estatus/form.tpl');
	$tpl->prepare();
	

		$objestatus = new Estatus($conn);
		$objPerfil = new Perfil($conn);
		$objperfilesestatus = new Perfiles_estatus($conn);

		$id_estatus='';
		if(!empty($_GET['id_estatus'])){
			$id_estatus = $_GET['id_estatus'];	
		}
		
		if(!empty($id_estatus)){
			$objperfilesestatus->setId_estatus($id_estatus);		

			$tpl->assign("titulo","Edita estatus");				
			$tpl->assign("id_estatus",$id_estatus);
			$objestatus->setId_estatus($id_estatus);
			$datosestatus = $objestatus->listaByid();

			$tpl->assign("nombre",$datosestatus['nombre']);
			$tpl->assign("descripcion",$datosestatus['descripcion']);			
			$tpl->assign("icono",$datosestatus['imagen']);	
			if($datosestatus['fin_proceso']==1){
				$tpl->assign("chekeado","checked ='checked '");	
			}

			//Buscar los perfiles  que ya tiene asignados
			$listanoasign = $objperfilesestatus->noasign();
			foreach ($listanoasign as $noperfil) {
				$tpl->newBlock('noasign');
					$tpl->assign('id_perfil',$noperfil['id_perfil']);
					$tpl->assign('nombre_perfil',$noperfil['nombre']);
				$tpl->gotoBlock('_ROOT');
			}

			//Buscar los perfiles asignado
			$listaasign = $objperfilesestatus->asign();
			foreach ($listaasign as $noperfil) {
				$tpl->newBlock('asign');
					$tpl->assign('id_perfil',$noperfil['id_perfil']);
					$tpl->assign('nombre_perfil',$noperfil['nombre']);
				$tpl->gotoBlock('_ROOT');
			}



		}
		else{
			$tpl->assign("titulo","Nuevo estatus");
			//Los estatus estaran asociados a un perfil,  dicho perfil solo podrá hacer los conmentarios y asignar solo los estatus que tiene relacionado		
			$listaperfiles = $objPerfil->lista_todo();
			foreach ($listaperfiles as $perfil) {
				$tpl->newBlock('noasign');
					$tpl->assign("id_perfil",$perfil['id_perfil']);
					$tpl->assign("nombre_perfil",$perfil['nombre']);
		        $tpl->gotoBlock('_ROOT');   					
			}

		}

		
	


	
	$tpl->printToScreen();	
?>