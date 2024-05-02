<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	Alumno: Suazo Leonardo Ezequiel
	Materia: Diseño de Aplicaciones Web
	Año: 2017
 */
class Jugador_model extends CI_Model {

	// Obtener jugadores a partir de un texto
	function obtener_por_nombre($nombre){
		$sql = "select * from jugador where (apellido like '%" . $nombre . "%') or (nombre like '%" . $nombre . "%');";
		return $this->db->query($sql)->result();
	}

	// Obtener anterior|siguiente jugador
	function obtener_jugador($tipo,$contexto,$primerDato,$segundoDato){
		$sql = 'select * from jugador where ';
		switch ($contexto) {
			case 'por_nacionalidad':
				$sql = $sql . 'jugador.pais_nacimiento = "' . $primerDato . '" and jugador.id';
				if($tipo == 'siguiente'){
					$sql = $sql . ' > ' . $segundoDato;
				}else{
					$sql = $sql . ' < ' . $segundoDato . ' order by id desc';
				}
				break;
			case 'por_nombre':
				$sql = $sql . "((apellido like '%" . $primerDato . "%') or (nombre like '%" . $primerDato . "%')) and jugador.id";
				if($tipo == 'siguiente'){
					$sql = $sql . " > " . $segundoDato;
				}else{
					$sql = $sql . " < " . $segundoDato . " order by id DESC";
				}
				break;
		}
		return $this->db->query($sql)->result();
	}

	// Obtener ultimos N partidos de un jugador
	function ultimos_partidos($id_jugador){
		$sql = 'select * from partido where partido.jugador_uno = ' . $id_jugador . ' or partido.jugador_dos = ' . $id_jugador . ' order by fecha DESC LIMIT 5';
		return $this->db->query($sql)->result();
	}	

}