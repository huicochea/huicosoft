<?php
require('template/class.TemplatePower.inc.php');
include("funciones_php/funciones.php");
session_start();
//error_reporting(0);
error_reporting(E_ALL);


$mod = $_POST['mod'];
$acc = $_POST['acc'];
if(!isset($mod)){
    $mod = $_GET['mod'];
    $acc = $_GET['acc'];
}


if(isset($mod)){
    if($mod == 'log'){
        if(isset($acc)){
            if($acc == "in"){//Verifica que sea Inicio session
                $usr  = trim($_POST['email']);//Nombre de usuario
                $pass  = trim($_POST['pass']);//Contraseña

                include("config/connect.php");
          		                
                $sql ="SELECT u.id_usuario,
                            u.password,
                            u.nombre_completo,
                            u.email,
                            u.id_empresa,
                            u.visibles_sistemas,
                            u.estafeta,
                            p.nombre,
                            p.id_permisos,
                            p.id_perfil,
                            u.actualiza_pass
                        FROM usuario u, perfiles_usuarios pu, perfil p
                        WHERE u.email = '$usr' AND u.activo = 1
                        AND u.id_usuario = pu.id_usuario
                        AND p.id_perfil = pu.id_perfil";
                
                $rs = mssql_query($sql,$conn);
	            $validado = false;
		        while($row = mssql_fetch_row($rs)){
                    if($row[1] == $pass){
                            $validado     = true;
                            $_SESSION['id_usuario'] = $row[0];
                            $_SESSION['id_usuario_entro'] = $row[0];
                            $_SESSION['nombre_completo'] = $row[2];
                            $_SESSION['email'] = $row[3];		                    
                            $_SESSION['id_empresa'] = $row[4];
                            $_SESSION['visibles_sistemas']  = $row[5];                                                                                
                            $_SESSION['estafeta'] = $row[6];
                            $_SESSION['nombre_perfil']  = $row[7];
                            $_SESSION['permisos']  = $row[8];
                            $_SESSION['actualiza_pass']  = $row[10];

                            if($row[9] == 1){//Super Admin
                                $_SESSION['superadmin']=1;                                
                            }
                            else{
                                $_SESSION['superadmin']=0;  
                            }
                    }
                }
                
                if($validado){

                    //lista de permisos
                    //1  permiso, 0 no permiso
                    $_SESSION['pendientes_autorizar']=0;
                    $lista_permisos = array("solo_suyo"=>1
                        ,"invita_usr_funcional"=>0
                        ,"cambiar_estatus"=>0
                        ,"ver_todo"=>0
                        ,"invita_lider"=>0
                        ,"reasignar_tipo_ap"=>0
                        ,"asignar_recurso"=>0
                        ,"todo_no_cerrado"=>0
                        ,"es_lider"=>0
                        ,"es_ku"=>0
                        ,"es_gtesistemas"=>0
                        ,"es_desarrollador"=>0);
                    $_SESSION['lista_permisos'] = $lista_permisos;
                    //obtener los perfiles del usuario
                    $sqlperfiles = "SELECT id_perfil FROM perfiles_usuarios WHERE id_usuario ='".$_SESSION['id_usuario']."' AND fecha_baja is null ";
                    $rsperfil = mssql_query($sqlperfiles,$conn);
                    $resgistros = mssql_num_rows($rsperfil);
                    if($resgistros>0){
                        $lista_perfiles= array();
                        while ($row = mssql_fetch_row($rsperfil)) {
                            $item = array("id_perfil"=>$row[0]);
                            array_push($lista_perfiles, $item);
                        }
                    }
                    else{
                        //Si no tiene ningun perfil asociado es un error;
                    }
                    $_SESSION['listaperfilesusr']=$lista_perfiles;

                    //Asignamos los permisos acorde a su perfil
                    foreach ($lista_perfiles as $perfiltiene) {
                        //Switch para avilitar los permisos del perfil
                        switch ($perfiltiene['id_perfil']) {
                            case '1':
                                //Super admin
                                $_SESSION['lista_permisos']['solo_suyo']=1;
                                $_SESSION['lista_permisos']['invita_usr_funcional']=1;
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;
                                $_SESSION['lista_permisos']['ver_todo']=1;
                                $_SESSION['lista_permisos']['invita_lider']=1;
                                $_SESSION['lista_permisos']['asignar_recurso']=1;
                                $_SESSION['visibles_sistemas'] = 1;
                                break;                            
                            case '2':
                                //Solicitante
                                $_SESSION['lista_permisos']['invita_usr_funcional']=1;
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;
                                break;
                            case '3':
                                //Aprobador GTE Aplicacion
                                $_SESSION['lista_permisos']['invita_usr_funcional']=1;
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;

                                break;
                            case '4':
                                //Aprobador KU
                                $_SESSION['lista_permisos']['invita_usr_funcional']=1;
                                $_SESSION['lista_permisos']['es_ku']=1;          
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;                      

                                break;
                            case '5':
                                //Aprobador GTE Sistemas
                                $_SESSION['lista_permisos']['invita_usr_funcional']=1;
                                $_SESSION['lista_permisos']['invita_lider']=1;
                                $_SESSION['lista_permisos']['ver_todo']=1;                                
                                $_SESSION['pendientes_autorizar']=1;
                                $_SESSION['lista_permisos']['es_gtesistemas']=1; 
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;                                                               

                                break;
                            case '6':                                
                                //Aprobador Lider de Sistema
                                $_SESSION['lista_permisos']['invita_usr_funcional']=1;
                                $_SESSION['lista_permisos']['reasignar_tipo_ap']=1;    
                                $_SESSION['lista_permisos']['invita_lider']=1;
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;
                                $_SESSION['lista_permisos']['asignar_recurso']=1;
                                $_SESSION['lista_permisos']['es_lider']=1;                                
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;

                                break;
                            case '7':                                
                                //Desarrollador
                                $_SESSION['lista_permisos']['es_desarrollador']=1;
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;
                            

                                break;
                            case '8':
                                //DBA
                                $_SESSION['lista_permisos']['todo_no_cerrado']=1;
                                $_SESSION['lista_permisos']['cambiar_estatus']=1;
                                

                                break;                                
                            
                            default:
                                # code...
                                break;
                        }

                    }
                    
                    //exit();

                    //Varificar si cunta con estafeta y de ser así obtener sus datos complementarios 
                    //Clave_unidad, nombre_unidad, etc.              
                    if(trim($_SESSION['estafeta'])!=''){//Tiene estafeta
                       $sql2 = "SELECT CLAVE_UNIDAD,NOMBRE,ORGANIZACION,PUESTO,EMAIL 
                                FROM RH.dbo.MEMPLEADOS WHERE ESTAFETA = '".$_SESSION['estafeta']."'
                                AND FECHA_BAJA IS NULL";
                       

                        $rs2= mssql_query($sql2);
                        
                        while ($row = mssql_fetch_row($rs2)) {
                            $_SESSION['clave_unidad'] = $row[0];
                            $_SESSION['nombre'] = $row[1];
                            $_SESSION['unidad'] = $row[2];
                            $_SESSION['puesto'] = $row[3];
                            $_SESSION['email'] = $row[4];
                        }
                        

                        //Quitar los prefijos
                                $item_exp = explode(" ", $_SESSION['unidad']);
                                $prefijos = array("FAST","SGG","TOKS","CUP","Estacionamiento","SGG","TOKS","PANDA","ORC","SET","BEER","FAST","AAG","OBF","ORC");
                                if($item_exp[0]=="FAST"){
                                    array_shift($item_exp);
                                }elseif($item_exp[0]=="SET"){
                                    array_shift($item_exp);
                                    array_shift($item_exp);
                                }elseif($item_exp[0]=="TOKS"){
                                    array_shift($item_exp);
                                }elseif($item_exp[0]=="SGG"){
                                    array_shift($item_exp);
                                    if($item_exp[0]=="Direccion"||$item_exp[0]=="Dirección"||$item_exp[0]=="Direcciòn"||$item_exp[0]=="Gerencia"||$item_exp[0]=="Subdireccion"||$item_exp[0]=="Ejecutivos"){
                                        array_shift($item_exp);
                                    }
                                    if($item_exp[0]=="CUP"||$item_exp[0]=="Cup"){
                                        array_shift($item_exp);
                                        array_shift($item_exp);
                                    }
                                    if($item_exp[0]=="de"){
                                        array_shift($item_exp);
                                    }
                                    if($item_exp[0]=="Estacionamiento"){
                                        array_shift($item_exp);
                                    }
                                }elseif($item_exp[0]=="Cafeteria"||$item_exp[0]=="Cafeeria"||$item_exp[0]=="Cafetria"){
                                    array_shift($item_exp);
                                }elseif($item_exp[0]=="Estacionamiento"){
                                    array_shift($item_exp);
                                }
                                elseif($item_exp[0]=="ORC"){
                                    array_shift($item_exp);
                                }
                                elseif($item_exp[0]=="AAG"){
                                    array_shift($item_exp);
                                }            
                                elseif($item_exp[0]=="BEER"){
                                    array_shift($item_exp);
                                }
                                elseif($item_exp[0]=="PANDA"){
                                    array_shift($item_exp);
                                }
                                elseif($item_exp[0]=="OBF"){
                                    array_shift($item_exp);
                                }                                    
                                $nombre_dest = implode(" ",$item_exp);

                                
                                $_SESSION['unidad'] = $nombre_dest;
                                
                    }                

                    $_SESSION['ip_usuario']=getRealUserIp();
                    $sql="INSERT INTO log_accesos (email,ip_accedio) VALUES('$usr','".$_SESSION['ip_usuario']."')";
                    mssql_query($sql,$conn);

                    //Cola de mails
                    $_SESSION['envio_mails'] = 0;
                    if($_SESSION['lista_permisos']['ver_todo']==1){//Si es lider la primer pagina que le muetsra es la de consulta requerimientos lider
                        echo"<script type='text/javascript'>
                            window.location='control.php?mod=main&acc=con_todo';
                    </script>";         

                    }
                    else{
                        echo"<script type='text/javascript'>
                            window.location='control.php?mod=main&acc=con';
                    </script>";                                        
                    }                    
                }else{
                    echo"<script type='text/javascript'>
                            alert('Usuario incorrecto');
                            window.location='acceso.php';
                        </script>";
                }
                //************************************
                include("config/disconnect.php");
            }else if($acc == "out"){
                session_unset();
               echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";
            }else if($acc == ""){
                session_unset();
               echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";
            }
        }
    }else if($mod == ""){
               session_unset();
               echo"<script type='text/javascript'>
                    window.location='index.php';
                </script>";
    }
}else{
    session_unset();
   echo"<script type='text/javascript'>
        window.location='index.php';
    </script>";
}