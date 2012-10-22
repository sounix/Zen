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
			// pendiente por revizar
			$query = $this->db->query("SELECT COUNT(*) AS reg FROM candidatos WHERE ciclo = '$vciclo' AND nivel >= '16'");
			$row = $query->row_array();

			if ($row['reg'] == 0) {
				
				$query2 = $this->db->query("SELECT padrino FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias'");
				$row2 = $query2->row_array();

				if($row2['padrino'] == 'zen01' or $row2['padrino'] == 'zen02'){
					if($row2['padrino'] == 'zen01') { $res = 'zen02'; } else { $res = 'zen01'; }
				}
				else {

					$query3 = $this->db->query("SELECT Padrino, SUM(PL) AS PL, SUM(PR) AS PR FROM ( SELECT 'Padrino' AS Padrino, COUNT(*) AS PL, 0 AS PR FROM ciclos WHERE aliasdeposito = 'zen01' AND autorizacion IS NULL UNION ALL SELECT 'Padrino' AS Padrino, 0 AS PL, COUNT(*) AS PR FROM ciclos WHERE aliasdeposito = 'zen02' AND autorizacion IS NULL ) AS A GROUP BY Padrino");
					$row3 = $query3->row_array();

					if($row3['PL'] <= $row3['PR']) { $res = 'zen01'; } else { $res = 'zen02'; }
				}
			}
			else {
				$query4 = $this->db->query("
					SELECT
					  C.alias,
					  CAST(CC.fechap0 AS SIGNED) + CAST(CC.fechap1 AS SIGNED) + CAST(CC.fechap2 AS SIGNED) + CAST(CC.fechap3 AS SIGNED) AS fecha,
					  IFNULL(CC.numpagos,0) AS pagos
					FROM candidatos C
					LEFT JOIN ciclos CC ON CC.alias = C.alias AND CC.ciclo = '1'
					WHERE C.ciclo = '1' AND C.nivel = '16'
					  AND IFNULL(CC.numpagos,0) < '4'
					ORDER BY pagos
					LIMIT 0,1
				");
				$row4 = $query4->row_array();
				$res = $row4['alias'];
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

	function mostrar_foliodeposito ($valias,$vciclo) {
		$query2 = $this->db->query("SELECT IFNULL(foliodeposito,'0') AS folio FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias'");
		$row2 = $query2->row_array();

		if($row2['folio'] == '0') { 
			$res = '<input type="text" value="" name="folio" placeholder="Ingresa folio">'; 
		} 
		else { 
			$res = '<input type="text" disabled value="'. $row2['folio'] .'" name="folio" placeholder="Ingresa folio">	'; 
		}

		return $res;
	}  // Revizado

	function msg_autorizacion ($valias,$vciclo) {
		$query2 = $this->db->query("SELECT CASE WHEN paso >= '2' THEN IF(autorizacion IS NULL,CONCAT('<div class=\"alerta\">Su deposito con Folio ',foliodeposito,' para Alias <strong>', aliasdeposito ,'</strong> aun no esta Confirmado</div>'),CONCAT('<div class=\"info\">Su deposito con Folio ', foliodeposito ,' para Alias <strong>', aliasdeposito ,'</strong> ya fue Confirmado</div>')) ELSE '' END AS msg FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias'");
		$row2 = $query2->row_array();

		$res = $row2['msg']; 
		
		return $res;

	}  // Revizado

	function lista_autorizaciones ($valias,$vciclo) {

		if($valias == 'zen01' or $valias == 'zen02') {
			$sql = "SELECT id,alias AS aliasdepositario,foliodeposito,ciclo AS ciclodeposito,IF(autorizacion = '1',CONCAT('<div class=\"exito\"> Deposito de alias: <strong>',alias,'</strong> con folio: ',foliodeposito,' del ciclo: ',ciclo,'</div>'),CONCAT('<div class=\"info\"> Autorizar deposito de alias: <strong>',alias,'</strong> con folio: ',foliodeposito,' del ciclo: ',ciclo,' - <strong><a href=\"autorizar/',id,'\">CLICK</a></strong></div>')) AS msg FROM ciclos WHERE aliasdeposito = '$valias' AND NOT foliodeposito IS NULL ORDER BY ciclo,fechap2";
		}
		else {
			$sql = "SELECT id,alias AS aliasdepositario,foliodeposito,ciclo,IF(autorizacion = '1',CONCAT('<div class=\"exito\"> Deposito de alias: <strong>',alias,'</strong> con folio: ',foliodeposito,' del ciclo: ',ciclo,'</div>'),CONCAT('<div class=\"info\"> Autorizar deposito de alias: <strong>',alias,'</strong> con folio: ',foliodeposito,' del ciclo: ',ciclo,' - <strong><a href=\"autorizar/',id,'\">CLICK</a></strong></div>')) AS msg FROM ciclos WHERE aliasdeposito = '$valias' AND ciclo = '$vciclo' AND NOT foliodeposito IS NULL ORDER BY fechap2 ASC";
		}

		$resultado = $this->db->query($sql);

		return $resultado;

	}

	function lista_datos(){

		$sql = "SELECT alias,password,patrocinador,fecharegistro FROM usuarios";

		$resultado = $this->db->query($sql);

		return $resultado;
	}

	function modificar_patrocinador($valias,$vpatrocinador,$vciclo) {
		
		$sql = "UPDATE ciclos SET padrino = '$vpatrocinador', fechap1 = NOW(), paso = '1' WHERE alias = '$valias' AND ciclo = '$vciclo'";

		$this->db->query($sql);	
	}  // Revizado

	function modificar_foliodeposito($valias,$vciclo,$vfolio) {
		
		$sql = "UPDATE ciclos SET foliodeposito = '$vfolio', fechap2 = NOW(), paso = '2' WHERE alias = '$valias' AND ciclo = '$vciclo'";

		$this->db->query($sql);	

	}  // Revizado

	function autorizar_foliodeposito($vid) {

		$sql = "UPDATE ciclos SET paso = '3', autorizacion = '1', fechap3 = NOW() WHERE id = '$vid'";

		$this->db->query($sql);	

		$query2 = $this->db->query("SELECT ciclo,aliasdeposito FROM ciclos WHERE id = '$vid'");
		$row2 = $query2->row_array();

		$sql = "UPDATE ciclos SET numpagos = IFNULL(numpagos,0) + 1 WHERE ciclo = '". $row2['ciclo'] . "' AND alias = '". $row2['aliasdeposito'] . "'";

		$this->db->query($sql);			

	}
}