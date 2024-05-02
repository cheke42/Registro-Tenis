<?php
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscador_model extends CI_Model {

	// Obtener los partidos donde estuvo el jugador
	function obtener_partidos_por_jugador($id_jugador){
		$sql = "select * from partido where partido.jugador_uno = " . $id_jugador . " or partido.jugador_dos = " . $id_jugador . ' order by fecha desc';
		return $this->db->query($sql)->result();
	}

	// Obtener los partidos de una fecha
	function obtener_partidos_por_fecha($fecha){
		$sql = "select * from partido where fecha like '%" . $fecha . "%'";
		return $this->db->query($sql)->result();
	}	

}