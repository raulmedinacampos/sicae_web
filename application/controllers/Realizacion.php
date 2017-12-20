<?php
class Realizacion extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_md');
		$this->load->model('persona_md');
		$this->login_md->validarSesAct();
	}
	
	public function index() {
		$this->load->model("solicitud_md");
	
		$realizacion = $this->solicitud_md->GetByPerson($this->session->id);
	
		if ( $realizacion && sizeof($realizacion) > 0 ) {
			$this->listado();
		} else {
			$this->nueva();
		}
	}
	
	public function listado() {
		$header["js"][] = "jquery.dataTables.min";
		$header["js"][] = "solicitudes";
	
		$header["titulo"] = "Realización";
	
		$this->load->model("solicitud_md");
	
		$params["solicitudes"] = $this->solicitud_md->GetByPerson($this->session->id);
	
		$this->load->view('template/header', $header);
		$this->load->view('listados/realizacion', $params);
		$this->load->view('template/footer');
	}
	
	public function nueva() {
		$header["js"][] = "realizacion";
		
		$header['titulo'] = "Realización";
		
		$perfil = $this->session->rol;
		$params["perfil"] = $perfil;
		
		$this->load->model("persona_md");
		$this->load->model("solicitud_md");
		$this->load->model("tipo_evento_md");
		$this->load->model("escuela_md");
		$this->load->model("expositor_md");
		$this->load->model("moneda_md");
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		
		$idSol = $this->input->post("hdnID");
		
		$params["escuelas"] = $this->escuela_md->GetAll();
		$params["tipos_evento"] = $this->tipo_evento_md->GetAllOrganizer();
		$params["monedas"] = $this->moneda_md->GetAll();
		
		if ( $idSol ) {
			$params["realizacion"] = $this->solicitud_md->GetById($idSol);
		}
		
		if ( $this->session->rol ) {
			$params["persona"] = $this->persona_md->GetById($this->session->id);
		}
		
		if ( isset($params["realizacion"]) ) {
			list($params["realizacion"]["IDIOMA"], $params["realizacion"]["DIRIGIDO"])= explode("|", $params["realizacion"]["OTRO"].'|');
			$params["expositores"] = $this->expositor_md->GetBySolicitud($params["realizacion"]["ID"]);
			$params["tAereo"] = $this->monto_md->GetByTypeReq("5", $params["realizacion"]["ID"]);
			$params["tTerrestre"] = $this->monto_md->GetByTypeReq("4", $params["realizacion"]["ID"]);
			$params["honorarios"] = $this->monto_md->GetByTypeReq("6", $params["realizacion"]["ID"]);
			$params["viaticos"] = $this->monto_md->GetByTypeReq("7", $params["realizacion"]["ID"]);
			$params["material"] = $this->monto_md->GetByTypeReq("8", $params["realizacion"]["ID"]);
			$params["otros_gastos"] = $this->monto_md->GetByTypeReq("9", $params["realizacion"]["ID"]);
			$params["cafeteria"] = $this->monto_md->GetByTypeReq("10", $params["realizacion"]["ID"]);
			$params["apoyo"] = $this->apoyo_md->GetBySolicitud($params["realizacion"]["ID"]);
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/realizacion', $params);
		$this->load->view('template/footer');
	}
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$usr=$this->session->userdata('id');
		
		$id = $this->solicitud_md->GetNextId("R");
		$data=array();
		
		array_push($data,'R');
		array_push($data, $usr);
		array_push($data, $this->input->post('tipoEvento'));
		array_push($data, $this->input->post('evento'));
		array_push($data, $this->input->post('institucion'));
		array_push($data, $this->input->post('sede'));
		array_push($data, $this->input->post('fechaInicio'));
		array_push($data, $this->input->post('fechaFin'));
		array_push($data, 0);//días adicionales
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, $this->input->post('idioma').'|'.$this->input->post('dirigido'));
		array_push($data, $this->input->post('objetivo'));
		array_push($data, $this->input->post('beneficio'));
		array_push($data, $this->input->post('tParticipantes'));
		array_push($data, $this->input->post('tExpositores'));
		array_push($data, NULL);
		array_push($data, $this->input->post('duracion'));
		array_push($data, NULL);
		array_push($data, $id);  // ID
		
		if ( $this->input->post("idSolicitud") == 0 )
			$id = $this->solicitud_md->InsertRecord($data);
		else
			$id = $this->solicitud_md->UpdateRecord($data,$this->input->post("idSolicitud"));
			
		echo $id;
	}
	
	public function expositores() {
		$this->load->model("expositor_md");
		$sol=$this->input->post("idSolicitud");
		$res=array();
		$nombres=$this->input->post("exNombre");
		$apps=$this->input->post("exApP");
		$apms=$this->input->post("exApM");
		$proc=$this->input->post("exProcedencia");
		$ded=$this->input->post("exOcupacion");
		$lic=$this->input->post("exLicenciatura");
		$maes=$this->input->post("exMaestria");
		$doc=$this->input->post("exDoctorado");
		$esp=$this->input->post("exEspecialidad");
		$tema=$this->input->post("exTema");
		$act=$this->input->post("exActividad");
		$horario=$this->input->post("exHorario");
		
		$this->expositor_md->CleanSol($sol);
		
		foreach($nombres as $ky=>$vl){
			if ( $vl ) {
				$data=array();
				array_push($data,$sol);
				array_push($data,"R");
				array_push($data,NULL);
				array_push($data,$vl);
				array_push($data,$apps[$ky]);
				array_push($data,$apms[$ky]);
				array_push($data,$proc[$ky]);
				array_push($data,$ded[$ky]);
				array_push($data,$lic[$ky]);
				array_push($data,$maes[$ky]);
				array_push($data,$doc[$ky]);
				array_push($data,$esp[$ky]);
				array_push($data,$tema[$ky]);
				array_push($data,$act[$ky]);
				array_push($data,$horario[$ky]);
					
				$rs=$this->expositor_md->insertRecord($data);
				
				array_push($res,$rs);
			}
		}
		
		echo json_encode($res);//Son los id de los expositores agregados
	}
	
	public function datos_banco() {
		$data=array();
		$usr=$this->session->userdata('id');
		
		array_push($data, $this->input->post('banco'));
		array_push($data, $this->input->post('sucursal'));
		array_push($data, $this->input->post('cuentaBanco'));
		array_push($data, str_replace(" ", "", $this->input->post('clabe')));
		
		$id = $this->persona_md->SetCuentaBancaria($data,$usr);
		
		//redirect(base_url("usuario"));
	}
	
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$aereo=$this->input->post('aereo');
		$terrestre=$this->input->post('terrestre');
		$pago_exp=$this->input->post('honorarios');
		$viat_exp=$this->input->post('viaticos');
		$material=$this->input->post('material');
		$otros=$this->input->post('otrosGastos');
		$caf=$this->input->post('cafeteria');
		$sol=$this->input->post("idSolicitud");
		
		$this->monto_md->CleanSol($sol);
		
		if($aereo!=""&&$aereo>0){
			$this->monto_md->InsertRecord(array(5,$sol,"R",$aereo,0,$this->input->post("espTAereo"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($terrestre!=""&&$terrestre>0){
			$this->monto_md->InsertRecord(array(4,$sol,"R",$terrestre,0,$this->input->post("espTTerrestre"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($pago_exp!=""&&$pago_exp>0){
			$this->monto_md->InsertRecord(array(6,$sol,"R",$pago_exp,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($viat_exp!=""&&$viat_exp>0){
			$this->monto_md->InsertRecord(array(7,$sol,"R",$viat_exp,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($material!=""&&$material>0){
			$this->monto_md->InsertRecord(array(8,$sol,"R",$material,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		if($otros!=""&&$otros>0){
			$this->monto_md->InsertRecord(array(9,$sol,"R",$otros,0,$this->input->post("espOtros"),$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		if($caf!=""&&$caf>0){
			$this->monto_md->InsertRecord(array(10,$sol,"R",$caf,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
			
		}
		
		$this->apoyo_md->CleanSupport($sol);
		
		if( $this->input->post("apoyo") == 1 ) {
			$data=array();
			
			array_push($data,$sol);
			array_push($data,"R");
			array_push($data,$this->input->post("monedaAp"));
			array_push($data,$this->input->post("institucionAp"));
			array_push($data,$this->input->post("montoAp"));
			array_push($data,$this->input->post("especificacionAp"));
			
			$this->apoyo_md->InsertRecord($data);
		}
		
		echo $sol;
	}
	
	public function requisitos() {
		$this->load->model("solicitud_md");
		
		$id = $this->input->post("id");
		
		if ( $id ) {
			$datos["tipo"] = 0;
			$datos["titulo"] = "";
			$datos["texto"] = "";
			$solicitud = $this->solicitud_md->GetRequirementById($id);
			
			$datos["tipo"] = $solicitud["TIPO_EVENTO_ID"];
			
			if ( $solicitud["TIPO"] == 'A' ) { // ASISTENCIA
				$datos["titulo"] .= "Requisitos de solicitud de ";
				switch ($solicitud["TIPO_EVENTO_ID"]) { // Requisitos por tipo de evento
					case 5:
						$datos["titulo"] .= "Ponencia";
						$datos["texto"] .= "
						<ul>
							<li>Oficio de solicitud con los siguientes datos: nombre del solicitante, nombre, sede y fecha del evento. con firma autógrafa del titular de la dependencia politécnica y el sello.</li>
							<li>Formato COFAA que genera el SICAE con las firmas autógrafas del solicitante y el titular de la dependencia politécnica, así como el sello correspondiente.</li>
							<li>Estado de cuenta bancaria a nombre del solicitante con el número de la cuenta clabe interbancaria.</li>
							<li>Encuesta de calidad.</li>
							<li>Resumen de la ponencia se&ntilde;alando la dependencia de adscripción y los coautores.</li>
							<li>Ponencia en extenso que incluya introducción, desarrollo y bibliografía, adscripción y nombre de los coautores.</li>
							<li>Carta de aceptación de ponencia (el titulo debe ser igual del resumen y ponencia).</li>
							<li>Tríptico o documento oficial del evento.</li>
							";
						break;
					case 6:
						$datos["titulo"] .= "Publicación de Artículo";
						$datos["texto"] .= "
						<ul>
							<li>Oficio de solicitud con los siguientes datos: nombre del solicitante, nombre, sede y fecha del evento. con firma autógrafa del titular de la dependencia politécnica y el sello.</li>
							<li>Formato COFAA que genera el SICAE con las firmas autógrafas del solicitante y el titular de la dependencia politécnica, así como el sello correspondiente.</li>
							<li>Estado de cuenta bancaria a nombre del solicitante con el número de la cuenta clabe interbancaria.</li>
							<li>Encuesta de calidad.</li>
							<li>Carta de aceptación del artículo por parte de la revista correspondiente.</li>
							<li>Extenso del artículo a publicar que se&ntilde;ale la dependencia politécnica de adscripción y los nombres de lo coautores.</li>
							<li>Cotización emitida por la revista donde se publicará el artículo.</li>
							";
						break;
					case 3:
						$datos["titulo"] .= "Estancia de Investigación";
						$datos["texto"] .= "
						<ul>
							<li>Oficio de solicitud con los siguientes datos: nombre del solicitante, nombre, sede y fecha del evento. con firma autógrafa del titular de la dependencia politécnica y el sello.</li>
							<li>Formato COFAA que genera el SICAE con las firmas autógrafas del solicitante y el titular de la dependencia politécnica, así como el sello correspondiente.</li>
							<li>Estado de cuenta bancaria a nombre del solicitante con el número de la cuenta clabe interbancaria.</li>
							<li>Encuesta de calidad.</li>
							<li>Carta de invitación de la institución donde se realizará la estancia, en hoja membretada y firmada por el anfitrión de la misma.</li>
							<li>Programa de trabajo detallado y calendarizado, avalado por el anfitrión de la estancia.</li>
							<li>En caso de que la estancia exceda los 15 días hábiles reglamentarios para ausentarse de sus labores, se deberá anexar, copia de la Licencia con Goce de Sueldo u oficio de autorización del a&ntilde;o o semestre sabático.</li>
							<li>Si existe convenio interinstitucional entre el IPN y la institución donde se llevará acabo la estancia, deberá anexar copia del mismo.</li>
							";
						break;
					case 4:
						$datos["titulo"] .= "Obtención de Grado";
						$datos["texto"] .= "
						<ul>
							<li>Oficio de solicitud con los siguientes datos: nombre del solicitante, nombre, sede y fecha del evento. con firma autógrafa del titular de la dependencia politécnica y el sello.</li>
							<li>Formato COFAA que genera el SICAE con las firmas autógrafas del solicitante y el titular de la dependencia politécnica, así como el sello correspondiente.</li>
							<li>Estado de cuenta bancaria a nombre del solicitante con el número de la cuenta clabe interbancaria.</li>
							<li>Encuesta de calidad.</li>
							<li>Carta de autorización de la fecha para la presentación del examen de grado.</li>
							<li>Copia de la Licencia con Goce de Sueldo u oficio de autorización del a&ntilde;o o semestre sabático.</li>
							";
						break;
					default:
						$datos["titulo"] .= "Curso, Diplomado, Seminario y/o Taller";
						$datos["texto"] .= "
						<ul>
							<li>Oficio de solicitud con los siguientes datos: nombre del solicitante, nombre, sede y fecha del evento. con firma autógrafa del titular de la dependencia politécnica y el sello.</li>
							<li>Formato COFAA que genera el SICAE con las firmas autógrafas del solicitante y el titular de la dependencia politécnica, así como el sello correspondiente.</li>
							<li>Estado de cuenta bancaria a nombre del solicitante con el número de la cuenta clabe interbancaria.</li>
							<li>Encuesta de calidad.</li>
							<li>Tríptico o documento oficial del evento.</li>
							<li>Temario o programa del evento.</li>
							";
				}
				
				$datos["texto"] .= "
					</ul>";
				
				
				if ( $solicitud["TIPO_PERSONA_ID"] == 1 ) { // Requisitos de docente
					
					$datos["titulo"] .= "<br />Requisitos de solicitante de nivel ";
					
					switch ($solicitud["NIVEL_ID"]) { // Requisitos por nivel de docencia
						case 1:
							$datos["titulo"] .= "Medio Superior";
							$datos["texto"] .= '
							<ol style="list-style-type: upper-roman;">
								<li>Actas de calificaciones</li>
								<li>Constancia de algunos de los Diplomados en:<br />a) Formación y Actualización Docente para un Nuevo Modelo Educativo.<br />b) Competencias Docentes en el Nivel Medio Superior.<br />c) Especialización en Competencias Docentes para la Educación Media Superior.</li>
								<li>Constancia de participación en los últimos dos a&ntilde;os en eventos de formación o actualización profesional.</li>
								<li>Constancia de asignación de alumnos con participación en alguno de los siguientes programas:<br />a) Institucional de Tutorías PIT.<br />b) Formación de Emprendedores.<br />c) Aquellos que establezca la Secretaría Académica.</li>
							</ol>
							<p>Si cuenta con evidencia de dirección de tesis y proyectos de investigación como director o participante, no es necesario presentar lo se&ntilde;alado en los puntos II, III y IV.</p>';
							break;
						case 2:
							$datos["titulo"] .= "Superior";
							$datos["texto"] .= '
							<ol style="list-style-type: upper-roman;">
								<li>Actas de calificaciones</li>
								<li>Actas de examen profesional y constancia de asignación de director de tesis firmadas por el titular de la dependencia politécnica, de la subdirección académica, del departamento de titulación profesional o del<br />secretario ejecutivo del comité de trabajos terminales.</li>
							</ol>';
							break;
						case 5:
							$datos["titulo"] .= "Posgrado";
							$datos["texto"] .= '
							<ol style="list-style-type: upper-roman;">
								<li>Actas de calificaciones, por lo menos de una unidad de aprendizaje o constancia de docencia firmada por el Director de Posgrado de la<br />SIP:</li>
								<li>Actas de examen de grado, en caso de aparecer como segundo vocal, además deberá integrar el formato SIP‐14 BIS (Acta de revisión de tesis).</li>
							</ol>';
							break;
					}
				}
				
				
				
				
			} else  {	// REALIZACION
				$datos["titulo"] = "Requisitos de solicitud de realización de eventos";
				$datos["texto"] .= "<ul>
						<li>Oficio de solicitud con los siguientes datos: nombre, sede y fecha del evento. Con firma autógrafa del titular de la dependencia politécnica y el sello.</li>
						<li>Formato COFAA que genera el SICAE con las firmas autógrafas del titular de la dependencia politécnica y el titular del área de coordinación académica, y los sellos de correspondientes.</li>
						<li>Estado de cuenta bancaria a nombre de la dependencia politécnica solicitante con el número de la cuenta clabe interbancaria.</li>
						<li>Encuesta de calidad.</li>
						<li>Programa académico del evento, incluyendo duración y horario.</li>
						<li>Programa financiero del evento que incluya costos desglosados para cada expositor y concepto (honorarios, transporte y pago de viáticos), monto total y fuentes de financiamiento.</li>
						<li>Información del evento (tríptico o folleto).</li>
						<li>Relación y resumen curricular de expositores, indicando número de horas de participación de cada uno.</li>
						</ul>
						<h4>Nota:</h4>
						<ul>
						<li>El apoyo se autorizará preferentemente para los conceptos de transporte, pago de honorarios y viáticos de expositores.</li>
						<li>Los conceptos de materiales, otros gastos y cafetería, podrán ser autorizados con el COTEBAL considerando el beneficio a la comunidad politécnica.</li>
						</ul>";
				
			}
			
		echo json_encode($datos);
		}
	}
}
?>