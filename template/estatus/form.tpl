<link rel="stylesheet" href="css/auxiliar.css" />
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
   <div class="col-md-12 contenedorcomentarios">
     <div class="col-md-12">

      <!--Contenido-->
      <div class="col-md-10 col-md-offset-1">
       <!--Formulario-->
       <div class="panel panel-default">
        <div class="panel-body">
         <form class="form-horizontal" role="form" action="control.php" method="post"  onsubmit="return valida_estatus();" enctype="multipart/form-data">

          <div><!--inner-form-->

           <div class="panel panel-info">
            <div class="panel-heading">
             <h4 class="panel-title"><i class="icon ion-clock text-info"></i> Info</h4>
           </div>

           <div class="panel-body">
             <div class="col-md-1"></div>
             <div class="col-md-10">
              <div class="form-group">

               <label for="nomre_emp">*Nombre</label>
               <div>
                <input type="text" value="{nombre}" class="form-control" id="nomre_emp" name="nombre" placeholder="Nombre del estatus"/>
              </div>

            </div>

            <div class="form-group">

             <label for="descripcion">Descripcion</label> 
             <div>  
              <input type="text" name="descripcion" value="{descripcion}" class="form-control" id="descripcion" placeholder="Descripción del estatus"/>
            </div> 

          </div>

          <div class="form-group">

           <label for="fin_proceso">Fin de proceso</label> <!-- Consultar los tipos de aplicaciones  -->
           <div>  
            <input type="checkbox" class="checkbox" {chekeado} name="fin_proceso" id="fin_proceso" value="1"/>
          </div> 

        </div>

        <div class="form-group">

  

          <span class="btn btn-warning btn-file">
           Logotipo del estatus <input type="file"  name="logo" id="logo" placeholder="Logotipo del estatus">
         </span>

         Actual <img class="img-responsive" src="{icono}"> 
       </div>

     </div>  
   </div>
   <div class="col-md-1"></div>
 </div>
</div>


<div class="panel panel-info">
 <div class="panel-heading">
  <h4 class="panel-title"><i class="icon ion-clock text-info"></i> Perfiles</h4>

</div>
<div class="panel-body">
  <div class="col-md-12">

   <div class="col-md-4">
    <div id="d_origen">
     <select name="origen[]" id="origen" multiple="multiple" size="8" class="form-control">
      <!-- START BLOCK : noasign -->
      <option value="{id_perfil}" {selper}>{nombre_perfil}</option>
      <!-- END BLOCK : noasign -->                                    
    </select>
  </div>
</div>

<div class="col-md-4">
  <center>
   <div id="d_botones">
    <input type="button" class="pasar izq btn btn-default btn-sm" value="Pasar »">
    <input type="button" class="quitar der btn btn-default btn-sm" value="« Quitar">
    <br />
    <input type="button" class="pasartodos izq btn btn-default btn-sm" value="Todos »">
    <input type="button" class="quitartodos der btn btn-default btn-sm" value="« Todos">

  </div>
</center>
</div>
<div class="col-md-4">

  <div id="d_destino">

   <select name="destino[]" id="destino" multiple="multiple" size="8" class="form-control">
    <!-- START BLOCK : asign -->
    <option value="{id_perfil}" {selper}>{nombre_perfil}</option>
    <!-- END BLOCK : asign -->   

  </select>
</div>
</div>
</div>
</div><!--/.panel-body-->
</div><!--/.panel-info-->


<tr>
 <td colspan="4">
  <center>                            
   <input type="submit" class="btn btn-success" value="Guardar" name="guardar">
   &nbsp;
   <a href="control.php?mod=estatus&acc=con" class="btn btn-warning" >Regresar</a>             
 </center>                           
</td>
</tr>
</div><!--/.inner-form-->

<input type="hidden" name="mod" value="estatus">
<input type="hidden" name="acc" value="save">
<input type="hidden" name="id_estatus" value="{id_estatus}">
</form>
</div>
</div>
<!--/Formulario-->
</div>
<!--/Contenido-->

</div><!--/.col-md-12-->
</div>

