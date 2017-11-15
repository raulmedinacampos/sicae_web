<?php
class Correo extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("email");
		$this->load->model('persona_md');
	}
	
	public function recuperar_pass() {
		$curp = $this->input->post("curp");
		$curp = strtoupper($curp);
		
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
				$body .= 'Contraseña: <strong>'.$pass.'</strong></p>';
			}
			
			if ( $usr->TIPO_PERSONA_ID == 2 ) {
				$body .= 'Escuela: <strong>'.$escuela.'</strong></p>';
			}
			
			$body .= '<p>En caso de seguir teniendo problemas para acceder al sistema te puedes comunicar al 5729 6000, extensiones 65033, 65095, 65145.</p>';
			
			//*587 para COFAA 
			$config = Array(
				'protocol'	=> 'smtp',
				'smtp_host'	=> 'ssl://smtp.googlemail.com',
				'smtp_port'	=> 465,
				'smtp_user'	=> 'desarrollo.uds@gmail.com',
				'smtp_pass'	=> 'D3sarroll0',
				'mailtype'	=> 'html',
				'newline'	=> "\r\n"
			);
			
			/*$config = Array(
				'protocol'	=> 'smtp',
				//'smtp_crypto'=>'tls',
				'smtp_host'	=> 'correo.cofaa.ipn.mx',
				'smtp_port'	=> 587,
				'smtp_user'	=> 'rmedina@cofaa.ipn.mx',
				'smtp_pass'	=> 'M3din4Cr',
				'$_smtp_auth' => true,
				'mailtype'	=> 'html',
				'newline'	=> "\r\n"
			);*/
			
			
			$this->email->initialize($config);
			$this->email->from('apoyoseconomicos@cofaa.ipn.mx', 'Apoyos Económicos IPN');
			$this->email->to($correo);
			$this->email->subject("Recuperación de contraseña");
			$this->email->message($body);
			
			if ( $this->email->send() ) {
				echo "1";
			} else {
				echo "0x ".$this->email->print_debugger();
			}
		} else {
			echo "0";
		}
	}
}