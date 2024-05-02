<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Contenido extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Contenido_model','contenidoModel');
	}

	// Redirección a Home
	function index()
	{
		redirect(base_url(),'refresh');
	}

	// Contexto 'de_partido'
	function de_partido(){
		$datos['id_contenido'] = $this->input->get('id_contenido');
		$datos['id'] = $this->input->get('id');
		$datos['partido'] = $this->db_util->get('partido',$datos['id']);
		$datos = array_merge($datos,$this->_init($datos));
		$this->util->template('contenido/visor',$datos);
	}

	// Inicialización
	private function _init($datos_init){
		$datos = array();
		$datos['contenido'] = array();
		$datos['contenido_anterior'] = array();
		$datos['contenido_siguiente'] = array();
		if(!isset($datos_init['id_contenido'])){
			$datos['contenidos'] = $this->db_util->get_with_array('contenido_partido',array('partido' => $datos_init['id']));
			if($datos['contenidos']){
				$datos['contenido'] = $this->db_util->get('contenido',$datos['contenidos']['0']->contenido);
			}
		}else{
			$datos['contenido'] = $this->db_util->get('contenido',$datos_init['id_contenido']);
		}
		if ($datos['contenido']) {
			$datos['contenido_anterior'] = $this->_obtener_dato('anterior',$datos_init['partido']->id,$datos['contenido']->id);
			$datos['contenido_siguiente'] = $this->_obtener_dato('siguiente',$datos_init['partido']->id,$datos['contenido']->id);
		}
		$datos['jugadorUno'] = $this->db_util->get('jugador',$datos_init['partido']->jugador_uno);
		$datos['jugadorDos'] = $this->db_util->get('jugador',$datos_init['partido']->jugador_dos);
		return $datos;
	}
	
	// Funcion para optimizar la busqueda de dato anterior|siguiente
	private function _obtener_dato($tipo,$id_partido,$id_contenido){
		if($this->contenidoModel->mas_contenido($tipo,$id_partido,$id_contenido)){
			return $this->contenidoModel->mas_contenido($tipo,$id_partido,$id_contenido)['0'];
		}
		return array();
	}
}
