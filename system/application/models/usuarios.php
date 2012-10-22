<?php

class Usuarios extends Model {

	function Usuarios() {
		parent::Model();
	}

	function insertar_datos($valias,$vpassword){

		$sql = "INSERT INTO usuarios (alias,password,patrocinador,fecharegistro) VALUES ('$valias',MD5('$vpassword'),'admin',NOW())";

		$this->db->query($sql);
	}

	function modificar_datos($valias,$vpassword,$vpatrocinador,$vfecharegistro) {
		
		$sql = "UPDATE usuarios SET password = '$vpassword', patrocinador = '$vpatrocinador, fecharegistro = '$vfecharegistro' WHERE alias = '$valias'";

		$this->db->query($sql);	
	}

	function eliminar_datos($valias){

		$sql = "DELETE FROM usuarios WHERE alias = '$valias'";

		$this->db->query($sql);
	}

	function consulta_alias_datos ($valias){

		$sql = "SELECT A.alias,A.password,CASE WHEN B.padrino IS NULL THEN 'admin' ELSE B.padrino END AS patrocinador,A.ciclo FROM datosgenerales A LEFT JOIN ciclos B ON A.alias = B.alias AND A.ciclo = B.ciclo WHERE A.alias = '$valias'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}  // Revizado

	function alias_deposito_old ($vciclo,$valias) {

		$sql = "SELECT IF(COUNT(*) = 0,( SELECT IF(padrino = 'zen01' OR padrino = 'zen02',IF(padrino = 'zen01','zen02','zen01'),'admin') FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias' ),'admin') AS aliasdeposito FROM ciclos WHERE ciclo = '$vciclo' AND paso = '3'";

		$resultado = $this->db->query($sql);

		return $resultado;

	}  // Revizado

	function alias_deposito ($vciclo,$valias) {

		$tabla = $this->db->query("SELECT IFNULL(aliasdeposito,'0') AS val FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias'");
		$fila = $tabla->row_array();
		
		if ($fila['val'] == '0') {

			$query = $this->db->query("SELECT COUNT(*) AS reg FROM ciclos WHERE ciclo = '$vciclo' AND paso = '3'");
			$row = $query->row_array();

			if ($row['reg'] == 0) {

				$query2 = $this->db->query("SELECT padrino FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias'");
				$row2 = $query2->row_array();

				if($row2['padrino'] == 'zen01' or $row2['padrino'] == 'zen02'){
					if($row2['padrino'] == 'zen01') { $res = 'zen02'; } else { $res = 'zen01'; }
				}
				else {
					$res = 'admin';
				}
			}
			else {
				$res = 'admin';
			}

			$this->db->query("UPDATE ciclos SET aliasdeposito = '$res' WHERE ciclo = '$vciclo' AND alias = '$valias'");

		}
		else {

			$res = $fila['val'];
		}
		
		return $res;
	}

	function datos_deposito ($valias,$vciclo) {

		$sql = "SELECT A.alias AS valias,A.email AS vemail, B.compania AS vcompania, B.telefono AS vtelefono, C.cuenta AS vcuenta, C.clabe AS vclabe, C.banco AS vbanco, D.monto AS vmonto FROM datosgenerales A LEFT JOIN agendatelefonica B ON B.alias = A.alias LEFT JOIN cuentasbancarias C ON C.alias = A.alias LEFT JOIN ciclospagos D ON D.ciclo = '$vciclo' WHERE A.alias = '$valias'";

		$resultado = $this->db->query($sql);

		return $resultado;

	}  // Revizado

	function lista_datos(){

		$sql = "SELECT alias,password,patrocinador,fecharegistro FROM usuarios";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function modificar_patrocinador($valias,$vpatrocinador,$vciclo) {
		
		$sql = "UPDATE ciclos SET padrino = '$vpatrocinador', fechap1 = NOW(), paso = '1' WHERE alias = '$valias' AND ciclo = '$vciclo'";

		$this->db->query($sql);	
	}  // Revizado

}