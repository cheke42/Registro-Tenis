<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017 
 */
class Partido extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Partido_model','partidoModel');
	}

	// Redireccion a Home
	function index(){
		redirect(base_url(),'refresh');	
	}

	// Instancia de partido
	function detalle(){
		$datos['id'] = $this->input->get('id');
		$datos = array_merge($datos,$this->_init($datos));
		$this->util->template('partido/detalle',$datos);
	}

	// Contexto por fecha
	function por_fecha(){
		$datos['id'] = $this->input->get('id');
		$datos['fecha'] = $this->input->get('fecha');
		$datos = array_merge($datos,$this->_init($datos));
		$this->util->template('partido/detalle',$datos);
	}

	// Contexto por instancia
	function por_instancia(){
		$datos['id'] = $this->input->get('id');
		$datos['instancia'] = $this->input->get('instancia');
		$datos = array_merge($datos,$this->_init($datos));
		$this->util->template('partido/detalle',$datos);
	}

	// Contexto por jugador
	function por_jugador(){
		$datos['id'] = $this->input->get('id');
		$datos['id_jugador'] = $this->input->get('numero_jugador');
		$datos = array_merge($datos,$this->_init($datos));
		$this->util->template('partido/detalle',$datos);
	}

	// Datos de la vista
	private function _init($datos_get){
		$datos = array();
		$datos['partido'] = $this->db_util->get('partido',$datos_get['id']); 
		$datos['partido_siguiente'] = array();
		$datos['partido_anterior'] = array();
		// FECHA
		if(!empty($datos_get['fecha'])){
			$datos['partido_anterior'] = $this->_obtener_dato('anterior','fecha',$datos_get['fecha'],$datos_get['id']); 
			$datos['partido_siguiente'] = $this->_obtener_dato('siguiente','fecha',$datos_get['fecha'],$datos_get['id']); 
		}
		// INSTANCIA
		if(!empty($datos_get['instancia'])){
			$datos['partido_anterior'] = $this->_obtener_dato('anterior','instancia',$datos_get['instancia'],$datos_get['id']); 
			$datos['partido_siguiente'] = $this->_obtener_dato('siguiente','instancia',$datos_get['instancia'],$datos_get['id']); 
		}
		// 
		if(!empty($datos_get['id_jugador'])){
			$datos['partido_anterior'] = $this->_obtener_dato('anterior','jugador',$datos_get['id_jugador'],$datos_get['id']); 
			$datos['partido_siguiente'] = $this->_obtener_dato('siguiente','jugador',$datos_get['id_jugador'],$datos_get['id']); 
		}
		return $datos;
	}

	// Funcion para optimizar la busqueda de dato anterior|siguiente
	function _obtener_dato($tipo,$contexto,$datoUno,$datoDos){
		if($this->partidoModel->obtener_partido($tipo,$contexto,$datoUno,$datoDos)){
				return $this->partidoModel->obtener_partido($tipo,$contexto,$datoUno,$datoDos)['0'];	
		}
		return array();
	}

}