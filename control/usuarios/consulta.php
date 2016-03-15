<?php
	$tpl = new TemplatePower('template/usuarios/consulta.tpl');
	$tpl->prepare();
	
	
	$objUsuario = new Usuario($conn);
	$objPerfil = new Perfil($conn);

	if($exito==1){
		$tpl->assign("exito","CAMBIOS GUARDADOS CON EXITO");
	}


	
		$rowini=1;
		$rowfin=10;
		$contador=0;
		$str="";//Para los filtros
		if(!empty($_GET['rowini'])){
			$rowini=$_GET['rowini'];
		}
		if(!empty($_GET['rowfin'])){
			$rowfin=$_GET['rowfin'];
		}
		if(!empty($_GET['nombre_usuario'])){
			$nombre_usuario=$_GET['nombre_usuario'];


			if($nombre_usuario!=''){
				$str.=" AND u.nombre_completo like '%$nombre_usuario%'";
			}
		}

		if(!empty($_GET['contador'])){
			$contador=$_GET['contador'];
		}


		if(!empty($_GET['usuario_busca'])){
			$usuario_busca=$_GET['usuario_busca'];
			if($usuario_busca!=''){
				$str.=" AND u.email like '%$usuario_busca%'";	
			}
		}

		if(!empty($_GET['id_perfilSel'])){
			$id_perfilSel=$_GET['id_perfilSel'];
		
			if($id_perfilSel!='*' && $id_perfilSel!=''){
				$str.=" AND pu.id_perfil = $id_perfilSel";	
			}			
		}		


		


	


		
		
		$listap = $objPerfil->lista();
		if($listap!=0){
			$rowtrajo=0;
			foreach ($listap as $perfil) {				
		        $tpl->newBlock('perfiles');
		            $tpl->assign("id_perfil",$perfil['id_perfil']);
		            $tpl->assign("nomreperfil",$perfil['nombre']);
		        $tpl->gotoBlock('_ROOT');       
		    }
		}


		
		


		$rowtrajo=0;
		$listausuarios = $objUsuario->lista($rowini,$rowfin,$str);
		if($listausuarios!=0){
			foreach ($listausuarios as $usuario) {
				$rowtrajo++;
				$contador++;
		        $tpl->newBlock('usuarios');
		            $tpl->assign("id_usuario",$usuario['id_usuario']);
		            $tpl->assign("nombre",$usuario['nombre_completo']);
		            $tpl->assign("email",$usuario['email']);
		            $tpl->assign("id_empresa",$usuario['id_empresa']);		            
		            $tpl->assign("nombre_empresa",$usuario['nombre_empresa']);
		            $tpl->assign("rows",$contador);		           
		            //Listar perfiles 
		            $objUsuario->setId_usuario($usuario['id_usuario']);
		            $listaperfiles = $objUsuario->perfilesByidusuario();
		            if($listaperfiles!=0){
						foreach ($listaperfiles as $perfil) {
		            		$tpl->newBlock('nombreperfiles');
		            			$tpl->assign("nombre_perfil","<span style='font-size:8px;' class='fa fa-circle'></span> ".$perfil['nombre_perfil']."<br>");
			            	$tpl->gotoBlock('nombreperfiles');      							            		            	
		            	}	
		            }		            

		            
		        $tpl->gotoBlock('_ROOT');       
		    }
		}
	
		$rowantini=$rowini-10;
		$rowantfin=$rowfin-10;
		$rowsigini=$rowini+10;
		$rowsigfin=$rowfin+10;
		$contadorsig=$contador;
		$contadorant=$contador-($rowtrajo+10);


		if($rowtrajo==10){//Se muestran los botones del paginado
		        $tpl->newBlock('paginado');
		          	
		          	if($rowini>10){
					  $tpl->assign("anterior","<a href='control.php?rowini=$rowantini&rowfin=$rowantfin&mod=usuarios&acc=con&contador=$contadorant' class='btn btn-default btn-xs'> 
                            		<span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span> 
                            			Anterior
                        			</a>");
					}

		            $tpl->assign("siguiente","<a href='control.php?rowini=$rowsigini&rowfin=$rowsigfin&mod=usuarios&acc=con&contador=$contadorsig' class='btn btn-default btn-xs'> 
                            	Siguiente
                            	<span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span>                             
                        		</a>");
		        $tpl->gotoBlock('_ROOT');  
		}
		else{
			if($rowini>10){
					$tpl->newBlock('paginado');
						  $tpl->assign("anterior","<a href='control.php?rowini=$rowantini&rowfin=$rowantfin&mod=usuarios&acc=con&contador=$contadorant' class='btn btn-default btn-xs'> 
	                            		<span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span> 
	                            			Anterior
	                        			</a>");
					$tpl->gotoBlock('_ROOT'); 
			}
		}



	
	$tpl->printToScreen();	
?>