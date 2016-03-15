<?php
	include("../../config/connect.php");
	include("../../class/Estatus.php");
	$objestatus = new Estatus($conn);
	$id_estatus = $_GET['id_estatus'];
	$objestatus->setId_estatus($id_estatus);

	$arr = $objestatus->listaByid();//Busca usuarios que no son Lideres ni gerentes de sistema

	echo $arr['fin_proceso'];
?>
