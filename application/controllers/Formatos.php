<?php
class Formatos extends CI_Controller {
	public function ponencia() {
		$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->AddPage();
		
		$html = '<h1>Probando, probando...</h1>';
		
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
		$pdf->Output("Prueba", 'I');
	}
}
?>