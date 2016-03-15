<?php
	$tpl = new TemplatePower('template/estatus/consulta.tpl');
	$tpl->prepare();

		$objestatus = new Estatus($conn);
		
		if($exito==1){
			$tpl->assign("exito","CAMBIOS GUARDADOS CON EXITO");
		}

		$rowini=1;
		$rowfin=10;
		$contador=0;
		if(!empty($_GET['rowini'])){
			$rowini=$_GET['rowini'];
		}
		if(!empty($_GET['rowfin'])){
			$rowfin=$_GET['rowfin'];
		}
		if(!empty($_GET['rowfin'])){
			$rowfin=$_GET['rowfin'];
		}

		if(!empty($_GET['contador'])){
			$contador=$_GET['contador'];
		}

		$str="";//Para los filtros


		$listaestatus = $objestatus->lista($rowini,$rowfin,$str);
		if($listaestatus!=0){
			$rowtrajo=0;
			foreach ($listaestatus as $estatus) {
				$rowtrajo++;
				$contador++;
		        $tpl->newBlock('estatus');
		            $tpl->assign("id_estatus",$estatus['id_estatus']);
		            $tpl->assign("nombre",$estatus['nombre']);
		            $tpl->assign("descripcion",$estatus['descripcion']);
		            $tpl->assign("icono",$estatus['imagen']);		           
		            if($estatus['fin_proceso']==1){
						$tpl->assign("fin_proceso","Si");
		            }
		            else{
						$tpl->assign("fin_proceso","No");
		            }		          

		            $tpl->assign("rows",$contador);		           
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
					  $tpl->assign("anterior","<a href='control.php?rowini=$rowantini&rowfin=$rowantfin&mod=estatus&acc=con&contador=$contadorant' class='btn btn-default btn-xs'> 
                            		<span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span> 
                            			Anterior
                        			</a>");
					}

		            $tpl->assign("siguiente","<a href='control.php?rowini=$rowsigini&rowfin=$rowsigfin&mod=estatus&acc=con&contador=$contadorsig'> 
                            	<button  class='btn btn-default'>Siguiente
                            	<span class='glyphicon glyphicon-arrow-right' aria-hidden='true'></span></button>                           
                        		</a>");
		        $tpl->gotoBlock('_ROOT');  
		}
		else{
			if($rowini>10){
					$tpl->newBlock('paginado');
						  $tpl->assign("anterior","<a href='control.php?rowini=$rowantini&rowfin=$rowantfin&mod=estatus&acc=con&contador=$contadorant'> 
	                            		<button class='btn btn-default'><span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span> 
	                            			Anterior</button>
	                        			</a>");
					$tpl->gotoBlock('_ROOT'); 
			}
		}

	
	$tpl->printToScreen();	
?>