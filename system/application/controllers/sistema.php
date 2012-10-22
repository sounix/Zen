<?php

class Sistema extends Controller {
	
	function Sistema() {
		parent::Controller();
	}

	// Inicio Funciones Paginas Estaticas

	function index() {
		$temp = array();

		$datos = array(
			'plantilla_titulo'     => 'Inicio - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/principal', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function contactos() {
		$temp = array();

		$datos = array(
			'plantilla_titulo'     => 'Contactos - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/contactos', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function mision() {
		$temp  = array();
		
		$datos = array(
			'plantilla_titulo'     => 'Mision - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/mision', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function nsistema() {
		$temp = array();

		$datos = array(
			'plantilla_titulo' => 'Nuestro Sistema - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/nsistema', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function legal() {
		$temp = array();

		$datos = array(
			'plantilla_titulo' => '¿Es legal el sistema? - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/legal', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function inversion() {
		$temp = array();

		$datos = array(
			'plantilla_titulo' => '¿Cual es la inversion? - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/inversion', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function fin() {
		$temp = array();

		$datos = array(
			'plantilla_titulo' => '¿Cual es el fin del sistema? - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/fin', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function riesgos() {
		$temp = array();

		$datos = array(
			'plantilla_titulo' => '¿Que riesgos hay en el sistema? - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/riesgos', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	function ciclos() {
		$temp = array();

		$datos = array(
			'plantilla_titulo' => 'Ciclos - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/ciclos', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE)
		);

		$this->parser->parse('plantillas/index', $datos);
	}

	// Fin Funciones Paginas Estaticas

	// Inicio Registro y Login

	function registro() {

		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] == TRUE) {
			redirect('/sistema/cuentausuario','refresh');
		}

		$arreglo = $this->Estados->consulta_estados();

		$datos = array(
			'plantilla_titulo'     => 'Registro de Usuarios - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/registro', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE),
			
			'lista_estados'     => $arreglo->result_array()
		);

		$this->parser->parse('plantillas/index', $datos);
	} // Revizado

	function lmunicipios($value = '30') {

		$arreglo = $this->Estados->consulta_datosmunicipio($value);

    	foreach ($arreglo->result() as $row) {
		    echo '<option value="'.$row->codigomunicipio.'">'.$row->municipio.'</option>';
		}
	} // Revizado

	function registrousuarios() {

		$this->DatosGenerales->insertar_datos($this->input->post('alias'),$this->input->post('email'),$this->input->post('nombres'),$this->input->post('apellidos'),$this->input->post('municipio'),$this->input->post('estado'),$this->input->post('password'));
		$this->AgendaTelefonica->insertar_datos($this->input->post('alias'),$this->input->post('telefono'),$this->input->post('compania'),$this->input->post('tipo'));		
		$this->CuentasBancarias->insertar_datos($this->input->post('alias'),$this->input->post('cuenta'),$this->input->post('banco'),$this->input->post('clabe'));
		$this->DatosGenerales->insertar_ciclo($this->input->post('alias'));
		redirect('/sistema/login','refresh');

	} // Revizado

	function login($verror = '') {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] == TRUE) {
			redirect('/sistema/cuentausuario','refresh');
		}

		$datos = array(
			'plantilla_titulo' => 'Login de Usuarios - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/login', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE),

			'error' => $verror
		);

		$this->parser->parse('plantillas/index', $datos);
	} // Revizado

	function validarlogin() {

		if($this->input->post('alias')) {

			$rules = array(
				array('field' =>'alias','label'=>'alias','rules'=>'required'),
				array('field' =>'password','label'=>'password','rules'=>'required')
			);
		    
			$this->form_validation->set_rules($rules);

			if($this->form_validation->run() == FALSE) {
				$temp = array();

				$datos = array(
					'plantilla_titulo' => 'Login de Usuarios - www.riquezaparatodos.org',
					'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/login', $temp,TRUE),
					'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE),

					'error' => 'Alias o Contraseña Invalido'
				);

				$this->parser->parse('plantillas/index', $datos);
			}
			else {
				$arreglo = $this->Usuarios->consulta_alias_datos($this->input->post('alias'));
				if($arreglo->num_rows() > 0) {
					$row = $arreglo->row_array();
					if(MD5($this->input->post('password')) == $row['password']) {
						$generales       = $this->DatosGenerales->consulta_alias_datos($this->input->post('alias'));
						$row2            = $generales->row_array();
						$session_array   = array(
							'alias'          => $row['alias'],
							'nombrecompleto' => $row2['nombres'] . ' ' . $row2['apellidos'],
							'patrocinador'   => $row['patrocinador'],
							'ciclo'			 => $row['ciclo'],
							
							'session_ok'     => TRUE
						);
						
						$this->session->set_userdata('session_array',$session_array);
						redirect('sistema/cuentausuario','refresh');
					}
					else {
						$temp = array();
						
						$datos = array(
							'plantilla_titulo'     => 'Login de Usuarios - www.riquezaparatodos.org',
							'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/login', $temp,TRUE),
							'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE),
							
							'error'                => 'Contraseña Invalido'
						);
						
						$this->parser->parse('plantillas/index', $datos);
					}
				}
				else { 
					$temp = array();

					$datos = array(
						'plantilla_titulo' => 'Login de Usuarios - www.riquezaparatodos.org',
						'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/login', $temp,TRUE),
						'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE),

						'error' => 'Alias o Contraseña Invalido'
					);

					$this->parser->parse('plantillas/index', $datos);
				}
			}
		}
		else {
			$temp = array();

			$datos = array(
				'plantilla_titulo' => 'Login de Usuarios - www.riquezaparatodos.org',
				'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/login', $temp,TRUE),
				'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menu', $temp,TRUE),

				'error' => 'Ingrese Datos a Validar'
			);

			$this->parser->parse('plantillas/index', $datos);
		}
		
	}  // Revizado

	function salir() {

		$this->session->unset_userdata('session_array');

		redirect('/sistema/login','refresh');

	}  // Revizado

	// Fin Registro y Login

	// Inicio Aplicacion Usuario

	function cuentausuario() {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}
		
		$datos = array(
			'plantilla_titulo' => 'Cuenta de Usuario - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/cuentausuario', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menuservicios', $temp,TRUE),
			'nombrecompleto' => $session_data['nombrecompleto'],
			'alias' => $session_data['alias'],
			'ciclo' => $session_data['ciclo'],
			
			'tiempohumano' => date('d \d\e F \d\e Y'),
 			'tiempo' => date('Y-m-d')
		);

		$this->parser->parse('plantillas/index', $datos);
				
	}   // Revizado

	function patrocinador() {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		if($session_data['patrocinador'] == 'admin' ) { 
			//$patrocinador = ''; 
			$patrocinador = '<input type="text" value="" name="patrocinador" id="patrocinador" class="required" minlength="2"/>';
			$msg = '<div class="alerta"> Debera resgistrar un Padrino </div>';
		} 
		else { 
			//$patrocinador = $session_data['patrocinador'];
			$patrocinador = '<input type="text" disabled value="' . $session_data['patrocinador'] . '" name="patrocinador" id="patrocinador" class="required" minlength="2"/>';
			$msg = '<div class="exito"> Padrino registrado con exito </div>';
		}

		$datos = array(
			'plantilla_titulo' => 'Cuenta de Usuario - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/patrocinador', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menuservicios', $temp,TRUE),
			'nombrecompleto' => $session_data['nombrecompleto'],
			'alias' => $session_data['alias'],
			'tiempohumano' => date('d \d\e F \d\e Y'),
 			'tiempo' => date('Y-m-d'),
			'patrocinador' => $patrocinador,
			'msg' => $msg,
			'ciclo' => $session_data['ciclo']
		);

		$this->parser->parse('plantillas/index', $datos);
				
	}   // Revizado

	function cambiarpatrocinador() {

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		$this->Usuarios->modificar_patrocinador($this->input->post('alias'),$this->input->post('patrocinador'),$this->input->post('ciclo'));

		$session_array = array(
			'alias' => $session_data['alias'],
			'nombrecompleto' => $session_data['nombrecompleto'],
			'patrocinador' => $this->input->post('patrocinador'),
			'ciclo'			 => $session_data['ciclo'],
			
			'session_ok' => $session_data['session_ok']
		);

		$this->session->unset_userdata('session_array');

		$this->session->set_userdata('session_array',$session_array);

		redirect('/sistema/patrocinador','refresh');

	}  // Revizado

	function editarregistro() {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}
		
		$arreglo = $this->DatosGenerales->consulta_alias_datos_all($session_data['alias']);

		$datos = array(
			'plantilla_titulo' => 'Cuenta de Usuario - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/editarregistro', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menuservicios', $temp,TRUE),
			'nombrecompleto' => $session_data['nombrecompleto'],
			'alias' => $session_data['alias'],
			'tiempohumano' => date('d \d\e F \d\e Y'),
 			'tiempo' => date('Y-m-d'),

 			'datosgenerales' => $arreglo->result_array()
		);

		$this->parser->parse('plantillas/index', $datos);
				
	}

	function depositos() {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		$folio = $this->Usuarios->mostrar_foliodeposito($session_data['alias'],$session_data['ciclo']);		

		$arreglo = $this->Usuarios->alias_deposito($session_data['ciclo'],$session_data['alias']);
		$datos = $this->Usuarios->datos_deposito($arreglo,$session_data['ciclo']);
		
		$datos = array(
			'plantilla_titulo' => 'Cuenta de Usuario - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/depositos', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menuservicios', $temp,TRUE),
			'nombrecompleto' => $session_data['nombrecompleto'],
			'alias' => $session_data['alias'],
			'ciclo' => $session_data['ciclo'],
			'tiempohumano' => date('d \d\e F \d\e Y'),
 			'tiempo' => date('Y-m-d'),
 			'folio' => $folio,

 			'vdatos' => $datos->result_array()
		);

		$this->parser->parse('plantillas/index', $datos);
				
	}  // Revizado

	function foliodeposito () {

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		$this->Usuarios->modificar_foliodeposito($session_data['alias'],$session_data['ciclo'],$this->input->post('folio'));

		redirect('/sistema/depositos','refresh');

	}   // Revizado

	function autorizacion() {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		$msg = $this->Usuarios->msg_autorizacion($session_data['alias'],$session_data['ciclo']);	
		
		$datos = array(
			'plantilla_titulo' => 'Cuenta de Usuario - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/autorizacion', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menuservicios', $temp,TRUE),
			'nombrecompleto' => $session_data['nombrecompleto'],
			'alias' => $session_data['alias'],
			'ciclo' => $session_data['ciclo'],
			'msg' => $msg,
			
			'tiempohumano' => date('d \d\e F \d\e Y'),
 			'tiempo' => date('Y-m-d')
		);

		$this->parser->parse('plantillas/index', $datos);
				
	}   // Revizado

	function pagos() {
		$temp = array();

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		$lista_autorizaciones = $this->Usuarios->lista_autorizaciones($session_data['alias'],$session_data['ciclo']);	
		
		$datos = array(
			'plantilla_titulo' => 'Cuenta de Usuario - www.riquezaparatodos.org',
			'plantilla_cuerpo_izq' => $this->parser->parse('plantillas/pagos', $temp,TRUE),
			'plantilla_cuerpo_der' => $this->parser->parse('plantillas/menuservicios', $temp,TRUE),
			'nombrecompleto' => $session_data['nombrecompleto'],
			'alias' => $session_data['alias'],
			'ciclo' => $session_data['ciclo'],
			'lista_autorizaciones' => $lista_autorizaciones->result_array(),
			
			'tiempohumano' => date('d \d\e F \d\e Y'),
 			'tiempo' => date('Y-m-d')
		);

		$this->parser->parse('plantillas/index', $datos);
				
	}   // Revizado

	function autorizar ($vid) {

		$session_data = $this->session->userdata('session_array');
		if($session_data['session_ok'] != TRUE) {
			redirect('/sistema/login','refresh');
		}

		$this->Usuarios->autorizar_foliodeposito($vid);

		redirect('/sistema/pagos','refresh');

	}   // Revizado

	// Fin Aplicacion Usuario

}