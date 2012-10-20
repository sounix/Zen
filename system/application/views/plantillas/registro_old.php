	<div class="bloques">

		<div id="formulario_registro">
			<form id="formregistro" class="jqtransform" name="jqtransform" action="<?=site_url('sistema/registrousuarios')?>" method="post">
			<h2 class="titulotres">Datos Generales</h2>
				<div class="rowElem">
					<label for="alias">Alias:</label><input type="text" name="alias" id="alias" class="required" minlength="2"/>
				</div>
				<div class="rowElem">
					<label for="password">Contraseña:</label><input type="password" name="password" id="password" class="required" minlength="2"/>
				</div>

			<br><br>

				<div class="rowElem">
					<label for="nombres">Nombres:</label><input type="text" name="nombres">	
				</div>
				<div class="rowElem">
					<label for="apellidos">Apellidos:</label><input type="text" name="apellidos">	
				</div>							
				<div class="rowElem">
					<label for="estado">Estado:</label>	
					<select name="estado">
						<option value="" selected="selected"> -- SELECCIONE ESTADO -- </option>
						<option value="30">VERACURZ DE IGNACION DE LA LLAVE</option>
					</select>
				</div>
				<div class="rowElem">
					<label for="municipio">Municipio:</label>
					<select name="municipio">
						<option value="" selected="selected"> -- SELECCIONE MUNICIPIO -- </option>
						{lista_municipios}
							<option value="{codigomunicipio}">{municipio}</option>
						{/lista_municipios}
					</select>
				</div>

			<br><br>
			<h2 class="titulotres">Telefono</h2>
				<div class="rowElem">
					<label for="telefono">No Telefono:</label><input type="text" name="telefono">	
				</div>							
				<div class="rowElem">
					<label for="compania">Compañia:</label>	
					<select name="compania">
						<option value="" selected="selected"> -- SELECCIONE COMPAÑIA -- </option>
						<option value="TELCEL">TELCEL</option>
						<option value="MOVISTAR">MOVISTAR</option>
						<option value="UNEFON">UNEFON</option>
						<option value="NEXTEL">NEXTEL</option>
						<option value="IUSACELL">IUSACELL</option>
						<option value="TELMEX">TELMEX</option>
					</select>
				</div>
				<div class="rowElem">
					<label for="tipo">Tipo:</label>
					<select name="tipo">
						<option value="" selected="selected"> -- SELECCIONE TIPO -- </option>
						<option value="CASA">CASA</option>
						<option value="TRABAJO">TRABAJO</option>
						<option value="PERSONAL">PERSONAL</option>
					</select>
				</div>

			<br><br>
			<h2 class="titulotres">Datos Bancarios</h2>
				<div class="rowElem">
					<label for="cuenta">No Cuenta:</label><input type="text" name="cuenta">	
				</div>
				<div class="rowElem">
					<label for="clabe">Clabe Interbancaria:</label><input type="text" name="clabe">	
				</div>							
				<div class="rowElem">
					<label for="banco">Banco:</label>	
					<select name="banco">
						<option value="" selected="selected"> -- SELECCIONE BANCO -- </option>
						<option value="BANCOMER">BANCOMER</option>
						<option value="BANAMEX">BANAMEX</option>
						<option value="SANTANDER">SANTANDER</option>
						<option value="SCOTIA BANK">SCOTIA BANK</option>
						<option value="BANCO AZTECA">BANCO AZTECA</option>
						<option value="BANCOPPEL">BANCOPPEL</option>
					</select>
				</div>

			<br><br>
				<div class="rowElem"><label for=""></label><input type="submit" value=" Enviar " /></div>
			</form>
			<div id="ajax_loader"><img id="loader_gif" src="<?=base_url('images/loader.gif')?>" style=" display:none;"/></div>
			</br></br>
		</div>

		<script type="text/javascript">

			$(document).ready(function() {

				// Esquinas redondeadas
					$('.rounded').corners('transparent');

				// Transformar el formulario
					$("form.jqtransform").jqTransform();

				// Poner el focus al formulario
				$("form:not(.filter) :input:visible:enabled:first").focus();

				$("div#ajax_loader").html("Aqui va algo");

			});
		</script>

	</div>