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
		
	public function validarusr() {
		$usuario = $this->input->post('username');
		$password = $this->input->post('password');
		$usr = $this->login_md->IsUser($usuario, $password);//revisar si va cifrada la contraseña
		$redirect = base_url("login");
		
		if ( $usr > 0 ) {
			$nom = trim($usr->NOMBRE." ".$usr->APELLIDO_P." ".$usr->APELLIDO_M);
			$id = $usr->ID;
			$rol = $usr->ROL_ID;
			$name = $usr->USERNAME;
			$this->session->set_userdata(array("nom"=>$nom,"rol"=>$rol,"username"=>$name,"id"=>$id));
			
			switch ( $rol ) {//ver tipos que existan para saber a donde se manda
				default:
					$redirect = base_url("principal");
					break;
			}			
		} else {
			$this->session->set_flashdata("error",1);
		}
		
		redirect($redirect);
	}
	
	public function validarprs(){
		$usuario = strtoupper($this->input->post('curpA'));
		$password = $this->input->post('passA');
		$usr = $this->login_md->IsPerson($usuario, $password);//revisar si va cifrada la contraseña
		$redirect = base_url();
		
		if ( $usr ) {
			$nom = trim($usr->NOMBRE." ".$usr->APELLIDO_P." ".$usr->APELLIDO_M);
			$id = $usr->ID;
			$rol = $usr->TIPO_PERSONA_ID;
			$name = $usr->USERNAME;
			$curp = $usr->CURP;
			$this->session->set_userdata(array("nom"=>$nom,"rol"=>$rol,"username"=>$name,"id"=>$id,"curp"=>$curp));
			
			//echo "aaaaaa ".$rol;exit();
				
			switch ( $rol ) {
				case 1: // Profesor
					$redirect=base_url("usuario");
					break;
				case 3: // Alumno
					$redirect=base_url("usuario");
					break;
			}			
		} else {
			$this->session->set_flashdata("error", 1);
		}
		
		redirect($redirect);
	}
	
	public function validarcoord(){
		$usuario = strtoupper($this->input->post('curpC'));
		$escuela = $this->input->post('escuelaC');
		$usr = $this->login_md->IsOrganizer($usuario, $escuela);
		$redirect = base_url("coordinador");
		
		if ( $usr ) {
			$nom = trim($usr->NOMBRE." ".$usr->APELLIDO_P." ".$usr->APELLIDO_M);
			$id = $usr->ID;
			$rol = $usr->TIPO_PERSONA_ID;
			$school = $usr->CENTRO_ADSCRIPCION;
			$curp = $usr->CURP;
			$this->session->set_userdata(array("nom"=>$nom,"rol"=>$rol,"esc"=>$school,"id"=>$id,"curp"=>$curp));
		} else {
			$this->session->set_flashdata("error", 1);
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