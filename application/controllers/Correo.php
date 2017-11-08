<?php
class Correo extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library("email");
	}
	
	public function recuperar_pass() {
		$correo = "raulmedinacampos@hotmail.com";
		$nom = "Raúl Medina";
		$usuario = 'MECR840525';
		$pass = 'hola123';
		$body = '<h2>'.$nom.':</h2>
				<p>Has solicitado la recuperación de tu contraseña del Sistema de Apoyos Económicos.</p>
				<p>A continuación te enviamos los datos solicitados.</p>
				<p>CURP: <strong>'.$usuario.'</strong><br />
					Contraseña: <strong>'.$pass.'</strong></p>
				<p>En caso de seguir teniendo problemas para acceder al sistema te puedes comunicar al 5729 6000, extensiones 65033, 65095, 65145.</p>';
		
		$config["mailtype"] = "html";
		
		$this->email->initialize($config);
		$this->email->from('no-reply@cofaa.ipn.mx', 'Apoyos Económicos IPN');
		$this->email->to($correo, $nom);
		$this->email->subject("Recuperación de contraseña");
		$this->email->message($body);
		
		$this->email->send();
	}
}