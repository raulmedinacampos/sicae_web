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
							<li>Las solicitudes de Apoyos Económicos serán avaladas por el Director de la Unidad Académica mediante oficio original que deberá contener los siguientes datos: nombre del solicitante, número de empleado, nombre, sede y fecha del evento</li>
							<li> El formato Único que genera el SICAE, firmado por el solicitante, con firma y sello del director de la Unidad Académica</li>
							<li>Resumen de la ponencia presentada ante el comité evaluador del evento</li>
							<li>Ponencia completa en formato de Word, conteniendo la metodología (Introducción, desarrollo, conclusiones y bibliografía)</li>
							<li>Carta de aceptación de la ponencia en hoja membretada, firmada por el comité organizador del evento y con el nombre de la ponencia, en caso de haberla recibido por correo electrónico, deberá anexar la impresión del mismo.
Este documento podrá quedar pendiente si al momento de presentar su solicitud no se contara con ella</li>
							";
						break;
					case 6:
						$datos["titulo"] .= "Publicación de Artículo";
						$datos["texto"] .= "
						<ul>
							<li>Las solicitudes de Apoyos Económicos serán avaladas por el Director de la Unidad Académica mediante oficio original que deberá contener los siguientes datos: nombre del solicitante, número de empleado, nombre, sede y fecha del evento.</li>
							<li> El formato Único que genera el SICAE, firmado por el solicitante, con firma y sello del director de la Unidad Académica.</li>
							<li>Artículo a publicar en formato Word</li>
							<li>Cotización de la revista en donde se publicará el artículo</li>
							<li>Anexar evidencia de que la revista esta indexada al Citation Index ( ISNN y Dirección electrónica)</li>
							<li>Carta de aceptación del artículo a publicar en hoja membretada, firmada por el comité organizador del evento y con el nombre del artículo a publicar, en caso de haberla recibido por correo electrónico, deberá anexar la impresión del mismo</li>
							";
						break;
					case 3:
						$datos["titulo"] .= "Estancia de Investigación";
						$datos["texto"] .= "
						<ul>
							<li>Las solicitudes de Apoyos Económicos serán avaladas por el Director de la Unidad Académica mediante oficio original que deberá contener los siguientes datos: nombre del solicitante, número de empleado, nombre, sede y fecha del evento</li>
							<li>El formato Único que genera el SICAE, firmado por el solicitante, con firma y sello del director de la Unidad Académica</li>
							<li>Carta de invitación de la institución en donde se realizará la estancia, en hoja membretada y firmada por el anfitrión de la estancia</li>
							<li>Programa de trabajo detallado y calendarizado, avalado por el anfitrión de la estancia</li>
							<li>En caso de que la estancia exceda los 15 días hábiles reglamentarios para ausentarse de sus labores, se deberá anexar copia de la Licencia con goce de sueldo u oficio que justifique el año o semestre sabático</li>
							<li>Si existe convenio entre el IPN y la institución en donde se realizara la estancia, deberá anexar la copia del mismo</li>
							<li>NOTA: En el caso de estancias de investigación, el apoyo se autorizara sólo para transporte aéreo y/o terrestre</li>
							";
						break;
					case 4:
						$datos["titulo"] .= "Obtención de Grado";
						$datos["texto"] .= "
						<ul>
							<li>Las solicitudes de Apoyos Económicos serán avaladas por el Director de la Unidad Académica mediante oficio original que deberá contener los siguientes datos: nombre del solicitante, número de empleado, nombre, sede y fecha del evento</li>
							<li>El formato Único que genera el SICAE, firmado por el solicitante, con firma y sello del director de la Unidad Académica</li>
							<li>Carta de la institución que autoriza la fecha para la presentación del examen de grado</li>
							<li>En el caso de que exceda los 15 días hábiles reglamentarios para ausentarse de sus labores, se deberá anexar copia de la Licencia con goce de sueldo u oficio que justifique el año o semestre sabático</li>
							<li>NOTA:Para la presentación de examen de grado, se autorizará únicamente transporte aéreo y/o terrestre</li>
							";
						break;
					default:
						$datos["titulo"] .= "Curso, Diplomado, Seminario y/o Taller";
						$datos["texto"] .= "
						<ul>
							<li>Las solicitudes de Apoyos Económicos serán avaladas por el Director de la Unidad Académica mediante oficio original que deberá contener los siguientes datos: nombre del solicitante, número de empleado, nombre, sede y fecha del evento</li>
							<li>El formato Único que genera el SICAE, firmado por el solicitante, con firma y sello del director de la Unidad Académica</li>
							<li>Temario y programa del evento</li>
							<li>Tríptico o documento oficial del evento</li>
							<li>NOTA: Para la asistencia a cursos, diplomados, seminarios y/ o talleres podrá autorizarse transporte aéreo y/o terrestre, inscripción y gastos de estancia hasta por 5 días</li>
							";
				}
				
				$datos["texto"] .= "
					</ul>";
				
				
				if ( $solicitud["TIPO_PERSONA_ID"] == 1 ) { // Requisitos de docente
					
					$datos["titulo"] .= "<br />Requisitos de solicitante de nivel ";
					
					switch ($solicitud["NIVEL_ID"]) { // Requisitos por nivel de docencia
						case 1:
							$datos["titulo"] .= "Medio Superior";
							$datos["texto"] .= "
							<ul>
								<li>Docencia para el Nivel Medio Superior.- Acta de calificaciones de la unidad de aprendizaje de cualquiera de los semestres de dos años anteriores a la solicitud</li>
								<li>Formación de Recursos Humanos.- Presentar diploma de 'Formación y Actualización Docente para un Nuevo modelo Educativo' de 'Competencias Docentes en el Nivel Medio Superior' y/o 'Especialización en Competencias Docentes para Educación Media Superior'</li>
								<li>Constancia de participación en eventos de formación docente y/o actualización profesional, Programa Institucional de Tutorías (PIT), Orientación Juvenil (Maestro tutor), Recuperación Académica Estudiantil o de Formación de Emprendedores</li>
							</ul><br/>
							<h3>Observaciones</h3>
							En el caso de contar con evidencia de Dirección de Tesis y participar en proyectos de Investigación, no será necesario presentar los puntos 2 y 3 señalados anteriormente.
La productividad en instituciones externas deberá estar soportada con convenio inter-institucional.
Si el Profesor solicitante es becario EDD, no es necesario que presente evidencia de Docencia.
Si el Profesor solicitante es becario SIBE y presentó carga académica no es necesario que presente evidencia de Docencia.
Si el Profesor solicitante es director de proyecto SIP y en su ficha de productividad refiere Dirección de Tesis no es necesario que presente evidencia";
							break;
						case 2:
							$datos["titulo"] .= "Superior";
							$datos["texto"] .= "
							<ul>
								<li>Docencia para el Nivel Superior.- Acta de calificaciones de la unidad de aprendizaje de cualquiera de los semestres de dos años anteriores a la presentación de la solicitud</li>
								<li>Formación de Recursos Humanos.- Será suficiente con presentar 'Acta de registro de tema de tesis y designación de dirección de tesis' y 'Acta de examen profesional y/o de grado' de cualquiera de los dos años anteriores</li>
								<li>Actividades de Investigación.- Si es proyecto SIP no es necesario presentar evidencias, ya que esta información será verificada con la base de consulta que nos proporciona la Secretaría de Investigación y Posgrado</li>
							</ul><br/>
							<h3>Observaciones</h3>
							La productividad en instituciones externas deberá estar soportada con convenio inter-institucional.
Si el Profesor solicitante es becario EDD, no es necesario que presente evidencia de Docencia.
Si el Profesor solicitante es becario SIBE y presentó carga académica no es necesario que presente evidencia de Docencia.
Si el Profesor solicitante es director de proyecto SIP y en su ficha de productividad refiere Dirección de Tesis no es necesario que presente evidencia";
							break;
						case 5:
							$datos["titulo"] .= "Posgrado";
							$datos["texto"] .= "
							<ul>
								<li>Actas de calificaciones y/o constancia de docencia firmada por el Director de Posgrado</li>
								<li>Para el Nivel Posgrado Acta de calificaciones de la unidad de aprendizaje de cualquiera de los semestres de dos años anteriores a la presentación de la solicitud y/o Constancia de docencia con el Visto Bueno de la Dirección de Posgrado</li>
								<li>Formación de Recursos Humanos.- Será suficiente con presentar 'Acta de registro de tema de tesis y designación de dirección de tesis' y 'Acta de examen profesional y/o de grado' de cualquiera de los dos años anteriores</li>
								<li>Actividades de Investigación.- Si es proyecto SIP no es necesario presentar evidencias, ya que esta información será verificada con la base de consulta que nos proporciona la Secretaría de Investigación y Posgrado</li>
							</ul><br/>
							<h3>Observaciones</h3>
							La productividad en instituciones externas deberá estar soportada con convenio inter-institucional.
Si el Profesor solicitante es becario EDD, no es necesario que presente evidencia de Docencia.
Si el Profesor solicitante es becario SIBE y presentó carga académica no es necesario que presente evidencia de Docencia.
Si el Profesor solicitante es director de proyecto SIP y en su ficha de productividad refiere Dirección de Tesis no es necesario que presente evidencia";
							break;
					}
				}
				
				
				
				
			} else  {	// REALIZACION
				
				$datos["texto"] .= "	<ul>
						<li>Las solicitudes de Apoyos Económicos serán avaladas por el Director de la Unidad Académica mediante oficio original que deberá contener los siguientes datos: nombre del coordinador del evento, número de empleado, nombre, sede y fecha del evento</li>
						<li>El formato Único que genera el SICAE, firmado por el coordinador del evento, con firma de visto bueno del titular del área de coordinación académica correspondiente y la firma y sello del director de la Unidad Académica</li>
						<li>Programa Académico del evento, incluyendo días de duración y horario</li>
						<li>Programa financiero del evento que incluya costos desglosados por cada concepto (Transporte aéreo y/o terrestre de expositores, viáticos, etc)</li>
						<li>Resumen curricular de cada expositor</li>
						<li>
						<h3>OBSERVACIONES:</h3>
Las solicitudes para la realización de eventos que no cuenten con el visto bueno del Titular del área de coordinación académica correspondiente, se devolverán con oficio señalando la improcedencia.
Los eventos de realización deberán estar relacionados con las áreas de formación académica de la dependencia politécnica que los solicite y ser para beneficio principalmente del personal de carrera en servicio del IPN.
El concepto de pago de honorarios será exclusivo para expositores externos al Instituto.
Los conceptos de materiales y otros gastos podrán ser considerados tomando en cuenta la importancia y trascendencia del evento para el Instituto.
Se podrá autorizar un apoyo para la realización de un evento académico organizado por varias Instituciones con corresponsabilidad en los gastos y en los que obtengan financiamiento de otras fuentes</li>
					</ul>";
				
			}
			
		echo json_encode($datos);
		}
	}
}
?>