<?php
class Usuario extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_md');
		$this->load->model('persona_md');
	}
	
	public function index() {
		$this->login_md->validarSesAct();
		
		$header['js'][] = "bootstrap-show-password.min";
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "usuario";
		
		$this->load->model("escuela_md");
		$this->load->model("nombramiento_md");
		$this->load->model("nivel_academico_md");
		$this->load->model("participacion_md");
		$this->load->model('estudio_md');
		$this->load->model('estudio_otro_md');
		$this->load->model("direccion_md");
		$this->load->model("publicacion_md");
		$this->load->model("proyecto_md");
		
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		if ( $this->session->rol ) {
			$params["persona"] = $this->persona_md->GetById($this->session->id);
		}
		
		$nivel_otro = $this->estudio_otro_md->GetByPersona($params["persona"]["ID"]);
		$nivel_otro = array_reverse($nivel_otro);
		
		switch ( $perfil ) {
			case 1:
				$params["perfilC"] = "profesor";
				$this->load->model('profesor_md');
				$this->load->model("materia_md");
				
				$params["profesor"] = $this->profesor_md->GetById($params["persona"]["ID"]);
				$materias = $this->materia_md->GetByPerson($params["persona"]["ID"]);
				
				$mat = "";
				foreach ( $materias as $val ) {
					$mat .= $val["NOMBRE"].", ";
				}
				
				$params["materias"] = trim($mat, ", ");
				$params["publicaciones_nacionales"]=$this->publicacion_md->GetCtByPersonaNc($params["persona"]["ID"],1);
				$params["publicaciones_internacionales"]=$this->publicacion_md->GetCtByPersonaNc($params["persona"]["ID"],0);
				$params["proyectos"] = $this->proyecto_md->GetByPerson($params["persona"]["ID"]);
				break;
			case 3:
				$params["perfilC"] = "alumno";
				$this->load->model('alumno_md');
				$params["alumno"] = $this->alumno_md->GetById($params["persona"]["ID"]);
				break;
			default:
				break;
		}
		
		$params["escuelas"] = $this->escuela_md->GetAll();
		$params["nombramientos"] = $this->nombramiento_md->GetAll();
		$params["niveles_academicos"] = $this->nivel_academico_md->GetAll();
		$params["tipos_participacion"] = $this->participacion_md->GetAll();
		$params["nivel_lic"] = $this->estudio_md->GetByNvPr(3, $params["persona"]["ID"]);
		$params["nivel_maes"] = $this->estudio_md->GetByNvPr(4, $params["persona"]["ID"]);
		$params["nivel_dr"] = $this->estudio_md->GetByNvPr(5, $params["persona"]["ID"]);
		$params["nivel_otro"] = implode(", ", array_column($nivel_otro, "NOMBRE"));
		$params["dirLic"] = $this->direccion_md->GetByNvPr(3, $params["persona"]["ID"]);
		$params["dirMaes"] = $this->direccion_md->GetByNvPr(4, $params["persona"]["ID"]);
		$params["dirDoc"] = $this->direccion_md->GetByNvPr(5, $params["persona"]["ID"]);
		
		$this->load->view('template/header', $header);
		$this->load->view('usuarios/nuevo', $params);
		$this->load->view('template/footer');
	}
	
	public function consultar() {
		$id = $this->input->post("id");
		$persona = $this->persona_md->GetById($id);
		echo json_encode($persona);
	}
	
	public function validar_curp() {
		$curp = $this->input->post("curp");
		
		$curp = strtoupper($curp);
		
		$valid = $this->persona_md->CheckCURP($curp);
		
		if ( $valid ) {
			echo "false";
		} else {
			echo "true";
		}
	}
	
	public function validar_curpC() {
		$curp = $this->input->post("curpC");
		
		$curp = strtoupper($curp);
		
		$valid = $this->persona_md->CheckCURP($curp);
		
		if ( $valid ) {
			echo "false";
		} else {
			echo "true";
		}
	}
	
	public function validar_curpE() {
		$curp = $this->input->post("curp");
		
		$curp = strtoupper($curp);
		
		$valid = $this->persona_md->CheckEditCURP($this->session->id, $curp);
		
		//print_r($valid);
		//echo $this->session->id;
		
		if ( $valid ) {
			echo "false";
		} else {
			echo "true";
		}
	}
	
	public function agregar() {
		$data=array();
		
		array_push($data, $this->input->post('escuela'));
		array_push($data, $this->input->post('rPerfil'));
		array_push($data, strtoupper($this->input->post('curp')));//username
		array_push($data, $this->input->post('password'));
		array_push($data, $this->input->post('nombre'));
		array_push($data, $this->input->post('apPaterno'));
		array_push($data, $this->input->post('apMaterno'));
		array_push($data, $this->input->post('fechaNac'));
		array_push($data, $this->input->post('email'));
		array_push($data, strtoupper($this->input->post('rfc')));
		array_push($data, strtoupper($this->input->post('curp')));
		array_push($data, $this->input->post('sexo'));
		array_push($data, $this->input->post('telefono'));
		array_push($data, $this->input->post('extension'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		$id = $this->persona_md->InsertRecord($data);
		$usr = $this->persona_md->GetById($id);
		
		$nom = trim($usr["NOMBRE"]." ".$usr["APELLIDO_P"]." ".$usr["APELLIDO_M"]);
		$id = $usr["ID"];
		$rol = $usr["TIPO_PERSONA_ID"];
		$name = $usr["USERNAME"];
		$curp = $usr["CURP"];
		$this->session->set_userdata(array("nom"=>$nom,"rol"=>$rol,"username"=>$name,"id"=>$id,"curp"=>$curp));
		
		redirect(base_url("usuario"));
	}
	
	public function datos_alumno() {
		$this->load->model('alumno_md');
		$data=array();
		$usr=$this->session->userdata('id');
		
		array_push($data, $usr);
		array_push($data, $this->input->post('pifi'));
		array_push($data, $this->input->post('conacyt'));
		array_push($data, $this->input->post('boleta'));
		array_push($data, $this->input->post('semestre'));
		array_push($data, $this->input->post('promedio'));
		array_push($data, $this->input->post('numSIP'));
		array_push($data, $this->input->post('nombreSIP'));
		array_push($data, $this->input->post('escuelaSIP'));
		array_push($data, $this->input->post('directorSIP'));
		array_push($data, $this->input->post('materiasCursa'));
		
		$id = $this->alumno_md->SetDatos($data);
		
		//redirect(base_url("usuario"));
	}
	
	public function datos_profesor() {
		//Puede recibir todos los datos o nada más algunos y funciona correctamente aunque no traiga todas las variables
		$this->load->model('profesor_md');
		$data=array();
		$usr=$this->session->userdata('id');
		$field=array(
				"tipoNombramiento",
				"edd",
				"exclusividad",
				"edi",
				"sni",
				"fechaIngreso",
				"fechaBase",
				"excelencia",
				"sabatico",
				"sueldo",
				"categoria",
				"plaza",
				"interinato",
				"fechaInicioInt",
				"fechaFinInt",
				"horas",
				"numEmpleado",
				"tipoSabatico",
				"fechaInicioSab",
				"fechaFinSab",
				"fechaInicioGoce",
				"fechaFinGoce",
				"prorroga",
				"fechaInicioProrroga",
				"fechaFinProrroga",
				"cargaAcademica",
				"direccionesTesis",
				"materiasImp"
			);
		
		array_push($data, $usr);
		foreach($field as $fl){
			if(isset($_POST[$fl])){
				array_push($data, $this->input->post($fl));
			}
			else{
				array_push($data,NULL);
			}
		}
		
		$id = $this->profesor_md->SetDatos($data);
		
		//redirect(base_url("usuario"));
	}
	
	
	public function direcciones() {
		$this->load->model("direccion_md");
		$this->load->model("profesor_md");
		$this->load->model("materia_md");
		$this->load->model("producto_otro_md");
		$this->load->model("publicacion_md");
		$usr=$this->session->userdata('id');
		
		$data=array();
		array_push($data,$usr);
		array_push($data,3);
		array_push($data, $this->input->post('tTLicenciatura'));
		array_push($data, $this->input->post('cTLicenciatura'));
		array_push($data, $this->input->post('iTLicenciatura'));
		
		$id = $this->direccion_md->SetDatos($data);
		
		$data=array();
		array_push($data,$usr);
		array_push($data,4);
		array_push($data, $this->input->post('tTMaestria'));
		array_push($data, $this->input->post('cTMaestria'));
		array_push($data, $this->input->post('iTMaestria'));
		
		$id = $this->direccion_md->SetDatos($data);
		
		$data=array();
		array_push($data,$usr);
		array_push($data,5);
		array_push($data, $this->input->post('tTDoctorado'));
		array_push($data, $this->input->post('cTDoctorado'));
		array_push($data, $this->input->post('iTDoctorado'));
		
		$id = $this->direccion_md->setDatos($data);
		
		$total=$this->input->post('tTLicenciatura')+$this->input->post('tTMaestria')+$this->input->post('tTDoctorado');
		
		$id=$this->profesor_md->SetDirecciones($total,$usr);
		
		$unidades=$this->input->post("unidAprendizaje");
		$unidades=explode(",",$unidades);
		$this->materia_md->CleanPr($usr);
		foreach($unidades as $mat){
			$this->materia_md->InsertRecord(array($usr,$mat));
		}
		
		/*$patentes=$this->input->post("patentes");
		$patentes=explode("\n", $patentes);
		foreach($patentes as $pat){
			$pat=explode(",",$pat);
			$this->producto_otro_md->InsertRecord(array($usr,$pat[0],$pat[1]));
			
		}*/
		
		$nacionales=$this->input->post("publNacionales");
		$this->publicacion_md->CleanPr($usr);
		for($ct=0;$ct<$nacionales;$ct++){
			$this->publicacion_md->InsertRecord(array($usr,"NP",1,"NP",0));
		}
		
		$internacionales=$this->input->post("publInt");
		
		for($ct=0;$ct<$internacionales;$ct++){
			$this->publicacion_md->InsertRecord(array($usr,"NP",0,"NP",0));
		}
		
		echo $id;
	}
	
	
	public function direccionespr() {
		$this->load->model("direccion_md");
		$this->load->model("profesor_md");
		$usr=$this->session->userdata('id');
		
		$data=array();
		array_push($data,$usr);
		array_push($data,3);
		array_push($data, $_REQUEST['tTLicenciatura']);
		array_push($data, $_REQUEST['cTLicenciatura']);
		array_push($data, $_REQUEST['iTLicenciatura']);
		
		$id = $this->direccion_md->SetDatos($data);
		
		$data=array();
		array_push($data,$usr);
		array_push($data,4);
		array_push($data, $_REQUEST['tTMaestria']);
		array_push($data, $_REQUEST['cTMaestria']);
		array_push($data, $_REQUEST['iTMaestria']);
		
		$id = $this->direccion_md->SetDatos($data);
		
		$data=array();
		array_push($data,$usr);
		array_push($data,5);
		array_push($data, $_REQUEST['tTDoctorado']);
		array_push($data, $_REQUEST['cTDoctorado']);
		array_push($data, $_REQUEST['iTDoctorado']);
		
		$id = $this->direccion_md->setDatos($data);
		
		$total=$_REQUEST['tTLicenciatura']+$_REQUEST['tTMaestria']+$_REQUEST['tTDoctorado'];
		
		$id=$this->profesor_md->SetDirecciones($total,$usr);
		
		echo $id;
	}
	
	public function datos_banco() {
		$data=array();
		$usr=$this->session->userdata('id');
		
		array_push($data, $this->input->post('banco'));
		array_push($data, $this->input->post('sucursal'));
		array_push($data, $this->input->post('cuentaBanco'));
		array_push($data, $this->input->post('clabe'));
		
		$id = $this->persona_md->SetCuentaBancaria($data,$usr);
		
		redirect(base_url("usuario"));
	}
	
	public function proyectos() {
		$this->load->model("proyecto_md");
		$usr=$this->session->userdata('id');
		$tipo=$this->input->post("tipoProyecto");
		$anio=$this->input->post("anio");
		$esp=$this->input->post("espTP");
		$reg=$this->input->post("registro");
		$tpart=$this->input->post("tParticipacion");
		
		$this->proyecto_md->CleanPr($usr);
		
		foreach($reg as $ky=>$proy) {
			if ( $reg[$ky] ) {
				$data=array();
				
				if ( $tipo[$ky] == "Otros" ) {
					$tipo[$ky] = $esp[$ky];
				}
				
				array_push($data, $usr);
				array_push($data, $tpart[$ky]);
				array_push($data, $anio[$ky]);
				array_push($data, $reg[$ky]);
				array_push($data, $tipo[$ky]);
				
				$id = $this->proyecto_md->InsertRecord($data);
			}
		}
		echo $id;
	}
	
	public function grados_academicos() {
		$this->load->model('estudio_md');
		$this->load->model('estudio_otro_md');
		$data=array();
		$usr=$this->session->userdata('id');
		
		array_push($data, $this->input->post('nLicenciatura'));
		array_push($data, $this->input->post('nMaestria'));
		array_push($data, $this->input->post('nDoctorado'));
		
		foreach($data as $ky=>$niv){
			$noms=explode(",",$niv);
			$id_niv=$ky+3;
			$this->estudio_md->CleanPr($id_niv,$usr);
			
			foreach($noms as $nm){
				$nm=trim($nm);
				if($nm!="")
					$this->estudio_md->InsertRecord(array($usr,$id_niv,$nm));
			}
		}
		
		$otro=$this->input->post('nOtros');
		$otro=explode(",",$otro);
		$this->estudio_otro_md->CleanPr($usr);
		foreach($otro as $ot){
			$ot=trim($ot);
			if($ot!="")
				$this->estudio_otro_md->InsertRecord(array($usr,$ot));
		}
		
		//redirect(base_url("usuario"));
	}
	
	public function editar() {
		$id=$this->input->post("hdnID");
		$data=array();
		
		array_push($data,$this->input->post('escuela'));
		array_push($data,$this->session->rol);
		array_push($data,strtoupper($this->input->post('curp')));//username
		array_push($data,$this->input->post('password'));
		array_push($data,$this->input->post('nombre'));
		array_push($data,$this->input->post('apPaterno'));
		array_push($data,$this->input->post('apMaterno'));
		array_push($data,$this->input->post('fechaNac'));
		array_push($data,$this->input->post('email'));
		array_push($data,strtoupper($this->input->post('rfc')));
		array_push($data,strtoupper($this->input->post('curp')));
		array_push($data,$this->input->post('sexo'));
		array_push($data,$this->input->post('telefono'));
		array_push($data,$this->input->post('extension'));
		array_push($data,$this->input->post('banco'));
		array_push($data,$this->input->post('sucursal'));
		array_push($data,$this->input->post('cuentaBanco'));
		array_push($data,str_replace(" ", "", $this->input->post('clabe')));
		array_push($data,$this->input->post('nacionalidad'));
		
		$this->persona_md->UpdateRecord($data,$id);
		
		//redirect(base_url("usuario"));
	}
}
?>