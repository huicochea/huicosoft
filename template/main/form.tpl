    <!-- liteAccordion css -->
    <link href="accordion/css/liteaccordion.css" rel="stylesheet" />
    <!-- easing -->
    <script src="accordion/js/jquery.easing.1.3.js"></script>
    <!-- liteAccordion js -->
    <script src="accordion/js/liteaccordion.jquery.js"></script>
    <!--[if lt IE 9]>
            <script>
                document.createElement('figure');
                document.createElement('figcaption');
            </script>
            <![endif]-->



            <!--Menu Azul-->
            <div class="sub-nav hidden-sm hidden-xs"  style="margin-top: -20px;">
              <ul>
                <li><a class="heading" href="" data-original-title="" title="">Nuevo Requerimiento</a></li>
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
   <style>
   .rads label{
    margin-right: 20px;
    margin-left: 20px;
  }
  .widget{
    background: transparent none repeat scroll 0 0 !important;
  }
  .form-control{
    background-color: #ededed !important; 
  }

  .bcolor{
    border: solid lightblue thin;
  }

  </style>
  <div class="col-md-12 contenedorcomentarios">
    <div class="col-md-12">
      <!--Contenido-->
      <!--Formulario / Tabla-->
      <br>
      <center>
        <form action="control.php?mod=main&acc=save" method="post" enctype="multipart/form-data" name="nuevorequerimiento"  id="nuevorequerimiento" class="form-horizontal" role="form">
          <div id="one">        
            <ol>
              <li>                
                <h2><span>Datos de principales</span></h2>
                <!--Panel-1-->
                <div class="formre">

                  <div class="widget col-md-11 " style="padding-bottom: 5px;">
                    <div class="widget-header">
                      <div class="title">
                        <span class="">*</span>Tipo de Solicitud
                      </div>
                    </div>
                    <div class="widget-body clearfix">

                      <center>
                        <div class="rads">
                          <label class="radio-inline">
                            <input type="radio" class="tipo_sol" value="1" name="tipo_sol">
                            Nuevo
                          </label>


                          <label class="radio-inline">
                            <input type="radio" class="tipo_sol" value="2" name="tipo_sol">
                            Cambio y/o Mejora
                          </label>


                          <label class="radio-inline">
                            <input type="radio" class="tipo_sol" value="3" name="tipo_sol">
                            Indicente
                          </label>
                        </div>

                      </center>  
                    </div>
                  </div>

                  <div class="widget col-md-11" style="padding-bottom: 5px;">
                    <div class="widget-header">
                      <div class="title">
                        Detalles
                      </div>
                      <div class="widget-body clearfix bgn_color">
                        <div class="rellenosuper45 form-group">
                          <label for="tipoap" class="col-md-4">
                            <span class="">*</span>Tipo de sistema
                          </label>
                          <div class="col-sm-8">
                            <select class="form-control bcolor" id="tipoap" name="tipoap">
                              <option value="*">Selecciona...</option>
                              <!-- START BLOCK : tipo_aplicacion -->
                              <option value="{id_tipo_aplicacion}">{nombre}</option>
                              <!-- END BLOCK : tipo_aplicacion -->   
                            </select>
                          </div>
                        </div>

                        <div class="form-group modulos" style="display:none">
                          <label class="col-sm-4" for="id_modulo">*Módulos actuales</label>
                          <div class="col-sm-8">
                            <select class="form-control bcolor" id="id_modulo" name="id_modulo">

                            </select>
                          </div>
                        </div>

                        <div class="form-group sistemasac" style="display:none">
                          <label class="col-sm-4" for="id_aplicacion">Aplicaciones Actuales</label>
                          <div class="col-sm-8">
                            <select class="form-control bcolor" id="id_aplicacion" name="id_aplicacion">

                            </select>
                          </div>
                        </div>                    

                        <div class="form-group sistemanomb" style="display:none">
                          <label class="col-sm-4" for="nombresistema"><span class="">*</span>Nombre </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control bcolor" id="nombresistema" name="nombresistema" placeholder="Nombre ">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-4" for="id_empresa">
                            <span class="">*</span>Empresa a la que pertenece
                          </label>

                          <div class="col-sm-8">
                            <select class="form-control bcolor" id="id_empresa" name="id_empresa">
                              <option value="*">Selecciona...</option>
                              <!-- START BLOCK : empresas -->
                              <option value="{id_empresa}">{nombre}</option>
                              <!-- END BLOCK : empresas -->   
                            </select>
                          </div>

                        </div>


                        <div class="form-group">
                          <label class="col-sm-4" for="id_empresa">
                            <span class="">*</span>Severidad
                          </label>

                          <div class="col-sm-8">
                            <select class="form-control bcolor" id="id_severidad" name="id_severidad">
                              <option value="*">Selecciona...</option>
                              <!-- START BLOCK : severidad -->
                              <option value="{id_severidad}">{nombre_severidad}</option>
                              <!-- END BLOCK : severidad -->   
                            </select>
                          </div>

                        </div>

                      </div>
                    </div>

                  </div>
                  <!--Panel-1-->
                </li>            
                <li>
                  <h2><span>Datos del requerimiento</span></h2>

                  <div class="formre">
                    <div class="widget col-md-11">
                      <div class="widget-header">
                        <div class="title">
                          Detalle
                        </div>
                      </div>
                      <div class="widget-body clearfix">
                        <div class="form-group" style="margin-top: 5px;">                    
                          <label class="col-sm-4" for="asolicita">
                            <span class="">*</span>Area Solicitante
                          </label>

                          <div class="col-sm-8">
                            <input type="text" class="form-control bcolor" readonly name="asolicita" id="asolicita" placeholder="Area Solicitante" value="{nombre_unidad}">
                          </div>
                        </div>

                        <div class="form-group" style="margin-top: 5px;">                        
                          <label class="col-sm-4" for="nombre_requerimiento">
                            <span class="">*</span>Título
                          </label>

                          <div class="col-sm-7">
                            <input type="text" class="form-control bcolor" id="nombre_requerimiento" name="nombre_requerimiento" placeholder="Nombre del requerimiento" maxlength="500">
                          </div>                        
                          <div id='contadortitulo' class='contadores col-md-1'>500</div>
                        </div>

                        <div class="form-group" style="margin-top: 5px;">
                          <label class="col-sm-4" for="funcion_principal">
                            <span class="">*</span>Objetivo
                          </label>

                          <div class="col-sm-7">
                            <textarea class="form-control bcolor" placeholder="Funcion principal" id="funcion_principal" name="funcion_principal"  maxlength="500"></textarea>
                          </div>
                          <div id='contadorobj' class='contadores col-md-1'>500</div>
                        </div>

                        <div  class="form-group" style="margin-top: 5px;">                        
                          <label class="col-sm-4" for="beneficios">
                            <span class="">*</span>Beneficio
                          </label>

                          <div class="col-sm-7">
                            <textarea class="form-control bcolor" rows="4" placeholder="Beneficios" name="beneficios" id="beneficios"  maxlength="500"></textarea>
                          </div>
                          <div id='contadorbeneficio' class='contadores col-md-1'>500</div>
                        </div>

                        <div class="content_adjuntos form-group" style="margin-top: 5px;">
                          <div class="adjuntos">
                            <label class="col-md-4" for="adjuntos">
                              <span class=""> *</span>Archivo adjunto
                            </label>

                            <div class="adj col-md-6">
                              <input type="file" name="adjuntos[]" id="adjuntos" class="archivo">
                            </div>
                          </div>

                          <div class="col-md-2">
                            <p for="inputPassword3" class=""></p>
                            <span class="glyphicon glyphicon-plus btn btn-default" id="clonar" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-minus btn btn-default" id="quitar" aria-hidden="true"></span>
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <h2><span>Definimientos de negocio</span></h2>
                  <div class="formre">
                    <!--Negocio-->
                    <div class="widget col-md-11">
                      <div class="widget-header">
                        <div class="title">
                          Reglas
                        </div>
                      </div>
                      <div class="widget-body clearfix">
                        <div  class="form-group" style="margin-top: 5px;">
                          <label class="col-md-4" for="reglas">*Reglas de negocio</label>
                          <div class="col-md-7">
                            <textarea class="form-control bcolor" placeholder="Reglas de negocio" name="reglas" id="reglas"  maxlength="500"></textarea>
                          </div>
                          <div id='contadorreglas' class='contadores col-md-1'>500</div>
                        </div>

                        <div class="form-group"  style="margin-top: 5px;">

                          <label class="col-md-4" for="requerimientos">
                            <span class=""></span>Requerimientos técnicos
                          </label>

                          <div class="col-md-7">
                            <textarea class="form-control bcolor" placeholder="Requerimientos técnicos" name="requerimientos" id="requerimientos"  maxlength="500"> </textarea>
                          </div>

                          <div id='contadorreq' class='contadores col-md-1'>500</div>

                        </div>

                        <div  class="form-group" style="margin-top: 5px;">
                          <label class="col-md-4" for="entrada">
                            <span class="">*</span>Datos de entrada
                          </label>

                          <div class="col-md-7">
                            <textarea class="form-control bcolor" placeholder="Datos de entrada" name="entrada" id="entrada"  maxlength="500"></textarea>
                          </div>
                          <div id='contadorentrada' class='contadores col-md-1'>500</div>
                        </div>

                        <div  class="form-group" style="margin-top: 5px;">
                          <label class="col-md-4" for="salida">
                            <span class="">*</span>Datos de salida
                          </label>

                          <div class="col-md-7">
                            <textarea class="form-control bcolor" placeholder="Datos de salida" name="salida" id="salida"  maxlength="500"></textarea>
                          </div>
                          <div id='contadorsalida' class='contadores col-md-1'>500</div>
                        </div>



                        <div style="margin-top: 5px;" class="form-group {visiblesistemas}">
                          <label class="col-sm-4" for="urspide">
                            Usuario solicitante
                          </label>

                          <div class="col-sm-8">
                            <input name='usrsolicitante' id='usrsolicitante' class="form-control bcolor"/>                            
                          </div>                         
                        </div>

                      </div>
                    </div>
                    <!--Negocio-->
                  </div>
                </li>

                <li id="asign_recurso">
                  <h2><span>Asignación de recursos</span></h2>
                  <div class="formre">
                    <!--Ultimo Slide-->
                    <div class="widget col-md-11">
                      <div class="widget-header">
                        <div class="title">
                          Detalle
                        </div>
                      </div>
                      <div class="widget-body">


                        <div class="form-group" style="margin-top: 5px;">                        
                          <label class="col-md-4" for="perfil">
                            <span class="">*</span>Beneficio
                          </label>

                          <div class="col-md-8">
                            <textarea class="form-control bcolor" rows="4" placeholder="Beneficios"></textarea>
                          </div>
                        </div>


                        <div class="form-group" style="margin-top: 5px;">                        
                          <label class="col-md-4" for="perfil"><span class="">*</span>Recurso</label>
                          <div class="col-md-8">
                            <select class="form-control bcolor" name="id_recurso" id="id_recurso">
                              <option value="*">Selecciona...</option>
                              <option>Interno</option>
                              <option>Externo</option>
                            </select>
                          </div>
                        </div>


                        <div class="form-group internos" style="margin-top:5px; display:none">
                          <label class="col-md-4" for="perfil">Empleado</label>
                          <div class="col-md-8">
                            <select class="form-control bcolor" id="#">
                              <option value="Solicitante">Juan Manuel</option>
                              <option value="Desarrollador">Juli Rodriguez </option>
                              <option value="Desarrollador">Mario Rojas</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group empresa_des" style="margin-top:5px; display:none">
                          <label class="col-md-4" for="perfil">Empresa</label>
                          <div class="col-md-8">
                            <select class="form-control bcolor" id="#">
                              <option value="Solicitante">Next Technologies</option>
                              <option value="Desarrollador">Praxis</option>
                              <option value="Desarrollador">Lab BC</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group externos" style="margin-top:5px; display:none">
                          <label class="col-md-4" for="perfil">Empleado</label>
                          <div class="col-md-8">
                            <select class="form-control bcolor" id="#">
                              <option value="Solicitante">Juan Manuel</option>
                              <option value="Desarrollador">Juli Rodriguez </option>
                              <option value="Desarrollador">Mario Rojas</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Ultimo Slide-->
                  </div>
                </li>

              </ol>
              <noscript>
                <p>JavaScript requerido.</p>
              </noscript>

            </div><!-- Termina div one-->
          </form>
        </center>
        <br>
        <div class="col-md-12">
          <form class="form-horizontal">
            <div>
              <center>
                <a class="btn btn-default" id="regresar">Regresar</a>
                <a class="btn btn-default" id="avanzar">Siguiente</a>
              </center>
            </div>
            <br>
          </form>
        </div>
        <!--/Formulario / Tabla-->
        <!--/Contenido-->
        <div id="guardando" style="display:none" title="GUARDANDO...">
          <img src="images/17.gif" height="100%" width="100%">
        </div>
      </div><!--/.col-md-12-->
    </div>
    <script>

    $(document).ready(function(){

      var obj = $('#one').liteAccordion('debug');
      if(obj.core.currentSlide ==0 ){
        $("#regresar").hide();
      }
      else{
        $("#regresar").show();
      }
    })



    $("#regresar").click(function(){    
      $("#avanzar").removeClass("subir");
      $('#one').liteAccordion('prev');
      $("#avanzar").text("Siguiente");    


      var obj = $('#one').liteAccordion('debug');
      if(obj.core.currentSlide ==0 ){
        $("#regresar").hide();
      }
      else{
        $("#regresar").show();
      }
    });


    if( 1=={super} ){

      $("#avanzar").click(function(){
        $("#regresar").show();
        var guarda = $("#avanzar").text();
        var obj = $('#one').liteAccordion('debug');
        if(guarda!='Guardar'){
          $('#one').liteAccordion('next');        
        }
        else{
                //Validar los datos obligatorios                
                var exito = validar_requerimiento_2();//Formulario de los encargados de asignar recursos
                if(exito==true){
                  alert("Guardando");
                }


              }
              if(obj.core.currentSlide ==3 ){
                $("#avanzar").addClass("subir");
                $("#avanzar").text("Guardar");                
                /*
                $(".subir").click(function(){
                    //validamos los campos obligatorios
                    var exito = false;
                    alert("Subiendo");
                    //$("#nuevorequerimiento").submit();
                });           
      */
    }

  });

      (function($, d) {
            // please don't copy and paste this page
            // it breaks my analytics!
            $('#one').liteAccordion({            
              onTriggerSlide: function() {
                this.find('figcaption').fadeOut();
              },
              onSlideAnimComplete: function() {
                this.find('figcaption').fadeIn();
              },
                //autoPlay: true,
                pauseOnHover: true,
                theme: 'stitch',
                rounded: true,
                enumerateSlides: true,
                containerWidth : 980,                   // fixed (px)
                containerHeight : 410,                  // fixed (px)
                headerWidth: 48
              }).find('figcaption:first').show();
          })(jQuery, document);
        }
        else{

          $("#avanzar").click(function(){
            $("#regresar").show();
            var guarda = $("#avanzar").text();
            var obj = $('#one').liteAccordion('debug');            
            if(guarda!='Guardar'){
              $('#one').liteAccordion('next');        
            }
            else{
              $( "#guardando" ).dialog({
                resizable: false,
                height:140,
                width: 50,
                modal: true,
                open: function(event, ui) { $(".ui-dialog-titlebar-close", ui.dialog | ui).hide(); }
              });

                var exito = validar_requerimiento_1();//Formulario simple
                //Agregar la ventana de guardando 


                if(exito==true){
                    //Hacemos el submit 
                    //Mostramos un guardando por que el proceso de guardado puede demorar unossegundos 
                    
                    $("#nuevorequerimiento").submit();
                    //alert("Guardando");

                  }
                  else{
                    //Cerrar ventana del guardando
                    $( "#guardando" ).dialog("close");
                  }
                }
                if(obj.core.currentSlide ==2 ){
                  $("#avanzar").text("Guardar");
                  $("#avanzar").addClass("subir");

                }
              });

    if($("#asign_recurso").remove()){
      (function($, d) {
                    // please don't copy and paste this page
                    // it breaks my analytics!
                    $('#one').liteAccordion({            
                      onTriggerSlide: function() {
                        this.find('figcaption').fadeOut();
                      },
                      onSlideAnimComplete: function() {
                        this.find('figcaption').fadeIn();
                      },
                        //autoPlay: true,
                        pauseOnHover: true,
                        theme: 'stitch',
                        rounded: true,
                        enumerateSlides: true,
                        containerWidth : 980,                   // fixed (px)
                        containerHeight : 410,                  // fixed (px)
                        headerWidth: 48
                      }).find('figcaption:first').show();
                  })(jQuery, document);
                }            
              }    



              </script>