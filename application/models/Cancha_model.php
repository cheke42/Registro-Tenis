<?php
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cancha_model extends CI_Model {

	function ultimos_partidos($id_cancha,$cantidad){
		$sql = 'select * from partido where partido.cancha = ' . $id_cancha . ' order by partido.fecha DESC LIMIT ' . $cantidad;
		return $this->db->query($sql)->result();
	}
	

}

