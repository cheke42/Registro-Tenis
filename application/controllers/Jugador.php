<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Jugador extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Jugador_model','jugadorModel');
	}

	// Redirección a home
	function index(){
		redirect(base_url(),'refresh');
	}

	// Instancia de jugador
	function detalle(){
		$datos['id'] = $this->input->get('id');
		$datos = array_merge($datos, $this->_init($datos));
		$this->util->template('jugador/detalle',$datos);
	}

	// Contexto por_nacionalidad
	function por_nacionalidad(){
		$datos['id'] = $this->input->get('id');
		$datos['nacionalidad'] = $this->input->get('nacionalidad');
		$datos = array_merge($datos, $this->_init($datos));
		$this->util->template('jugador/detalle',$datos);
	}

	// Contexto por_partido
	function por_partido(){
		$datos['id_partido'] = $this->input->get('id_partido');
		$datos['id_jugador_partido'] = $this->input->get('id_jugador_partido');
		$datos = array_merge($datos, $this->_init($datos));
		$this->util->template('jugador/detalle',$datos);
	}

	// Contexto por_nombre
	function por_nombre(){
		$datos['nombre'] = $this->input->get('nombre');
		$datos['id_jugador'] = $this->input->get('id_jugador');
		$datos = array_merge($datos, $this->_init($datos));
		$this->util->template('jugador/detalle',$datos);	
	}

	// Datos de la vista
	private function _init($datos_get){
		$datos = array();
		$datos['siguiente_jugador'] = array();
		$datos['anterior_jugador'] = array();
		$datos['jugador'] = array();
		// Instancia Jugador
		if(isset($datos_get['id'])){
			$datos['jugador'] = $this->db_util->get('jugador',$datos_get['id']);
			if(!isset($datos_get['nacionalidad'])){
				unset($datos['siguiente_jugador']);
				unset($datos['anterior_jugador']);
			}
		}
		// Contexto por nacionalidad
		if($datos['jugador']){
			if(isset($datos_get['nacionalidad'])){
				$datos['siguiente_jugador'] = $this->_obtener_dato('siguiente','por_nacionalidad',$datos_get['nacionalidad'],$datos['jugador']->id);
				$datos['anterior_jugador'] = $this->_obtener_dato('anterior','por_nacionalidad',$datos_get['nacionalidad'],$datos['jugador']->id);
			}
		}
		// Contexto por nombre
		if(isset($datos_get['nombre'])){
			$datos['jugador'] = $this->db_util->get('jugador',$datos_get['id_jugador']);
			$datos['siguiente_jugador'] = $this->_obtener_dato('siguiente','por_nombre',$datos_get['nombre'],$datos_get['id_jugador']);
			$datos['anterior_jugador'] = $this->_obtener_dato('anterior','por_nombre',$datos_get['nombre'],$datos_get['id_jugador']);
		}
		
		// Contexto por partido
		if(isset($datos_get['id_partido'])){
			$datos['partido'] = $this->db_util->get('partido',$datos_get['id_partido']);
			if($datos['partido']){
				if(empty($datos_get['id_jugador_partido'])){
					$datos['jugador'] = $this->db_util->get('jugador',$datos['partido']->jugador_uno);
					$datos['siguiente_jugador'] = $this->db_util->get('jugador',$datos['partido']->jugador_dos);
				}else{
					$datos['jugador'] = $this->db_util->get('jugador',$datos_get['id_jugador_partido']);

					if($datos['partido']->jugador_uno == $datos['jugador']->id){
						$datos['siguiente_jugador'] = $this->db_util->get('jugador',$datos['partido']->jugador_dos);
					}else{
						$datos['anterior_jugador'] = $this->db_util->get('jugador',$datos['partido']->jugador_uno);
					}
				}
			}
		}

		// Datos personalizados
		if($datos['jugador']){
			$datos['pais'] = $this->db_util->get('pais',$datos['jugador']->pais_nacimiento)->nombre;
			$datos['edad'] = $this->util->calcular_edad($datos['jugador']->nacimiento);
			$datos['ultimos_partidos'] = $this->jugadorModel->ultimos_partidos($datos['jugador']->id);
		}
		return $datos;
	}
	
	// Funcion para optimizar la busqueda de dato anterior|siguiente
	private function _obtener_dato($tipo,$contexto,$primerDato,$segundoDato){
		if($this->jugadorModel->obtener_jugador($tipo,$contexto,$primerDato,$segundoDato)){
			return $this->jugadorModel->obtener_jugador($tipo, $contexto,$primerDato,$segundoDato)['0'];
		}
		return array();
	}

}