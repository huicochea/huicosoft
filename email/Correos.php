<?php
	include("PHPMailer/class.phpmailer.php");
	include("PHPMailer/class.smtp.php");
	include("config/connect.php");
	include("class/correo.php");

	class Correos{
		private $cuerpo;
		private $asunto;
		private $destinatario;
		private $ccopia;
		private $mensaje;
		private $host = 'toksln01.toks.com.mx';
		private $port = 25;
		private $usuarioMail = 'admin_requerimientos@toks.com.mx';
		private $passMail = 'migueljimenez';	
		private $from= 'admin_requerimientos@toks.com.mx';

		function __construct($destinatario,$ccopia) {
			$this->destinatario =$destinatario;
			$this->ccopia = $ccopia;
			/*
			$this->$host = 
			$this->$port = 25;
			$this->usuarioMail = 'admin_requerimientos@toks.com.mx';
			$this->passMail = 'migueljimenez';
			$this->from = 'admin_requerimientos@toks.com.mx';
			*/
			
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

        function getCuerpo() {
            return $this->cuerpo;
        }

        function getAsunto() {
            return $this->asunto;
        }

        function getHost() {
            return $this->host;
        }

        function getPort() {
            return $this->port;
        }

        function getUsuarioMail() {
            return $this->usuarioMail;
        }

        function getPassMail() {
            return $this->passMail;
        }

        function getFrom() {
            return $this->from;
        }

        function setCuerpo($cuerpo) {
            $this->cuerpo = $cuerpo;
        }

        function setAsunto($asunto) {
            $this->asunto = $asunto;
        }

        function setHost($host) {
            $this->host = $host;
        }

        function setPort($port) {
            $this->port = $port;
        }

        function setUsuarioMail($usuarioMail) {
            $this->usuarioMail = $usuarioMail;
        }

        function setPassMail($passMail) {
            $this->passMail = $passMail;
        }

        function setFrom($from) {
            $this->from = $from;
        }

                                
		function nuevorequerimiento($email_usr_solicita = '',$id_requerimiento='',$nombre_requerimiento=''){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_usr_solicita);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Nuevo requerimiento";

			$fecha_solicitud = $this->getfecha();
			$mail->MsgHTML("Diste de alta un nuevo requerimiento <br><br>T&iacute;tulo del requerimiento: ".$nombre_requerimiento."<br> No. Ticket: ".$id_requerimiento.'<br>Fecha de solicitud: '.$fecha_solicitud);// si el cuerpo del mensaje es HTML			
			//.' a las '.strftime("%H:%M").' horas'
			$mail->IsHTML(true);

			

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				$this->mensaje = $mail->ErrorInfo;				
				return false;
			} else {
				return true;
			}

			exit();
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}		

		//Nuevo requerimiento
		function aviso_a_keyuser($email_usr_key = '',$id_requerimiento='',$nombre_requerimiento='',$solicitante =''){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_usr_key);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Nuevo requerimiento";

			$fecha_solicitud = $this->getfecha();
			$mail->MsgHTML("El usuario: ".$solicitante." ha dado de alta un nuevo requerimiento en el que t&uacute; eres usuario clave<br><br>"."<br> No. Ticket: ".$id_requerimiento."Requerimiento: ".$nombre_requerimiento.'<br>Fecha de solicitud: '.$fecha_solicitud);// si el cuerpo del mensaje es HTML			
			//.' a las '.strftime("%H:%M").' horas'
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}		

		//Nuevo requerimiento
		function aviso_a_lider_sistemas($email_usr_key = '',$id_requerimiento='',$nombre_requerimiento='',$solicitante =''){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_usr_key);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Nuevo requerimiento";

			$fecha_solicitud = $this->getfecha();
			$mail->MsgHTML("El usuario: ".$solicitante." ha dado de alta un nuevo requerimiento en el que t&uacute; eres Lider de sistemas"."<br> No. Ticket: ".$id_requerimiento."<br><br>T&iacute;tulo del requerimiento: ".$nombre_requerimiento.'<br>Fecha de solicitud: '.$fecha_solicitud);// si el cuerpo del mensaje es HTML			
			//.' a las '.strftime("%H:%M").' horas'
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}		

		//Notificacion de cambio de estatus al usuario final
		function cambio_estatus_usrfinal($nombre_requerimiento = '',$estatus='',$comentario='',$id_requerimiento,$email_destino){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			//$mail->MsgHTML("Se ha cambiado el estatus del requerimiento: ".$nombre_requerimiento."<br>No. Ticket: ".$id_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);	
			$mail->MsgHTML("Se ha cambiado el estatus <br>No. Ticket: ".$id_requerimiento."<br>Requerimiento".$nombre_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);		
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}

		function aviso_estatus_keyuser($nombre_requerimiento = '',$estatus='',$comentario='',$id_requerimiento,$email_destino){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			//$mail->MsgHTML("Se ha cambiado el estatus del requerimiento: ".$nombre_requerimiento."<br>No. Ticket: ".$id_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);			
			$mail->MsgHTML("Se ha cambiado el estatus <br>No. Ticket: ".$id_requerimiento."<br>Requerimiento".$nombre_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);
		

			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}				

		function aviso_estatus_lider_sistemas($nombre_requerimiento = '',$estatus='',$comentario='',$id_requerimiento,$email_destino){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			//$mail->MsgHTML("Se ha cambiado el estatus del requerimiento: ".$nombre_requerimiento."<br>No. Ticket: ".$id_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);		
			$mail->MsgHTML("Se ha cambiado el estatus <br>No. Ticket: ".$id_requerimiento."<br>Requerimiento".$nombre_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);		
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}				


		function aviso_estatus_lider_sistemas_invitados($nombre_requerimiento = '',$estatus='',$comentario='',$id_requerimiento,$email_destino){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			//$mail->MsgHTML("Se ha cambiado el estatus del requerimiento: ".$nombre_requerimiento."<br>No. Ticket: ".$id_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);			
			$mail->MsgHTML("Se ha cambiado el estatus <br>No. Ticket: ".$id_requerimiento."<br>Requerimiento".$nombre_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);	

			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}

		function aviso_estatus_recursos($nombre_requerimiento = '',$estatus='',$comentario='',$id_requerimiento,$email_destino){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			$mail->MsgHTML("Se ha cambiado el estatus <br>No. Ticket: ".$id_requerimiento."<br>Requerimiento".$nombre_requerimiento."<br>Nuevo estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);			
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}



		function asignacion_recurso($nombre_requerimiento = '',$estatus='',$comentario='',$id_requerimiento,$email_destino){//Envio de password temporal para que se cambnie el password al acceder al sistema
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Asignacion a requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			$mail->MsgHTML($comentario."<br>"."Requerimiento: ".$nombre_requerimiento."<br><br>".$fecha);			
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}

		public function guarda_emails($email_destinatario='',$texto='',$id_requerimiento=0,$funcion='',$nombre_requerimiento='',$solicitante='',$estatus='',$activo=1){

			$sql="INSERT INTO envio_mail (email_destinatario,texto,id_requerimiento,function,nombre_requerimiento,solicitante,estatus,activo) VALUES('$email_destinatario','$texto',$id_requerimiento,'$function','$nombre_requerimiento','$solicitante','$estatus',1)";
			$rs = mssql_query($sql,$conn);
			if($rs){
				return true;
			}
			else{
				return false;
			}

		}

		public function mail_cancelacion($nombre_requerimiento = '',$estatus='Rechazado',$comentario='',$id_requerimiento,$email_destino){			
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			//$mail->MsgHTML("Se ha cambiado el estatus del requerimiento: ".$nombre_requerimiento."<br>No. Ticket: ".$id_requerimiento."<br> Estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);
			$mail->MsgHTML("Se ha cambiado el estatus."."<br>No. Ticket: ".$id_requerimiento."<br>Requerimiento: ".$nombre_requerimiento."<br> Estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);			
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}

		public function mail_aceptacion($nombre_requerimiento = '',$estatus='Autorizado',$comentario='',$id_requerimiento,$email_destino){			
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			$mail->MsgHTML("Se ha cambiado el estatus."."<br>No. Ticket: ".$id_requerimiento."<br>Requerimiento: ".$nombre_requerimiento."<br> Estatus: ".$estatus."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);			
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}		

		public function mail_peticion($nombre_requerimiento = '',$comentario='',$id_requerimiento,$email_destino){			
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Cambio de estatus de requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			$mail->MsgHTML("Se ha solicitado autorizaci&oacute;n para el requerimiento con No. Ticket: ".$id_requerimiento."<br>Requerimiento: ".$nombre_requerimiento."<br>Comentarios adicionales: ".$comentario."<br><br>".$fecha);
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}	

		public function mail_invitacion($id_requerimiento,$email_destino,$nombre_requerimiento){			
			set_time_limit(0);
			$this->destinatario = ltrim($email_destino);
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = $this->host;    						//la dirección del servidor, p. ej.: smtp.servidor.com
			$mail->Port = $this->port;				 		   //Puerto del servidor 
			$mail->Username = $this->usuarioMail;				 	  //usuario de cuenta
			$mail->Password = $this->passMail; 
			$mail->From = $this->from;										// dirección remitente, p. ej.: no-responder@miempresa.com
			$mail->SMTPAuth = true;									// si el SMTP necesita autenticación			
			$mail->FromName = "Requerimientos";									// nombre remitente, p. ej.: "Servicio de envío automático"						
	
			$mail->clearAddresses();//Limpia el remitente
			$mail->AddAddress($this->destinatario);//direcion de correo

			$mail->Subject = "Invitacion a requerimiento";

			$fecha = $this->getfecha();
			$fecha = $this->getfecha();
			$fecha.= ' a las '.strftime("%H:%M").' horas';

			$mail->MsgHTML("Se te ha invitado al requerimiento con No. Ticket: ".$id_requerimiento." <br><br>"."Requerimiento: ".$nombre_requerimiento."<br><br>".$fecha);
			
			$mail->IsHTML(true);

			$mail->CharSet = 'UTF-8';
			if(!$mail->Send()) {
				echo $mail->ErrorInfo();
				$this->mensaje = $mail->ErrorInfo;
				return false;
			} else {
				return true;
			}
			//$mail->clearAddresses();//Limpia el remitente

			include("config/disconnect.php");
		}				

		
		


		public function getfecha(){//Regresa la fecha actual en formato 11 Febrero 2016

			$fecha_inicio = date('y-m-d');

			setlocale(LC_ALL,"es_ES");
						
			$transf = strtotime($fecha_inicio);     
			$dia = date("d", $transf); 
			$mes = date("F", $transf);
			if ($mes=="January") $mes="Enero";
			if ($mes=="February") $mes="Febrero";
			if ($mes=="March") $mes="Marzo";
			if ($mes=="April") $mes="Abril";
			if ($mes=="May") $mes="Mayo";
			if ($mes=="June") $mes="Junio";
			if ($mes=="July") $mes="Julio";
			if ($mes=="August") $mes="Agosto";
			if ($mes=="September") $mes="Setiembre";
			if ($mes=="October") $mes="Octubre";
			if ($mes=="November") $mes="Noviembre";
			if ($mes=="December") $mes="Diciembre"; 
			$ano = date("Y", $transf);  
						
			$fecha_inicio = "$dia de $mes de $ano";

			return $fecha_inicio;
	}
		
		
	}


?>