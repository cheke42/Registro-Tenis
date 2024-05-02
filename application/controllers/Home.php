<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Home extends CI_Controller {

	// Pagina de inicio
	function index()
	{
		$datos['canchas'] = $this->db_util->get('cancha')->result();
		$datos['partidos_en_juego'] = $this->db_util->get_with_array('partido',array('estado' => 1));
		$this->util->template('home',$datos);
	}

	// 404 hacia Home
	function error(){
		redirect(base_url(),'refresh');
	}

	function acerca_de(){
		$this->util->template('acercade');
	}

}