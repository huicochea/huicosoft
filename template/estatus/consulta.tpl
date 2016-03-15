<div class="sub-nav hidden-sm hidden-xs"  style="margin-top: -20px;">
    <ul>
        <li><a class="heading" href="" data-original-title="" title="">Consulta estatus</a></li>
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

                    <div class="col-md-12">
                        <p class="bg-success">{exito}</p>
                        <div class="pull-left">

                            <a href="control.php?&mod=estatus&acc=new" class="btn btn-primary">
                                <span class="xfa" title="">Nuevo Estatus</span>
                            </a>

                            <a href="control.php?mod=conf&acc=con" class="btn btn-warning">
                                <span class="xfa" title="">Regresar</span>
                            </a>
                            
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-md-12">
                        <!--<table class="sortable consultas table table-hover">-->
                        <div class="table-responsive">
                            <table class="table table-responsive table-striped table-bordered table-hover no-margin">
                               <thead>
                                <tr class="info">
                                    <th style="text-align: center ;width: 50px">N°</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Fin de proceso</th>
                                    <th>Icono</th>
                                    <th style="text-align: center ;width: 80px">Editar</th>
                                    <th style="text-align: center ;width: 80px">Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- START BLOCK : estatus -->
                                <tr>
                                    <td  style="text-align: center ;width: 50px">{rows}</td>
                                    <td>{nombre}</td> 
                                    <td>{descripcion}</td> 
                                    <td>{fin_proceso}</td>
                                    <td><img src="{icono}"></td> 
                                    <td style="text-align: center ;width: 50px"> 
                                        <a href="control.php?mod=estatus&acc=new&id_estatus={id_estatus}"> 
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> 
                                        </a>
                                    </td>
                                    <td style="text-align: center ;width: 50px"> 
                                        <a href="#" class="elimina_estatus" id="{id_estatus}" name="{nombre}">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> 
                                        </a>                    
                                    </td>         
                                </tr>     
                                <!-- END BLOCK : estatus -->   

                                <!-- END BLOCK : paginado -->   
                                <tr>
                                    <td colspan="7" align="center">
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
                </div>
            </div>
        </div>
    </div>

    <!--/Contenido-->
    
</div>
<!--/.col-md-12-->
</div>
</div>
