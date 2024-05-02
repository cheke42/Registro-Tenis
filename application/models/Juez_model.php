<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Juez_model extends CI_Model {

	// Devuelve juez anterior|siguiente: $tipo -> ['siguiente' | 'anterior']
	function obtener_juez($id,$tipo,$id_partido,$id_juez){
		$sql = "select * from juez_partido where partido = '" . $id_partido . "' and juez";
		if($id){
			if($tipo == 'siguiente'){
				$sql = $sql . " > " . $id_juez;
			}else{
				$sql = $sql . " < " . $id_juez . ' order by juez DESC';
			}
		}else{
			$sql = $sql . " > " . $id_juez;
		}
		return $this->db->query($sql)->result();
	}	

}