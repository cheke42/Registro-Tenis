<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
require 'assets/html2pdf/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

class Util_model extends CI_Model {
	/*
		Themes: bootstrap,cerulean,cosmo,cyborg,darkly,flatly,journal,literal,lumen,lux
				materia,minty,pulse,sandstone,simplex,sketchy,slate,solar,spacelab,
				superhero,united,yeti
	*/
	var $theme = 'bootstrap';

	function template($view,$data = null){
		if($data){
			$data['theme'] = $this->theme;
			$this->load->view('template/header', $data);
			$this->load->view($view, $data);
			$this->load->view('template/footer', $data);
		}else{
			$data['theme'] = $this->theme;
			$this->load->view('template/header',$data);
			$this->load->view($view);
			$this->load->view('template/footer');
		}
	}

	function user_logged(){
		$value = $this->session->userdata('userData');
		if($value){
			$data = json_decode($value,true);
			$data['status'] = 'in';
		}else{
			$data['status'] = 'out';
		}
		return $data;
	}

	function is_logged(){
		return $this->usuario_logueado()['status'] == 'in';
	}

	function generate_attr($key,$value){
		return $key . '="' . $value . '" ';
	}

	function generate_option($key,$value){
		return '<option value="' . $key .'">' . $value . '</option>';
	}

	function generate_reporte($nombre_reporte){
		$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
		ob_start();
		require_once 'assets/reportes/'. $nombre_reporte  . '.php';
		$html = ob_get_clean();
		$html2pdf->writeHTML($html);
		$html2pdf->output();
	}

	// Calcular la edad
	function calcular_edad($nacimiento){
		$birthDate = explode("-", date('d-m-Y', strtotime($nacimiento)));
		return (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2]));
	}
}