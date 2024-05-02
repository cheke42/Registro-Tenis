<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Buscador extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('Jugador_model','jugadorModel');
		$this->load->model('Buscador_model','buscadorModel');
	}

	// Redirección a Home
	function index(){
		redirect(base_url(),'refresh');
	}

	// Buscador de partidos
	function partidos(){
		$datos['instancias'] = $this->db_util->get('tipo_instancia')->result();
		$this->util->template('buscador/partidos',$datos);
	}

	// Buscador de jugadores
	function jugadores(){
		$datos['paises'] = $this->db_util->get('pais')->result();
		$this->util->template('buscador/jugadores',$datos);
	}

	// Lista de jugadores buscados
	function resultado_jugadores(){
		$datos['pais'] = $this->input->get('pais');
		$datos['numero_jugador'] = $this->input->get('numero_jugador');
		$datos['nombre'] = $this->input->get('nombre');

		if(isset($datos['pais'])){
			$datos['jugadores'] = $this->db_util->get_with_array('jugador',array('pais_nacimiento' => $datos['pais']));
		}else if($datos['nombre']){
			$datos['jugadores'] = $this->jugadorModel->obtener_por_nombre($datos['nombre']);
		}else{
			redirect(base_url('jugador/detalle/?id=') . $datos['numero_jugador'],'refresh');
		}
		$this->util->template('buscador/resultados_jugadores',$datos);
	}

	// Lista de partidos buscados
	function resultado_partidos(){
		$datos['numero_jugador'] = $this->input->get('numero_jugador');
		$datos['fecha'] = $this->input->get('fecha');
		$datos['instancia'] = $this->input->get('instancia');
		if($datos['instancia']){
			$datos['partidos'] = $this->db_util->get_with_array('partido',array('instancia' => $datos['instancia']));
		}
		if($datos['numero_jugador']){
			$datos['partidos']  = $this->buscadorModel->obtener_partidos_por_jugador($datos['numero_jugador']);
		}
		if($datos['fecha']){
			$datos['partidos']  = $this->buscadorModel->obtener_partidos_por_fecha($datos['fecha']);
		}
		$this->util->template('buscador/resultados_partidos',$datos);
	}

}