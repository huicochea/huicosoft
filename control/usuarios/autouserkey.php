<?php
	include("../../config/connect.php");
	include("../../class/usuario.php");
	$objusuario = new Usuario($conn);
	$estafeta = $_GET['term'];
	$objusuario->setestafeta($estafeta);

	$arr = $objusuario->usuarioByestafetakey();

	echo json_encode($arr);
?>
