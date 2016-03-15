    <div class="sub-nav hidden-sm hidden-xs"  style="margin-top: -20px;">
        <ul>
            <li><a class="heading" href="" data-original-title="" title="">Consulta de Usuarios</a></li>
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
                    <p class="bg-success">{exito}</p>
                    <br>
                    <div style="float: left">
                        <a href="control.php?&mod=usuarios&acc=new">
                            <button class="btn btn-primary">
                                <span class="xfa" title="">Nuevo usuario</span>
                            </button>
                        </a>
                        <a href="control.php?mod=conf&acc=con" class="btn btn-warning">
                          <span class="xfa" title="">Regresar</span>
                      </a>

                  </div>
                  <br>
                  <br>
                  <center>
                    <div>

                        <div class="col-md-12"><!--form-superior-->
                            <div>
                                <form action="control.php" role="form" class="form-inline">
                                    <div class="col-md-12">

                                      <div class="row">  
                                        <div class="form-group"> 
                                            <label for="nombre_usuario">Nombre: </label> 
                                            <input class="form-control" name="nombre_usuario" id="nombre_usuario"/>
                                        </div>

                                        <div class="form-group"> 
                                            <label for="usuario_busca">Usuario: </label> 
                                            <input class="form-control" name="usuario_busca" id="usuario_busca"/>
                                        </div>

                                        <div class="form-group"> 
                                            <label for="id_perfilSel">Perfil:</label>
                                            <select class="form-control" name="id_perfilSel">
                                                <option value="*">Seleccione...</option>

                                                <!-- START BLOCK : perfiles -->
                                                <option value="{id_perfil}">{nomreperfil}</option>
                                                <!-- END BLOCK : perfiles -->   

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Buscar</button>
                                        </div>
                                    </div>

                                </div>

                                <input type="hidden" name="mod" value="usuarios">
                                <input type="hidden" name="acc" value="con">
                            </form>
                        </div>            
                    </div><!--/.form-superior-->

                </div>
                <br>
                <br>
                <div class="table-responsive">

                    <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                        <thead>
                            <tr class="info">
                                <th style="text-align: center ;width: 50px">N°</th>
                                <th>Nombre completo</th>
                                <th>nombre usuario</th>
                                <th>Perfil</th> 
                                <th>Empresa</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- START BLOCK : usuarios -->
                            <tr>
                                <td  style="text-align: center ;width: 50px">{rows}</td>
                                <td>{nombre}</td> 
                                <td>{email}</td> 

                                <td>
                                    <div class="listausrperfil">
                                        <!-- START BLOCK : nombreperfiles -->
                                        {nombre_perfil}    
                                        <!-- END BLOCK : nombreperfiles -->
                                    </div>                        
                                </td>                

                                <td>{nombre_empresa}</td> 
                                <td style="text-align: center ;width: 50px"> 
                                    <a href="control.php?mod=usuarios&acc=new&id_usuario={id_usuario}"> 
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                                    </a>
                                </td>
                                <td style="text-align: center ;width: 50px"> 
                                    <a href="#" class="elimina_usuario" id="{id_usuario}" name="{nombre}">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                                    </a>                    
                                </td>         
                            </tr>     
                            <!-- END BLOCK : usuarios -->   

                            <!-- END BLOCK : paginado -->   
                            <tr>
                                <td colspan="6" align="center">
                                    <center>
                                        {anterior}                        
                                        {siguiente}
                                    </center>
                                </td>
                            </tr>
                            <!-- START BLOCK : paginado -->
                        </tbody>            
                    </table>
                </div>
            </center>
            <!--/Formulario / Tabla-->
        </div>
    </div>
</div>
<!--/Contenido-->
</div><!--/.col-md-12-->
</div>
</div>