<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Cancha extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Cancha_model','canchaModel');
	}
	
	// Lista de canchas
	function index(){
		$this->listar();	
	}

	// Instancia de una cancha
	function detalle(){
		$datos['id'] = $this->input->get('id');
		$datos['jugador'] = $this->db_util->get('cancha',$datos['id']);
		$datos['ciudad'] = $this->db_util->get('ciudad',$datos['jugador']->ubicacion)->nombre;
		$datos['ultimos_partidos'] = $this->canchaModel->ultimos_partidos($datos['id'],3);
		$this->util->template('cancha/detalle',$datos);
	}

	// Listar las canchas
	function listar(){
		$datos['canchas'] = $this->db_util->get('cancha')->result();
		$this->util->template('cancha/listar',$datos);
	}

}