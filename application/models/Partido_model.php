<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Partido_model extends CI_Model {

	// Obtener partido anterior|siguiente 
	function obtener_partido($tipo,$contexto,$datoUno,$datoDos){
		$sql = "select * from partido where ";
		if($contexto == 'fecha'){
			$sql = $sql . "cast(partido.fecha as DATE) like '" . $datoUno .  "' and partido.id";
			if($tipo == 'siguiente'){
				$sql = $sql . " > " . $datoDos; 
			}else{
				$sql = $sql . " < " . $datoDos . ' order by id DESC';
			}
		}else if($contexto == 'instancia'){
			$sql = $sql . "instancia = '" . $datoUno .  "' and partido.id";
			if($tipo == 'siguiente'){
				$sql = $sql . " > " . $datoDos; 
			}else{
				$sql = $sql . " < " . $datoDos . ' order by id DESC'; 
			}
		}else{
			$sql = $sql . "(partido.jugador_uno = " . $datoUno . " or partido.jugador_dos = " . $datoUno . ") and partido.id";
			if($tipo == 'siguiente'){
				$sql = $sql . " > " . $datoDos ." order by id ASC "; 
			}else{
				$sql = $sql . " < " . $datoDos ." order by id DESC "; 
			}
		}
		return $this->db->query($sql)->result();
	}	

}
