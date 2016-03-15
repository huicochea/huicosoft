<?php
	include("../../config/connect.php");
	include("../../class/usuario.php");
	$objusuario = new Usuario($conn);
	$estafeta = $_GET['term'];
	$objusuario->setestafeta($estafeta);

	$arr = $objusuario->usuarioByestafeta_sistemas();//Busca usuarios que no son Lideres ni gerentes de sistema

	echo json_encode($arr);
?>
