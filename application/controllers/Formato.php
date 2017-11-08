<?php
class Formato extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->library('pdf');
	}
	
	public function ponencia() {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, base_url('css/formato.css'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$stylesheet = curl_exec($ch);
		curl_close($ch);
		
		/******* Header *******/
		$header = '<div id="header">';
		$header .= '<table>';
		$header .= '<tr>';
		$header .= '<td width="25%"><img src="'.$logo.'" alt="" style="max-width:140px; max-height:50pt;" /></td>';
		$header .= '<td width="50%" class="desc">'.$desc.'</td>';
		$header .= '<td width="25%" style="text-align:right;">'.date('d/m/Y').'</td>';
		$header .= '</tr>';
		$header .= '</table>';
		$header .= '</div>';
		
		
		/******* Footer *******/
		$footer = '<div id="footer">';
		$footer .= '<table>';
		$footer .= '<tr>';
		$footer .= '<td width="25%">Powered by Nutripuntos</td>';
		$footer .= '<td width="25%" style="text-align:right;">Pag {PAGENO}</td>';
		$footer .= '</tr>';
		$footer .= '</table>';
		$footer .= '</div>';
		
		/******* Inicializacion ********/
		/*$nombre = trim($pac->nombre." ".$pac->apellidos);
		
		if ( $pac->sexo == "h" ) {
			$pac->sexo = "Hombre";
		}
			
		if ( $pac->sexo == "m" ) {
			$pac->sexo = "Mujer";
		}*/
		
		$pdf = $this->pdf->load("", "Letter", "", "Arial", 14, 14, 28, 18, 6, 8);
		$pdf->SetHTMLHeader($header);
		$pdf->SetHTMLFooter($footer);
		$pdf->WriteHTML($stylesheet, 1);
		
		$html = '<h1>Probando, probando...</h1>';
		
		$pdf->WriteHTML($html);
		$pdf->Output();
	}
}
?>