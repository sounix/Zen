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

	function consulta_alias_datos ($valias,$vciclo = '1'){

		// $sql = "SELECT A.alias,A.password,CASE WHEN B.padrino IS NULL THEN 'admin' ELSE B.padrino END AS patrocinador,A.ciclo,B.paso FROM datosgenerales A LEFT JOIN ciclos B ON A.alias = B.alias AND A.ciclo = B.ciclo WHERE A.alias = '$valias' AND B.ciclo = '$vciclo'";
		$sql = "SELECT A.alias,A.password,CASE WHEN B.padrino IS NULL THEN 'admin' ELSE B.padrino END AS patrocinador,B.ciclo,B.paso FROM datosgenerales A LEFT JOIN ciclos B ON A.alias = B.alias  AND B.ciclo = '$vciclo' WHERE A.alias = '$valias' AND B.ciclo = '$vciclo'";

		$resultado = $this->db->query($sql);

		return $resultado;
	}  // Revizado

	function alias_deposito_old ($vciclo,$valias) {

		$sql = "SELECT IF(COUNT(*) = 0,( SELECT IF(padrino = 'zen01' OR padrino = 'zen02',IF(padrino = 'zen01','zen02','zen01'),'admin') FROM ciclos WHERE ciclo = '$vciclo' AND alias = '$valias' ),'admin') AS aliasdeposito FROM ciclos WHERE ciclo = '$vciclo' AND paso = '3'";

		$resultado = $this->db->query($sql);

		return $resultado;

	}  // Revizado

	function consulta_paso($valias,$vciclo) {
		$query = $this->db->query("
			SELECT 
				paso 
			FROM ciclos 
			WHERE ciclo = '$vciclo' AND alias = '$valias'
		");
		$row = $query->row_array();

		$res = $row['paso']; 

		return $res;
	}

	function muestra_cilos($valias) {
		$query = $this->db->query("
			SELECT Alias,CONCAT(MAX(C01),MAX(C02),MAX(C03),MAX(C04),MAX(C05),MAX(C06),MAX(C07)) AS CAD FROM (
				SELECT alias, '<li><a href=\"cestadociclos/1\">Ciclo I</a></li>' AS C01, CASE WHEN paso > 2 THEN '<li><a href=\"cestadociclos/2\">Ciclo II</a></li>' ELSE '' END AS C02,'' AS C03,'' AS C04,'' AS C05,'' AS C06,'' AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '1'
				UNION ALL
				SELECT alias, '' AS C01, '<li><a href=\"cestadociclos/2\">Ciclo II</a></li>' AS C02, CASE WHEN paso > 2 THEN '<li><a href=\"cestadociclos/3\">Ciclo III</a></li>' ELSE '' END AS C03,'' AS C04,'' AS C05,'' AS C06,'' AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '2'
				UNION ALL
				SELECT alias, '' AS C01,  '' AS C02, '<li><a href=\"cestadociclos/3\">Ciclo III</a></li>' AS C03, CASE WHEN paso > 2 THEN '<li><a href=\"cestadociclos/4\">Ciclo IV</a></li>' ELSE '' END AS C04,'' AS C05,'' AS C06,'' AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '3'
				UNION ALL
				SELECT alias, '' AS C01,  '' AS C02,  '' AS C03, '<li><a href=\"cestadociclos/4\">Ciclo IV</a></li>' AS C04, CASE WHEN paso > 2 THEN '<li><a href=\"cestadociclos/5\">Ciclo V</a></li>' ELSE '' END AS C05,'' AS C06,'' AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '4'
				UNION ALL
				SELECT alias, '' AS C01,  '' AS C02,  '' AS C03,  '' AS C04, '<li><a href=\"cestadociclos/5\">Ciclo V</a></li>' AS C05, CASE WHEN paso > 2 THEN '<li><a href=\"cestadociclos/6\">Ciclo VI</a></li>' ELSE '' END AS C06,'' AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '5'
				UNION ALL
				SELECT alias, '' AS C01,  '' AS C02,  '' AS C03,  '' AS C04,  '' AS C05, '<li><a href=\"cestadociclos/6\">Ciclo VI</a></li>' AS C06, CASE WHEN paso > 2 THEN '<li><a href=\"cestadociclos/7\">Ciclo VII</a></li>' ELSE '' END AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '6'
				UNION ALL
				SELECT alias, '' AS C01,  '' AS C02,  '' AS C03,  '' AS C04,  '' AS C05,  '' AS C06, '<li><a href=\"cestadociclos/7\">Ciclo VII</a></li>' AS C07 FROM Ciclos WHERE alias = '$valias' AND Ciclo = '7'
			) AS X
			GROUP BY alias
		");
		$row = $query->row_array();

		$res = $row['CAD']; 

		return $res;
	}	

	function aseguraciclo($valias,$vciclo) {
		$query = $this->db->query("
			SELECT 
				COUNT(*) AS reg
			FROM ciclos 
			WHERE ciclo = '$vciclo' AND alias = '$valias'
		");
		$row = $query->row_array();

		if($row['reg'] == '0') {
			$sql = "INSERT INTO ciclos (id,alias,ciclo,paso,fechap0) VALUES (0,'$valias','$vciclo','0',NOW())";

			$this->db->query($sql);
		}
	}

	function alias_deposito ($vciclo,$valias) {

		$tabla = $this->db->query("
			SELECT 
				IFNULL(aliasdeposito,'0') AS val 
			FROM ciclos 
			WHERE ciclo = '$vciclo' AND alias = '$valias'
		");
		$fila = $tabla->row_array();
		
		if ($fila['val'] == '0') {
				
			$query2 = $this->db->query("
				SELECT 
					padrino 
				FROM ciclos 
				WHERE ciclo = '$vciclo' AND alias = '$valias'
			");
			$row2 = $query2->row_array();

			if($row2['padrino'] == 'zen01' or $row2['padrino'] == 'zen02'){
				if($row2['padrino'] == 'zen01') { $res = 'zen02'; } else { $res = 'zen01'; }
			}
			else {

				$query3 = $this->db->query("
					SELECT 
						padrino 
					FROM ciclos 
					WHERE ciclo = '$vciclo' AND alias = '" . $row2['padrino'] ."'
				");
				$row3 = $query3->row_array();

				$res = $row3['padrino']; 
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

	function msg_foliodeposito ($valias,$vciclo) {
		$query2 = $this->db->query("
			SELECT
  				IF(foliodeposito IS NULL,CONCAT('<div class=\"info\"> Registre el folio de la ficha de deposito para Alias <strong>', aliasdeposito ,'</strong></div>'),CONCAT('<div class=\"exito\">Su deposito con Folio ', foliodeposito ,' para Alias <strong>', aliasdeposito ,'</strong> ya fue Registrado</div>')) AS msg
			FROM ciclos
			WHERE ciclo = '$vciclo' AND alias = '$valias'");
		$row2 = $query2->row_array();

		$res = $row2['msg']; 
		
		return $res;
	}

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

	function verificar_patrocinador ($vpatrocinador,$vciclo) {

		$query_existe = $this->db->query("
			SELECT
			  COUNT(*) AS reg
			FROM ciclos
			WHERE alias = '$vpatrocinador' AND ciclo = '$vciclo'
		");
		$row_existe = $query_existe->row_array();

		if($row_existe['reg'] == 0) {
			$resultado = '91';
		}
		else {
			if($vpatrocinador == 'zen01' or $vpatrocinador == 'zen02') {
				$resultado = '0';
			}
			else {
				$query_paso = $this->db->query("
					SELECT
					  COUNT(*) AS reg
					FROM ciclos
					WHERE alias = '$vpatrocinador' AND ciclo = '$vciclo' AND paso = '3'
				");
				$row_paso = $query_paso->row_array();

				if($row_paso['reg'] == 0) { $resultado = '92'; } else { $resultado = '0'; }
			}
		}

		return $resultado;

	}

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