<?php

class AgendaTelefonica extends Model {

	function AgendaTelefonica() {
		parent::Model();
	}

	function insertar_datos($valias,$vtelefono,$vcompania,$vtipo){

		$sql = "INSERT INTO agendatelefonica (alias,telefono,compania,tipo) VALUES ('$valias','$vtelefono','$vcompania','$vtipo')";

		$this->db->query($sql);
	}

	function modificar_datos($valias,$vtelefono,$vcompania,$vtipo) {
		
		$sql = "UPDATE agendatelefonica SET compania = '$vcompania', tipo = '$vtipo' WHERE alias = '$valias' AND telefono = '$vtelefono'";

		$this->db->query($sql);	
	}

	function eliminar_datos($valias,$vtelefono){

		$sql = "DELETE FROM agendatelefonica WHERE alias = '$valias' AND telefono = '$vtelefono'";

		$this->db->query($sql);
	}

	function consulta_alias_datos($valias){

		$sql = "SELECT alias,telefono,compania,tipo FROM agendatelefonica WHERE alias = '$valias'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}


	function consulta_aliastelefono_datos($valias,$vtelefono){

		$sql = "SELECT alias,telefono,compania,tipo FROM agendatelefonica WHERE alias = '$valias' AND telefono = '$vtelefono'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

}