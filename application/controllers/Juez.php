<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Juez extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Juez_model','juezModel');
	}

	function index(){
		redirect(base_url(),'refresh');
	}

	// Instancia de un juez
	function detalle(){
		$datos['id'] = $this->input->get('id');
		$datos = array_merge($datos, $this->_init($datos));
		$this->util->template('juez/detalle',$datos);
	}

	// Contexto por tipo y partido
	function por_tipo_y_partido(){
		$datos['id_partido'] = $this->input->get('id_partido');
		$datos['id_juez'] = $this->input->get('id_juez');
		$datos = array_merge($datos, $this->_init($datos));
		$this->util->template('juez/detalle',$datos);
	}

	// Inicialización
	private function _init($datos_get){
		$datos['juez'] = array();
		$datos['juez_anterior'] = array();
		$datos['juez_siguiente'] = array();
		// Instancia de un juez
		if(isset($datos_get['id'])){
			$datos['juez'] = $this->db_util->get('juez',$datos_get['id']);
		}
		// Contexto por tipo y partido
		if(isset($datos_get['id_partido'])){
			$datos['partido'] = $this->db_util->get('partido',$datos_get['id_partido']);
			$datos['jugadorUno'] = $this->db_util->get('jugador',$datos['partido']->jugador_uno);
			$datos['jugadorDos'] = $this->db_util->get('jugador',$datos['partido']->jugador_dos);
			
			if($datos_get['id_juez']){
				$datos['juez'] = $this->db_util->get('juez',$datos_get['id_juez']);
				$datos['juez_anterior'] = $this->_obtener_dato($datos['juez']->id,'anterior',$datos_get['id_partido'],$datos['juez']->id);
				$datos['juez_siguiente'] = $this->_obtener_dato($datos['juez']->id,'siguiente',$datos_get['id_partido'],$datos['juez']->id);
			}else{
				$jueces = $this->db_util->get_with_array('juez_partido', array('partido' => $datos_get['id_partido']));
				if($jueces){
					$datos['juez'] = $this->db_util->get('juez',$jueces['0']->partido);
					$datos['juez_siguiente'] = $this->_obtener_dato(null,'siguiente',$datos_get['id_partido'],$datos['juez']->id);
				}		
			}
		}
		// Datos adicionales
		if($datos['juez']){
			$datos['pais'] = $this->db_util->get('pais',$datos['juez']->pais_nacimiento)->nombre;
			$datos['tipo_juez'] = $this->db_util->get('tipo_juez',$datos['juez']->tipo)->nombre;
			$datos['edad'] = $this->util->calcular_edad($datos['juez']->nacimiento);
		}
		return $datos;
	}

	// Funcion para optimizar la busqueda de dato anterior|siguiente
	private function _obtener_dato($id,$tipo,$id_partido,$id_juez){
		if($this->juezModel->obtener_juez($id,$tipo,$id_partido,$id_juez)){
			$id_buscado = $this->juezModel->obtener_juez($id,$tipo,$id_partido,$id_juez)['0']->juez;
			return $this->db_util->get('juez',$id_buscado);
		}
		return array();
	}

}
