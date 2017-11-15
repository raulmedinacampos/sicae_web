<?php
class Publicacion extends CI_Controller {
	public function index() {
		$this->load->model("solicitud_md");
	
		$publicacion = $this->solicitud_md->GetByTypePerson(6, $this->session->id);
	
		if ( $publicacion && sizeof($publicacion) > 0 ) {
			$this->listado();
		} else {
			$this->nueva();
		}
	}
	
	public function listado() {
		$header["js"][] = "jquery.dataTables.min";
		$header["js"][] = "solicitudes";
	
		$header["titulo"] = "Publicaciones";
	
		$this->load->model("solicitud_md");
	
		$params["solicitudes"] = $this->solicitud_md->GetByTypePerson(6, $this->session->id);
	
		$this->load->view('template/header', $header);
		$this->load->view('listados/publicacion', $params);
		$this->load->view('template/footer');
	}
	
	public function nueva() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "publicaciones";
		
		$header['titulo'] = "Publicaciones";
		
		$this->load->model("solicitud_md");
		$this->load->model("moneda_md");
		$this->load->model("coautor_md");
		$this->load->model("monto_md");
		
		$idSol = $this->input->post("hdnID");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
		if ( $idSol ) {
			$params["publicacion"] = $this->solicitud_md->GetById($idSol);
		}
		
		if ( isset($params["publicacion"]) ) {
			$params["coautores"] = $this->coautor_md->GetBySolicitud($params["publicacion"]["ID"]);
			$params["costo"] = $this->monto_md->GetByTypeReq("9", $params["publicacion"]["ID"]);
		}
		
		$this->load->view('template/header', $header);
		$this->load->view('realizacion/publicacion', $params);
		$this->load->view('template/footer');
	}
	
	public function guardar() {
		$this->load->model("solicitud_md");
		$this->load->model("publicacion_md");
		$usr=$this->session->userdata('id');
		$res=array();
		$data=array();
		
		array_push($data,'A');
		array_push($data, $usr);
		array_push($data, 6);//Tipo Publicación
		array_push($data, $this->input->post('titulo'));
		array_push($data, $this->input->post('revista'));
		array_push($data, $this->input->post('sede'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, 1);//Se manda 1 pero la validación es en el modelo
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, $this->input->post('issn'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		if ( $this->input->post("idSolicitud") == 0 )
			$id = $this->solicitud_md->InsertRecord($data);
		else
			$id = $this->solicitud_md->UpdateRecord($data,$this->input->post("idSolicitud"));
		
		echo $id;
	
		//$res['solicitud'] = $id;
		
		/*$data=array();
		
		array_push($data, $usr);
		array_push($data,$this->input->post("titulo"));
		array_push($data,1);
		array_push($data,$this->input->post('revista'));
		array_push($data,0);
		
		$res['publicacion'] = $this->publicacion_md->InsertRecord($data);
		
		echo json_encode($res);*/
	}
	
	public function coautores() {
		$this->load->model("coautor_md");
		$sol=$this->input->post("idSolicitud");
		$res=array();
		$nombres=$this->input->post("coNombre");
		$apps=$this->input->post("coApP");
		$apms=$this->input->post("coApM");
		//$pn=$this->input->post('id_publicacion');
		$pn=1;
		$this->coautor_md->CleanSol($sol);
		foreach($nombres as $ky=>$vl){
			$data=array();
			array_push($data,$pn);
			array_push($data,$sol);
			array_push($data,"A");
			array_push($data,NULL);
			array_push($data,$vl);
			array_push($data,$apps[$ky]);
			array_push($data,$apms[$ky]);
				
			$rs=$this->coautor_md->insertRecord($data);
			
			array_push($res,$rs);
		}
		
		echo json_encode($res);//Son los id de los coautores agregados
	}
		
	public function montos() {
		$this->load->model("monto_md");
		$this->load->model("apoyo_md");
		$costo=$this->input->post('costo');
		$sol=$this->input->post("idSolicitud");
		if($costo!=""&&$costo>0){
			$this->monto_md->CleanSol($sol);
			$this->monto_md->InsertRecord(array(9,$sol,"A",$costo,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
		}
		echo $sol;
		
	}
}
?>