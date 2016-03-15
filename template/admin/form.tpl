


<div class="sub-nav hidden-sm hidden-xs"  style="margin-top: -20px;">
	<ul>
		<li><a class="heading" href="" data-original-title="" title="">{titulo}</a></li>
      <!--<li class="hidden-sm hidden-xs">
         <a href="#color-picker" data-original-title="" title="">Color Picker</a>
         </li>
         <li class="hidden-sm hidden-xs">
         <a href="#color-picker" data-original-title="" title="">Color Picker</a>
         </li>
         <li class="hidden-sm hidden-xs">
         <a href="#color-picker" data-original-title="" title="">Color Picker</a>
         </li>
         <li class="hidden-sm hidden-xs">
         <a href="#color-picker" data-original-title="" title="">Color Picker</a>
         </li>
         <li class="hidden-sm hidden-xs">
         <a href="#color-picker" data-original-title="" title="">Color Picker</a>
     </li>-->
 </ul>
</div>
<!--/Menu Azul-->
<div class="dashboard-wrapper">
	<div class="row">
		<div class="col-md-12">
			<!--Contenido-->
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel panel-body">
						<!--Formulario / Tabla-->


						<form class="form-horizontal" action="control.php" method="post" onsubmit="return valida_usuario();">
							

							<div class="panel panel-info">
								<div class="panel-heading">
									<h4 class="title">Usuarios</h4>
								</div>
								<div class="panel-body">

									<div class="form-group">
										<div class="col-md-2">
											<td>Estafeta</td>
										</div>

										<div class="col-md-10">
											<input type="text" value="{estafeta}" class="form-control" id="estafeta" name="estafeta" placeholder="Estafeta">
											<input type="hidden" value="{estafeta}" id="idestafeta" name="idestafeta">
										</div>

									</div>

									<div class="form-group">
										<div class="col-md-2">
											<td>*Nombre completo</td>
										</div>
										<div class="col-md-10">
											<input type="text" value="{nombre}" class="form-control" id="nomre_emp" name="nombre" placeholder="Nombre completo del colaborador">
										</div>

									</div>

									<div class="form-group">
										<div class="col-md-2">
											<td>*email (nombre de usuario)</td> 
										</div>

										<div class="col-md-10">  
											<input type="text" name="email" value="{email}" class="form-control" id="email" placeholder="Email">
										</div> 

									</div>

								</div>
							</div>

							<div class="panel panel-info">
								<div class="panel-heading">
									<h4 class="title">
										Perfies
									</h4>
								</div>
								<div class="panel-body">
									<div class="col-md-4">
										<div id="d_origen">
											<select name="origen[]" class="form-control" id="origen" multiple="multiple" size="8">
												<!-- START BLOCK : perfiles -->
												<option value="{id_perfil}" {selper}>{nombre}</option>
												<!-- END BLOCK : perfiles -->   	                   				
											</select>
										</div>
									</div>

									<div class="col-md-4">
										<div id="d_botones">
											<center>
												<input type="button" class="pasar izq btn btn-default btn-sm" value="Pasar »">
												<input type="button" class="quitar der btn btn-default btn-sm" value="« Quitar">
												<br />
												<input type="button" class="pasartodos izq btn btn-default btn-sm" value="Todos »">
												<input type="button" class="quitartodos der btn btn-default btn-sm" value="« Todos">
											</center>
										</div>
									</div>

									<div class="col-md-4">
										<div id="d_destino">

											<select name="destino[]" class="form-control" id="destino" multiple="multiple" size="8">
												<!-- START BLOCK : perfilesasign -->
												<option value="{id_perfil}" {selper}>{nombre}</option>
												<!-- END BLOCK : perfilesasign -->   

											</select>
										</div>
									</div>

								</div>
							</div>


							<div class="panel panel-info">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-md-2">
											<label for="id_empresa">Empresa</label>
										</div>

										<div class="col-md-10">
											<select class="form-control" name="id_empresa"  id="id_empresa">
												<!-- START BLOCK : empresas -->
												<option value="{id_empresa}" {selemp}>{nombre}</option>
												<!-- END BLOCK : empresas -->   	            				
											</select>
										</div>

									</div>


									<div class="form-group">
										<div class="col-md-2">
											<label for="visiblesistemas">Visible Sistemas</label>
										</div>

										<div class="col-md-10">
											<input type="checkbox" {chekeado} value="1" class="checkbox" id="visiblesistemas" name="visiblesistemas">

										</div>

									</div>

									<div class="form-group">
										<div class="col-md-2">
											<label for="resetpass">Resetear Password</label>
										</div>

										<div class="col-md-10">
											<input type="checkbox" value="1" class="checkbox" id="resetpass" name="resetpass">

										</div>

									</div>

								</div>
							</div>
							
									<div class="pull-right">	            			
										<input type="submit" class="btn btn-primary" value="Guardar" name="guardar">
										&nbsp;
										<a href="control.php?mod=usuarios&acc=con" class="btn btn-warning" >Regresar</a>            
									</div>	            			
							
							
							<input type="hidden" name="mod" value="usuarios">
							<input type="hidden" name="acc" value="save">
							<input type="hidden" name="id_usuario" value="{id_usuario}">
						</form>

						<!--/Formulario / Tabla-->
					</div>
				</div>
			</div>
			<!--/Contenido-->
		</div><!--/.col-md-12-->
	</div>
</div>



<!-- 
Si escriben la estafeta  se llenaran autimaticamente los demas campos y se bloqueara la edicion

Si no escribe la estefeta es necesario escribir los datos que solicita el formulario
-->

<script type="text/javascript">
$(document).ready(function(){
	$("#estafeta" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
				type: "GET",
				url: "control/usuarios/autouser.php",
				dataType: "json",
				data: {
					term: request.term,
				},
				success: function( data ) {
					response(data);                
				}
			});
		},
		select: function(event,ui){
			$("#idestafeta").val('');
			$("#nomre_emp").val('');
			$("#email").val('');

			$("#idestafeta").val(ui.item.estafeta);
			$("#nomre_emp").val(ui.item.nombre_empleado);
			if(ui.item.email!="dummy@toks.com.mx"){
				$("#email").val(ui.item.email);
			}
		},
		minLength: 3
	});
});
</script>