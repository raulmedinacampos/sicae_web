<?php
class Correo extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("email");
		$this->load->model('persona_md');
	}
	
	public function recuperar_pass() {
		$curp = $this->input->post("curp");
		
		$usr = $this->persona_md->GetByCURP($curp);
		
		if ( $usr ) {
			$correo = $usr->EMAIL;
			$nom = trim($usr->NOMBRE." ".$usr->APELLIDO_P." ".$usr->APELLIDO_M);
			$usuario = $usr->CURP;
			$pass = $usr->PASSWORD;
			$escuela = "";
			$body = '<h2>'.$nom.':</h2>
					<p>Has solicitado la recuperación de tu contraseña del Sistema de Apoyos Económicos.</p>
					<p>A continuación te enviamos los datos solicitados.</p>
					<p>CURP: <strong>'.$usuario.'</strong><br />';
			
			if ( $usr->TIPO_PERSONA_ID == 1 || $usr->TIPO_PERSONA_ID == 3 ) {
				$body += 'Contraseña: <strong>'.$pass.'</strong></p>';
			}
			
			if ( $usr->TIPO_PERSONA_ID == 2 ) {
				$body += 'Escuela: <strong>'.$escuela.'</strong></p>';
			}
			
			$body += '<p>En caso de seguir teniendo problemas para acceder al sistema te puedes comunicar al 5729 6000, extensiones 65033, 65095, 65145.</p>';
			
			$config["mailtype"] = "html";
			
			$this->email->initialize($config);
			$this->email->from('no-reply@cofaa.ipn.mx', 'Apoyos Económicos IPN');
			$this->email->to($correo, $nom);
			$this->email->subject("Recuperación de contraseña");
			$this->email->message($body);
			
			if ( $this->email->send() ) {
				echo "1";
			} else {
				echo "0";
			}
		}
	}
}