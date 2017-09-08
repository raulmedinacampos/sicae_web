<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('login_md');
	}
	
	public function index() {		
		$err = 0;//ver si hubo error en un intento anterior
		
		if ( $this->session->flashdata('error') != NULL ) {
			$err=$this->session->flashdata('error');
		}
		
		$params = array("err"=>$err);
		
		//Cargar vista de login
		$header['js'][] = 'login';
		
		$this->load->view('template/header', $header);
		$this->load->view('login',$params);
		$this->load->view('template/footer');
	}
		
	public function validar() {
		$usuario = $this->input->post('username');
		$password = $this->input->post('password');
		$usr = $this->login_md->IsUser($usuario, $password);//revisar si va cifrada la contraseña
		$redirect = base_url("login");
		
		if ( $usr > 0 ) {
			$tipo = $usr->CTIPUSU;
			$nom = trim($usr->NOMBRE." ".$usr->APPATERNO." ".$usr->APMATERNO);
			$num = $usr->NUMEMPLEADO;
			$cve = $usr->NOMBREUSUARIO;
			$this->session->set_userdata(array("nom"=>$nom,"tipo"=>$tipo,"clave"=>$cve,"empleado"=>$num));
			
			switch ( $tipo ) {//ver tipos que existan
				default:
					$redirect = base_url("principal");
					break;
			}			
		} else {
			$this->session->set_flashdata("error", "1");
		}
		
		redirect($redirect);
	}
	
	public function recuperar_contrasena() {
		$header["js"][] = "recuperar";
		
		$header["titulo"] = "Recuperar contraseña";
		
		$this->load->view('template/header', $header);
		$this->load->view('recuperar');
		$this->load->view('template/footer');
	}
	
	public function cerrar() {
		$this->login_md->Logout();
	}
}