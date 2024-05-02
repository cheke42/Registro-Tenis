<?php
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Contenido_model extends CI_Model {

	// Devuelve contenido anterior|siguiente: $tipo -> ['siguiente' | 'anterior']
	function mas_contenido($tipo,$id_partido,$id_contenido){
		$sql = 'select * from contenido_partido where partido = ' . $id_partido . ' and contenido';
		if($tipo == 'siguiente'){
			$sql = $sql . ' > ' . $id_contenido;
			return $this->db->query($sql)->result();
		}else{
			$sql = $sql . ' < ' . $id_contenido . ' order by contenido desc';
			return $this->db->query($sql)->result();
		}
	}

}