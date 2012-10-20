<?php

class CuentasBancarias extends Model {

	function CuentasBancarias() {
		parent::Model();
	}

	function insertar_datos($valias,$vcuenta,$vbanco,$vclabe){

		$sql = "INSERT INTO cuentasbancarias (alias,cuenta,banco,clabe) VALUES ('$valias','$vcuenta','$vbanco','$vclabe')";
		//echo $sql;
		$this->db->query($sql);
	}

	function modificar_datos($vcuenta,$vbanco,$vclabe) {
		
		$sql = "UPDATE cuentasbancarias SET cuenta = '$vcuenta', banco = '$vbanco, clabe = '$vclabe' WHERE alias = '$valias'";

		$this->db->query($sql);	
	}

	function eliminar_datos($valias){

		$sql = "DELETE FROM cuentasbancarias WHERE alias = '$valias'";

		$this->db->query($sql);
	}

	function eliminar_datoscuenta($valias,$vcuenta){

		$sql = "DELETE FROM cuentasbancarias WHERE alias = '$valias' AND banco = '$vbanco'";

		$this->db->query($sql);
	}

	function consulta_alias_datos($valias){

		$sql = "SELECT alias,cuenta,banco,clabe FROM cuentasbancarias WHERE alias = '$valias'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function consulta_aliasbanco_datos($valias,$vbanco){

		$sql = "SELECT alias,cuenta,banco,clabe FROM cuentasbancarias WHERE alias = '$valias' AND banco = $vbanco";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function lista_datos(){

		$sql = "SELECT alias,cuenta,banco,clabe FROM cuentasbancarias";

		$resultado = $this->db->query($sql);

		return $resultado;
	}


}
