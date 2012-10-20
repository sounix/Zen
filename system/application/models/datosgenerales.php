<?php

class DatosGenerales extends Model {

	function DatosGenerales() {
		parent::Model();
	}

	function insertar_datos($valias,$vemail,$vnombres,$vapellidos,$vmunicipio,$vestado,$vpassword){

		$sql = "INSERT INTO datosgenerales (alias,email,nombres,apellidos,municipio,estado,password,ciclo,fecha) VALUES ('$valias','$vemail','$vnombres','$vapellidos','$vmunicipio','$vestado',MD5('$vpassword'),'1',NOW())";

		$this->db->query($sql);
	} // Revizado

	function insertar_ciclo($valias,$vciclo = '1'){

		$sql = "INSERT INTO ciclos (id,alias,ciclo,paso,fechap0) VALUES (0,'$valias','$vciclo','0',NOW())";

		$this->db->query($sql);
	} // Revizado	

	function modificar_datos($valias,$vnombres,$vapellidos,$vmunicipio,$vestado) {
		
		$sql = "UPDATE datosgenerales SET email = '$vemail', nombres = '$vnombres', apellidos = '$vapellidos', municipio = '$vmunicipio', estado = '$vestado' WHERE alias = '$valias'";

		$this->db->query($sql);	
	}

	function eliminar_datos($valias){

		$sql = "DELETE FROM datosgenerales WHERE alias = '$valias'";

		$this->db->query($sql);
	}

	function consulta_alias_datos_all($valias){

		$sql = "SELECT A.alias,B.password,A.email,A.nombres,A.apellidos,C.codigoestado,C.estado,C.codigomunicipio,C.municipio,D.telefono,D.compania,D.tipo,E.cuenta,E.clabe,E.banco FROM datosgenerales A LEFT JOIN usuarios B ON B.alias = A.alias LEFT JOIN municipios C ON C.codigoestado = A.estado AND C.codigomunicipio = A.municipio LEFT JOIN agendatelefonica D ON D.alias = A.alias LEFT JOIN cuentasbancarias E ON E.alias = A.alias WHERE A.alias = '$valias'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function consulta_alias_datos($valias){

		$sql = "SELECT alias,email,nombres,apellidos,municipio,estado FROM datosgenerales WHERE alias = '$valias'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function consulta_nombres_datos($vnombres){

		$sql = "SELECT alias,email,nombres,apellidos,municipio,estado FROM datosgenerales WHERE CONCAT(nombres,' ',apellidos) LIKE ('%$vnombres%')";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function lista_datos(){

		$sql = "SELECT alias,email,nombres,apellidos,municipio,estado FROM datosgenerales";

		$resultado = $this->db->query($sql);

		return $resultado;
	}


}