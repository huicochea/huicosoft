<?php
	include("../../config/connect.php");
	include("../../class/usuario.php");
	include("../../Email/EnvioCorreo.php");
	include("../../funciones_php/funciones.php");

	$email = $_GET['email'];

		if($email!=''){
		$token = obtenToken(7);                 

		$objusuario = new Usuario($conn);
		$objemail = new EnvioCorreo($email,$email);

		$objusuario->setEmail($email);
		
		$exito = $objemail->resetpassword($token);
		if($exito==true){//Indicamos que la contraseña se debe de restaurar
			$exito= $objusuario->resetpass($token);
			if($exito==1){
				echo 1;//Exito
			}
			else{
				echo 3;//error en actualizacion de datos de usuario
			}

		}
		else{//Error al enviar el email
			echo 4;
		}		
	}
	else{
		echo 2;//No se escrio el email
	}


	//echo json_encode($arr);
?>
