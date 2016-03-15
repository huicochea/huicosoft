<?php
	include("../../PHPMailer/class.phpmailer.php");
	include("../../PHPMailer/class.smtp.php");
	
	class EnvioCorreo{
		private $cuerpo;
		private $asunto;
		private $destinatario;
		private $ccopia;
		private $mensaje;

		function __construct($destinatario,$ccopia) {
			$this->destinatario =$destinatario;
			$this->ccopia = $ccopia;
		}

		function setDestinatario($destinatario){
				$this->destinatario=$destinatario;
		}

		function setCcopia($copia){
			$this->ccopia=$copia;
		}

		function getDestinatario(){
			return $this->destinatario;
		}

		function getCcopia(){
			return $this->ccopia;
		}
		
		function getMensaje(){
			return $this->mensaje;
		}		

		function resetpassword($token){//Envio de password temporal para que se cambnie el password al acceder al sistema
			include("../../config/connect.php");
			include("../../class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();
			
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			
			

			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->FromName = "Contraseña temporal Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"			
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = "Contraseña de acceso temporal al sistema requerimientos";									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML("<br>USUARIO: <strong>".$this->destinatario."</strong><br> CONTRASEÑA: <strong>".$token."</strong><br><br>");// si el cuerpo del mensaje es HTML			
			$mail->AddAddress($this->destinatario);			//direcion de correo
			
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}

			include("../config/disconnect.php");
		}



		function enviar_comprobante($texto){//Envio de password
			include("config/connect.php");
			include("class/correo.php");
			$correo =  new Correo($conn);
			$correo->setID("1");
			$correo->consultacorreoID();
			
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $correo->getHostMail();    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $correo->getPortMail();				 		   //Puerto del servidor 
			$mail->Username = $correo->getusUarioMail();				 	  //usuario de cuenta
			$mail->Password = $correo->getPassMail(); 
			
			$mail->From = $correo->getCuentaMail();										// dirección remitente, p. ej.: no-responder@miempresa.com
			//$mail->FromName = $correo->getNameMail();									// nombre remitente, p. ej.: "Servicio de envío automático"
			$mail->FromName = "Comprobante de firma";									// nombre remitente, p. ej.: "Servicio de envío automático"			
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación
			$mail->Subject = "Comprobante de firma";									// asunto y cuerpo alternativo del mensaje
			$mail->MsgHTML(utf8_decode($texto));										// si el cuerpo del mensaje es HTML			
			//$mail->MsgHTML("Su contraseña temporal para el usuario ".$usr_oracle." es es: ".$pass."\n"."Puedes acceder al sistema desde la siguiente liga ");										// si el cuerpo del mensaje es HTML			
			
			//$mail->AddAddress("eduardo.castellanos@next-technologies.com.mx");			//direcion de correo
			$mail->CharSet = 'UTF-8';
			$mail->AddAddress($this->destinatario);			//direcion de correo
			
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}

			include("../config/disconnect.php");
		}		
		
	}
?>