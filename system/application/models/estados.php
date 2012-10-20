<?php

class Estados extends Model {

	function Estados() {
		parent::Model();
	}

	function consulta_estados(){

		$sql = "SELECT codigoestado,estado FROM municipios GROUP BY codigoestado,estado ORDER BY Estado";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function consulta_datosmunicipio($vcodigoestado){

		$sql = "SELECT codigomunicipio,municipio FROM municipios WHERE codigoestado = '$vcodigoestado' ORDER BY municipio";

		$resultado = $this->db->query($sql);

		return $resultado;
	}


}