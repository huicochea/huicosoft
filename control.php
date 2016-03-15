<?php
session_start();
require('template/class.TemplatePower.inc.php');
include('session.php');

//error_reporting(0);
error_reporting(E_ALL);
 
$exito=0;
if(!empty($_GET['exito'])){
    $exito = $_GET['exito'];
}

if(!empty($_POST['mod'])){
    $mod = $_POST['mod'];    
}
if(!empty($_POST['acc'])){
    $acc = $_POST['acc'];
}

if(!isset($mod)){
    $mod = $_GET['mod'];
    $acc = $_GET['acc'];
}

include('template/header.php');

if(isset($mod)){    
    
    if($mod == 'main'){        
        if($acc == "con"){
            include("control/main/consulta.php");
        }
        elseif($acc == "con_invitaciones"){
            include("control/main/consulta_invitaciones.php");
        }                                       
    }


}

//include("config/disconnect.php");
include('template/footer.php');
?>