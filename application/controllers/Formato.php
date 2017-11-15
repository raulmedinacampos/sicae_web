<?php
class Formato extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('pdf');
	}
	
	public function index() {
		$this->load->model("persona_md");
		$this->load->model("solicitud_md");
		$this->load->model("tipo_evento_md");
		$this->load->model("nivel_academico_md");
		$this->load->model("centro_md");
		$this->load->model('estudio_md');
		$this->load->model('estudio_otro_md');
		$this->load->model('direccion_md');
		$this->load->model("proyecto_md");
		$this->load->model("ponencia_md");
		$this->load->model("coautor_md");
		$this->load->model("moneda_md");
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		
		$usr = $this->session->id;
		$id_solicitud = $this->input->post("hdnID");
		$titulo = "Asistencia ";
		$persona = $this->persona_md->GetById($usr);
		$solicitud = $this->solicitud_md->GetById($id_solicitud);
		
		if ( $persona["TIPO_PERSONA_ID"] == 1 ) {
			$this->load->model("profesor_md");
			$this->load->model("nombramiento_md");
			$this->load->model("materia_md");
			
			switch ( $solicitud["TIPO_EVENTO_ID"] ) {
				case 3:
					$titulo = "Asistencia a estancia de investigación";
					break;
				case 5:
					$titulo = "Asistencia a eventos como ponente";
					break;
				case 6:
					$titulo = "Publicación de artículo";
					break;
				case 9:
					$titulo = "Asistencia a conferencia";
					break;
				default:
					break;
			}
			
			$acad = $this->profesor_md->GetById($persona["ID"]);
			$nombramiento = $this->nombramiento_md->GetById($acad["NOMBRAMIENTO"]);
			$materias = $this->materia_md->GetByPerson($persona["ID"]);
			
			$tipoNom = explode("-", $nombramiento["DESCRIPCION"]);
			$tipoNom = $tipoNom[1];
			
			$a = new DateTime(date('Y-m-d'));
			$fecha = $acad["FECHA_INGRESO"];
			$fecha = explode("/", $fecha);
			$fecha = $fecha[0]."-".$fecha[1]."-".$fecha[2];
			$b = new DateTime($fecha);
			$antig = $a->diff($b)->format('%y');
			
			$excelencia = ($acad["EXCELENCIA"] == 0) ? "No" : "Sí";
			$sabatico = ($acad["SABATICO"] == 0) ? "No" : "Sí";
			$goceSueldo = ($acad["LIC_SUELDO"] == 0) ? "No" : "Sí";
			
			$edd = ($acad["EDD"] == 0) ? "No" : "Sí";
			$excl = ($acad["EXCLUSIVIDAD"] == 0) ? "No" : "Sí";
			$sni = ($acad["SNI"] == 0) ? "No" : "Sí";
			$edi = ($acad["EDI"] == 0) ? "No" : "Sí";
			
			$mat = "";
			foreach ( $materias as $val ) {
				$mat .= $val["NOMBRE"].", ";
			}
			$mat = trim($mat, ", ");
		}
		
		if ( $persona["TIPO_PERSONA_ID"] == 3 ) {
			$this->load->model("alumno_md");
			
			$acad = $this->alumno_md->GetById($persona["ID"]);
			$centroSip = $this->centro_md->GetById($acad["SIP_ESCUELA"]);
			
			switch ( $solicitud["TIPO_EVENTO_ID"] ) {
				case 3:
					$titulo = "Asistencia como alumno a estancia de investigación";
					break;
				case 5:
					$titulo = "Asistencia como alumno a eventos como ponente";
					break;
				default:
					break;
			}
			
			$bifi = ($acad["PIFI"] == 0) ? "No" : "Sí";
			$conacyt = ($acad["CONACYT"] == 0) ? "No" : "Sí";
		}
		
		$tipoEvento = $this->tipo_evento_md->GetById($solicitud["TIPO_EVENTO_ID"]);
		$nivAcad = $this->nivel_academico_md->GetById($acad["NIVEL_ACADEMICO"]);
		$centro = $this->centro_md->GetById($persona["CENTRO_ADSCRIPCION"]);
		$dirLic = $this->direccion_md->GetByNvPr(3, $persona["ID"]);
		$dirMaes = $this->direccion_md->GetByNvPr(4, $persona["ID"]);
		$dirDoc = $this->direccion_md->GetByNvPr(5, $persona["ID"]);
		$tDirLic = ($dirLic["TOTAL"] == "0") ? "No" : 'Sí <span class="tesis">T: '.$dirLic["TOTAL"].', </span><span class="tesis">C: '.$dirLic["CONCLUIDAS"].', </span><span class="tesis">I: '.$dirLic["INTERNAS"].'</span>';
		$tDirMaes = ($dirMaes["TOTAL"] == "0") ? "No" : 'Sí <span class="tesis">T: '.$dirMaes["TOTAL"].', </span><span class="tesis">C: '.$dirMaes["CONCLUIDAS"].', </span><span class="tesis">I: '.$dirMaes["INTERNAS"].'</span>';
		$tDirDoc = ($dirDoc["TOTAL"] == "0") ? "No" : 'Sí <span class="tesis">T: '.$dirDoc["TOTAL"].', </span><span class="tesis">C: '.$dirDoc["CONCLUIDAS"].', </span><span class="tesis">I: '.$dirDoc["INTERNAS"].'</span>';
		
		$proyectos = $this->proyecto_md->GetByPerson($persona["ID"]);
		$ponencias = $this->ponencia_md->GetBySolicitud($solicitud["ID"]);
		$coautores = $this->coautor_md->GetBySolicitud($solicitud["ID"]);
		$tAereo = $this->monto_md->GetByTypeReq("5", $solicitud["ID"]);
		$tTerrestre = $this->monto_md->GetByTypeReq("4", $solicitud["ID"]);
		$seguroInt = $this->monto_md->GetByTypeReq("11", $solicitud["ID"]);
		$estancia = $this->monto_md->GetByTypeReq("2", $solicitud["ID"]);
		$inscripcion = $this->monto_md->GetByTypeReq("3", $solicitud["ID"]);
		$apoyo = $this->apoyo_md->GetBySolicitud($solicitud["ID"]);
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, base_url('css/formato.css'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$stylesheet = curl_exec($ch);
		curl_close($ch);
		
		/******* Header *******/
		$header = '	<div id="header">
						<table width="100%">
							<tr>
								<td><img alt="" src="'.base_url("images/sep.png").'" width="180" /></td>
								<td align="center"><img alt="" src="'.base_url("images/ipn.png").'" width="40" /></td>
								<td align="right"><img alt="" src="'.base_url("images/cofaa.png").'" width="200" /></td>
							</tr>
						</table>
						<h1 class="text-center">Dirección de Especialización Docente e Investigación Científica y Tecnológica</h1>
						<h2 class="text-center">Formato COFAA para solicitar apoyos económicos</h2>
						<h3 class="text-center">'.$titulo.'</h3>
					</div>';
		
		
		/******* Footer *******/
		$footer = '	<div id="footer">
						<p class="text-center">IMPORTANTE<p>
						<p class="text-justified">La subscripción de este documento implica el reconocimiento de todas las 
						obligaciones inherentes al Reglamento para el otorgamiento de Becas de Estudio, 
						Apoyos Económicos y Licencias con Goce de Sueldo en el Instituto Politécnico 
						Nacional y Lineamientos correspondientes. Los datos recabados serán protegidos, 
						incorporados y tratados en el Sistema de Datos Personales del Departamento de 
						Apoyos Económicos de la COFAA del IPN. De conformidad con lo dispuesto en el 
						Artículo 3 Fracc. II y 18, 19, 20, 21 , 23 de la Ley Federal de Transparencia 
						y Acceso a la Información Pública Gubernamental, Artículos 37 al 41 de su 
						Reglamento, y en el numeral 32° de los Lineamientos Generales para la Clasificación 
						y Desclasificación de la Información de las Dependencias y Entidades de la 
						Administración Pública Federal, así como lo previsto en los Lineamientos de 
						Protección de Datos Personales.</p>
					</div>';
		
		/******* Inicializacion ********/
		$apellidos = trim($persona["APELLIDO_P"]." ".$persona["APELLIDO_M"]);
		
		if ( $persona["GENERO"] == "M" ) {
			$genero = "Masculino";
		}
			
		if ( $persona["GENERO"] == "F" ) {
			$genero = "Femenino";
		}
		
		$nivel_tec = $this->estudio_md->GetByNvPr(2, $persona["ID"]);
		$nivel_lic = $this->estudio_md->GetByNvPr(3, $persona["ID"]);
		$nivel_maes = $this->estudio_md->GetByNvPr(4, $persona["ID"]);
		$nivel_dr = $this->estudio_md->GetByNvPr(5, $persona["ID"]);
		$nivel_otro = $this->estudio_otro_md->GetByPersona($persona["ID"]);
		$nivel_otro = array_reverse($nivel_otro);
		$nivel_otro = implode(", ", array_column($nivel_otro, "NOMBRE"));
		
		$moneda = ($tAereo["S_MONEDA_ID"] == 1) ? 'USD $' : '$';
		$montoTotal = $tAereo["SOLICITADO"] + $tTerrestre["SOLICITADO"] + $seguroInt["SOLICITADO"] + $estancia["SOLICITADO"] + $inscripcion["SOLICITADO"];
		
		$pdf = $this->pdf->load("", "Letter", "", "Arial", 14, 14, 45, 18, 6, 8);
		$pdf->SetHTMLHeader($header);
		$pdf->SetHTMLFooter($footer);
		$pdf->WriteHTML($stylesheet, 1);
		
		
		/******* Se crean los campos con la información obtenida ********/
		$html = "";
		
		if ( $persona["TIPO_PERSONA_ID"] == 1 ) {
			$html .= '<p class="seccion">Datos generales</p>
					<table class="tabla">
						<tr>
							<td>Apellidos: '.$apellidos.'</td>
							<td>Nombre(s): '.$persona["NOMBRE"].'</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Solicitud: '.$solicitud["ID"].'</td>
							<td>Evento: '.$tipoEvento["DESCRIPCION"].'</td>
							<td>Centro de adscripción: '.$centro["NOMBRE_EXTRACORTO"].'</td>
						</tr>
						<tr>
							<td>RFC: '.$persona["RFC"].'</td>
							<td>No. empleado: '.$acad["NO_EMPLEADO"].'</td>
							<td>Sexo: '.$genero.'</td>
						</tr>
						<tr>
							<td>Teléfono: '.$persona["TELEFONO"].'</td>
							<td>Extensión: '.$persona["EXTENSION"].'</td>
							<td>E-mail: '.$persona["EMAIL"].'</td>
						</tr>
					</table>';
		}
		
		if ( $persona["TIPO_PERSONA_ID"] == 3 ) {
			$html .= '<p class="seccion">Datos generales</p>
					<table class="tabla">
						<tr>
							<td>Apellidos: '.$apellidos.'</td>
							<td>Nombre(s): '.$persona["NOMBRE"].'</td>
							<td>Número de boleta: '.$acad["BOLETA"].'</td>
						</tr>
						<tr>
							<td>Solicitud: '.$solicitud["ID"].'</td>
							<td>Centro de adscripción: '.$centro["NOMBRE_EXTRACORTO"].'</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>RFC: '.$persona["RFC"].'</td>
							<td>Sexo: '.$genero.'</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Teléfono: '.$persona["TELEFONO"].'</td>
							<td>Extensión: '.$persona["EXTENSION"].'</td>
							<td>E-mail: '.$persona["EMAIL"].'</td>
						</tr>
					</table>';
		}
		
		$html .= '	<p class="seccion">Datos bancarios</p>
					<table class="tabla">
						<tr>
							<td width="50%">Banco: '.$persona["BANCO_NOMBRE"].'</td>
							<td width="50%">Sucursal: '.$persona["BANCO_SUCURSAL"].'</td>
						</tr>
						<tr>
							<td>Cuenta: '.$persona["BANCO_CUENTA"].'</td>
							<td>CLABE interbancaria: '.$persona["BANCO_CLABE"].'</td>
						</tr>
					</table>';
		
		if ( $persona["TIPO_PERSONA_ID"] == 1 ) {
			$html .= '	<p class="seccion">Grados académicos</p>
					<table class="tabla">
						<tr>
							<td>Licenciatura: '.$nivel_lic["NOMBRE"].'</td>
							<td>Maestría: '.$nivel_maes["NOMBRE"].'</td>
						</tr>
						<tr>
							<td>Doctorado: '.$nivel_dr["NOMBRE"].'</td>
							<td>Otros estudios: '.$nivel_otro.'</td>
						</tr>
					</table>';
		}
		
		if ( $persona["TIPO_PERSONA_ID"] == 3 ) {
			$html .= '<p class="seccion">Información académica</p>
					<table class="tabla">
						<tr>
							<td colspan="4">Carrera técnica: '.$nivel_tec["NOMBRE"].'</td>
						</tr>
						<tr>
							<td colspan="4">Licenciatura: '.$nivel_lic["NOMBRE"].'</td>
						</tr>
						<tr>
							<td colspan="4">Maestría: '.$nivel_maes["NOMBRE"].'</td>
						</tr>
						<tr>
							<td colspan="4">Doctorado: '.$nivel_dr["NOMBRE"].'</td>
						</tr>
						<tr>
							<td colspan="2">Becas</td>
							<td>BIFI: '.$bifi.'</td>
							<td>CONACYT: '.$conacyt.'</td>
						</tr>
						<tr>
							<td colspan="4">Las materias que cursa actualmente son: '.$nivAcad["NOMBRE"].'</td>
						</tr>
					</table>';
		}
		
		if ( $persona["TIPO_PERSONA_ID"] == 1 ) {
			$html .= '<p class="seccion">Datos laborales</p>
					<table class="tabla">
						<tr>
							<td>Tipo de nombramiento: '.$tipoNom.'</td>
							<td>Número de horas: '.$acad["HORAS"].'</td>
							<td>Antigüedad: '.$antig.' año(s)</td>
						</tr>
						<tr>
							<td>Fecha de ingreso al IPN: '.$acad["FECHA_INGRESO"].'</td>
							<td colspan="2">Fecha en que obtuvo la base: '.$acad["FECHA_BASE"].'</td>
						</tr>
						<tr>
							<td width="35%">Contratado dentro del programa de profesor de excelencia: '.$excelencia.'</td>
							<td>Sabático: '.$sabatico.'</td>
							<td>Licencia con goce de sueldo: '.$goceSueldo.'</td>
						</tr>
						<tr>
							<td>Categoría: '.$acad["CATEGORIA"].'</td>
							<td>Plaza: '.$acad["PLAZA"].'</td>
						</tr>
					</table>';
		}
		
		if ( $persona["TIPO_PERSONA_ID"] == 1 ) {
			$html .= '<p class="seccion">Productividad académica</p>
					<table class="tabla">
						<tr>
							<td>Becas: </td>
							<td class="descripcion">EDD: '.$edd.'</td>
							<td class="descripcion">Exclusividad: '.$excl.'</td>
							<td class="descripcion">SNI: '.$sni.'</td>
							<td class="descripcion">EDI: '.$edi.'</td>
						</tr>
						<tr>
							<td colspan="2">Direcciones de tesis realizadas: <br /><span class="descripcion">(En los 2 últimos años)(Total, concluidas, institucionales)</span></td>
							<td class="descripcion">Licenciatura: '.$tDirLic.'</td>
							<td class="descripcion">Maestría: '.$tDirMaes.'</td>
							<td class="descripcion">Doctorado: '.$tDirDoc.'</td>
						</tr>
						<tr>
							<td colspan="2">Publicaciones realizadas:<br /><span class="descripcion">(En los 2 últimos años)</span></td>
							<td class="descripcion">Nacionales: </td>
							<td class="descripcion">Internacionales: </td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td colspan="5">Materias que imparte actualmente: '.$mat.'</td>
						</tr>
						<tr>
							<td colspan="5">Las materias que imparte corresponden a: '.$nivAcad["NOMBRE"].'</td>
						</tr>
						<tr>
							<td colspan="5"><strong>Proyectos de investigación:</strong></td>
						</tr>
						<tr>
							<td colspan="5">
								<table class="registros">
									<tr class="even">
										<th>Tipo y número de registro</td>
										<th>Tipo de participación</td>
									</tr>';
		$i = 0;
		foreach ( $proyectos as $val ) {
			if ( $i < 7 ) {
				$html .= '
									<tr>
										<td>'.$val["TIPO"]."-".$val["REGISTRO"].'</td>
										<td>'.$val["DESCRIPCION"].'</td>
									</tr>';
			}
			$i++;
		}
		
		$html .= '				</table>
							</td>
						</tr>
					</table>';
		}
		
		if ( $persona["TIPO_PERSONA_ID"] == 3 ) {
			$html .= '<p class="seccion">Proyecto SIP</p>
					<table class="tabla">
						<tr>
							<td>Registro: '.$acad["SIP_REGISTRO"].'</td>
						</tr>
						<tr>
							<td>Nombre: '.$acad["SIP_NOMBRE"].'</td>
						</tr>
						<tr>
							<td>Unidad de adscripción del proyecto: '.$centroSip["NOMBRE_EXTRACORTO"].'</td>
						</tr>
						<tr>
							<td>Director del proyecto: '.$acad["SIP_DIRECTOR"].'</td>
						</tr>
					</table>';
		}
		
		$pdf->WriteHTML($html);
		
		$pdf->AddPage();
		
		/* Estancia de investigación */
		if ( $solicitud["TIPO_EVENTO_ID"] == 3 ) {
			$html = '	<p class="seccion">Evento y actividad académica a realizar</p>
						<table class="tabla">
							<tr>
								<td colspan="4">Nombre del evento: '.$solicitud["NOMBRE_EVENTO"].'</td>
							</tr>
							<tr>
								<td colspan="4">Sede: '.$solicitud["SEDE"].'</td>
							</tr>
							<tr>
								<td colspan="4">Objetivo: '.$solicitud["OBJETIVO"].'</td>
							</tr>
							<tr>
								<td colspan="4">Beneficio institucional: '.$solicitud["BENEFICIO"].'</td>
							</tr>
							<tr>
								<td colspan="4">Progama de trabajo: '.$solicitud["OTRO"].'</td>
							</tr>
							<tr>
								<td colspan="4">Itinerario: '.$solicitud["ITINERARIO"].'</td>
							</tr>
							<tr>
								<td colspan="2">Fechas: del '.$solicitud["FECHA_INICIAL"].' al '.$solicitud["FECHA_FINAL"].'</td>
							</tr>
						</table>';
		}
		
		/* Obtención de grado */
		if ( $solicitud["TIPO_EVENTO_ID"] == 4 ) {
			$html = '';
		}
		
		/* Ponencia */
		if ( $solicitud["TIPO_EVENTO_ID"] == 5 ) {
			$html = '	<p class="seccion">Evento y actividad académica a realizar</p>
						<table class="tabla">';
			
			$i = 0;
			
			foreach ( $ponencias as $val ) {
				$html .= '	<tr>';
				
				if ( $i == 0) {
					$html .= '	<td rowspan="'.sizeof($ponencias).'" valign="top" width="10%">Título de ponencia: </td>';
				}
				
				$html .= '		<td colspan="3">['.$val["ID"]."] ".$val["NOMBRE"].'</td>
							</tr>';
				
				$i++;
			}
			
			$i = 0;
			
			foreach ( $coautores as $val ) {
				$html .= '	<tr>';
					
				if ( $i == 0) {
					$html .= '	<td rowspan="'.sizeof($coautores).'" valign="top" width="10%">Coautor: </td>';
				}
					
				$html .= '		<td colspan="3">['.$val["PONENCIA_ID"]."] ".trim($val["APELLIDO_P"]." ".$val["APELLIDO_M"]." ".$val["NOMBRE"]).'</td>
							</tr>';
					
				$i++;
			}
			
			$html .= '		<tr>
								<td colspan="4">Evento: '.$solicitud["NOMBRE_EVENTO"].'</td>
							</tr>
							<tr>
								<td colspan="4">Sede: '.$solicitud["SEDE"].'</td>
							</tr>
							<tr>
								<td colspan="4">Institución que organiza: '.$solicitud["ORGANIZA"].'</td>
							</tr>
							<tr>
								<td colspan="2">Fechas: del '.$solicitud["FECHA_INICIAL"].' al '.$solicitud["FECHA_FINAL"].'</td>
								<td colspan="2">Idioma: '.$solicitud["OTRO"].'</td>
							</tr>
						</table>';
		}
		
		/* Publicaciones */
		if ( $solicitud["TIPO_EVENTO_ID"] == 6 ) {
			$html = '';
		}
		
		/* Seminarios y otros */
		if ( $solicitud["TIPO_EVENTO_ID"] == 1 || $solicitud["TIPO_EVENTO_ID"] == 2 || $solicitud["TIPO_EVENTO_ID"] == 7 || $solicitud["TIPO_EVENTO_ID"] == 8 ) {
			$html = '';
		}
		
		$html .= '	<p class="seccion">Monto solicitado</p>
					<h6>Apoyo solicitado para:</h6>
					<table class="montos">
						<tr>
							<td width="27%">Transporte aéreo:<br /><span class="descripcion">(Viaje redondo, clase turista)</span></td>
							<td width="27%" class="cantidad">'.$moneda.number_format($tAereo["SOLICITADO"], 2).'</td>
							<td class="descripcion">Transporte aéreo: '.$tAereo["JUSTIFICACION"].'</td>
						</tr>
						<tr>
							<td>Transporte terrestre:<br /><span class="descripcion">(Viaje redondo)</span></td>
							<td class="cantidad">'.$moneda.number_format($tTerrestre["SOLICITADO"], 2).'</td>
							<td class="descripcion">Transporte terrestre: '.$tTerrestre["JUSTIFICACION"].'</td>
						</tr>
						<tr>
							<td>Gastos de estancia:<br /><span class="descripcion">(Viáticos)</span></td>
							<td class="cantidad">'.$moneda.number_format($estancia["SOLICITADO"], 2).'</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>Inscripción:</td>
							<td class="cantidad">'.$moneda.number_format($inscripcion["SOLICITADO"], 2).'</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td><strong>TOTAL:</strong></td>
							<td class="total">'.$moneda.number_format($montoTotal, 2).'</td>
							<td>&nbsp;</td>
						</tr>
					</table>';
		
		$html .= '	<div class="firmas">
						<div class="firmaIzq">'.$persona["NOMBRE"]." ".$apellidos.'</div>
						<div class="firmaDer">Firma del director '.$centro["NOMBRE_DIRECTOR"].' y sello de la U.A.</div>
					</div>';
		
		$pdf->WriteHTML($html);
		$pdf->Output("Formato.pdf","D");
	}
}
?>