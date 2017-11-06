<?php
class Publicaciones extends CI_Controller {
	public function index() {
		$header["js"][] = "jquery.placeholder.min";
		$header["js"][] = "publicaciones";
		
		$header['titulo'] = "Publicaciones";
		
		$this->load->model("moneda_md");
		
		$params["monedas"] = $this->moneda_md->GetAll();
		
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
		array_push($data,6);//Tipo Publicación
		array_push($data,$this->input->post('revista').": ".$this->input->post('titulo'));
		array_push($data, $this->input->post('issn'));
		array_push($data, $this->input->post('sede'));
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, 1);//Se manda 1 pero la validación es en el modelo
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		array_push($data, NULL);
		
		$res['solicitud'] = $this->solicitud_md->InsertRecord($data);
		
		$data=array();
		
		array_push($data, $usr);
		array_push($data,$this->input->post("titulo"));
		array_push($data,1);
		array_push($data,$this->input->post('revista'));
		array_push($data,0);
		
		$res['publicacion'] = $this->publicacion_md->InsertRecord($data);
		
		echo json_encode($res);
	}
	
	public function coautores() {
		$this->load->model("coautor_md");
		$sol=$this->input->post("solicitud_id");
		$res=array();
		$nombres=$this->input->post("coNombre");
		$apps=$this->input->post("coApP");//Revisar name del campo en la vista de las ponencias que se agregan
		$apms=$this->input->post("coApM");
		$pn=$this->input->post('id_publicacion');
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
		$sol=$this->input->post("solicitud_id");
		if($costo!=""&&$cpsto>0){
			$this->monto_md->InsertRecord(array(1,$sol,"a",$costo,0,"",$this->input->post("moneda"),$this->input->post("moneda")));
		}
		echo $sol;
		
	}
}
?>