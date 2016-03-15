<?php
	session_start();
	include("../../config/connect.php");
	include("../../class/usuario.php");

	$pass = $_GET['pass'];
	$objusuario = new Usuario($conn);
	
	$objusuario->setId_usuario($_SESSION['id_usuario']);
	$objusuario->setPassword($pass);
	$exito = $objusuario->newpass();
	if($exito==1){
		$_SESSION['actualiza_pass']=0;
	}
	echo $exito;

?>
