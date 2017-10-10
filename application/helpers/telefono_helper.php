<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('SepareteLada')) {
	function SepareteLada($numero) {
		$telefono = array();
		
		if ( strlen($numero) < 10 ) {
			$telefono[0] = substr($numero, 0, 2);
		} else {
			$telefono[0] = substr($numero, 0, 3);
		}
		
		$telefono[1] = substr($numero, 2, 7);
		
		return $telefono;
	}
}
?>