<?php
	$tpl = new TemplatePower('template/usuarios/form.tpl');
	$tpl->prepare();


		$objUsuario = new Usuario($conn);
		$objPerfil = new Perfil($conn);
		$objEmpresa = new Empresa($conn);

		$listaperfiles = $objPerfil->lista_todo();
		$listaempresas = $objEmpresa->lista_todo();

		$id_usuario = '';
		if(!empty($_GET['id_usuario'])){
			$id_usuario = $_GET['id_usuario'];	
		}
		
		if(!empty($id_usuario)){
			$tpl->assign("titulo","Edita usuario");							
			//Obtenemos los datos del usuario
			$objUsuario->setId_usuario($id_usuario);
			$datosusuario = $objUsuario->listaByid();
			/*
			echo "<pre>";
				print_r($datosusuario);
			echo "</pre>";
			*/
			$tpl->assign("estafeta",$datosusuario['estafeta']);
			$tpl->assign("nombre",$datosusuario['nombre_completo']);
			$tpl->assign("email",$datosusuario['email']);
			$tpl->assign("id_usuario",$id_usuario);	
			
			if($datosusuario['visibles_sistemas']==1){
				$tpl->assign("chekeado","checked ='checked '");
			}
			

			$listaperfilesnoasign = $objPerfil->lista_noasignado($id_usuario);
			foreach ($listaperfilesnoasign as $perfil) {// perfiles que no tiene asignado
				$tpl->newBlock('perfiles');
					$tpl->assign("id_perfil",$perfil['id_perfil']);
					$tpl->assign("nombre",$perfil['nombre']);
					if($perfil['id_perfil']==$datosusuario['id_perfil']){
						$tpl->assign("selper","selected='selected'");
					}
		        $tpl->gotoBlock('_ROOT');   					
			}

			$listaperfilesasign = $objPerfil->lista_asignado($id_usuario);				
			foreach ($listaperfilesasign as $perfil) {// perfiles que tiene asignado
				$tpl->newBlock('perfilesasign');
					$tpl->assign("id_perfil",$perfil['id_perfil']);
					$tpl->assign("nombre",$perfil['nombre']);
					if($perfil['id_perfil']==$datosusuario['id_perfil']){
						$tpl->assign("selper","selected='selected'");
					}
		        $tpl->gotoBlock('_ROOT');   					
			}


			foreach ($listaempresas as $empresa) {
				$tpl->newBlock('empresas');
					$tpl->assign("id_empresa",$empresa['id_empresa']);
					$tpl->assign("nombre",$empresa['nombre']);
					if($empresa['id_empresa']==$datosusuario['id_empresa']){
						$tpl->assign("selemp","selected='selected'");
					}
		        $tpl->gotoBlock('_ROOT');   					
			}		

		}
		else{
			$tpl->assign("titulo","Nuevo usuario");

			foreach ($listaperfiles as $perfil) {
				$tpl->newBlock('perfiles');
					$tpl->assign("id_perfil",$perfil['id_perfil']);
					$tpl->assign("nombre",$perfil['nombre']);
		        $tpl->gotoBlock('_ROOT');   					
			}
			
			foreach ($listaempresas as $empresa) {
				$tpl->newBlock('empresas');
					$tpl->assign("id_empresa",$empresa['id_empresa']);
					$tpl->assign("nombre",$empresa['nombre']);
		        $tpl->gotoBlock('_ROOT');   					
			}

		}
		

	
	$tpl->printToScreen();	
?>