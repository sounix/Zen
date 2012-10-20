	<div class="bloques">

		<h2>Editar Cuenta</h2>
		<div class="meta">
			<span class="alias">{nombrecompleto}</span>
			<span class="otro">{alias}</span>
			<!--<span class="otro"><time datetime="{tiempo}">Hoy es {tiempohumano}</time>-->
		</div>

		<div id="formulario_registro">
			<form id="formregistro" class="jqtransform zenform" name="jqtransform" action="<?=site_url('sistema/modificareditarregistro')?>" method="post">
			{datosgenerales}
				<div class="rowElem">
					<label for="alias">Alias:</label><input type="text" value="{alias}" disabled  name="alias" id="alias" class="required" minlength="2"/>
				</div>
				<div class="rowElem">
					<label for="password">Contraseña:</label><input type="password" value="{password}" disabled  name="password" id="password" class="required" minlength="2"/>
				</div>
				<div class="rowElem">
					<label for="email">Email:</label><input type="text" value="{email}" placeholder="email" name="email" id="email" class="required" minlength="2"/>
				</div>

			<br><br>

			<div class="meta">
				<span class="seccion">Datos Generales</span>
			</div>
				<div class="rowElem">
					<label for="nombres">Nombres:</label><input type="text" value="{nombres}" name="nombres">	
				</div>
				<div class="rowElem">
					<label for="apellidos">Apellidos:</label><input type="text" value="{apellidos}" name="apellidos">	
				</div>							
				<div class="rowElem">
					<label for="estado">Estado:</label>	
					<select name="estado" disabled>
						<option value="{codigoestado}" selected="selected"> {estado} </option>
					</select>
				</div>
				<div class="rowElem">
					<label for="municipio">Municipio:</label>
					<select name="municipio" disabled>
						<option value="{codigomunicipio}" selected="selected"> {municipio} </option>
					</select>
				</div>

			<br><br>
			<div class="meta">
				<span class="seccion">Datos Telefonicos</span>
			</div>
				<div class="rowElem">
					<label for="telefono">No Telefono:</label><input type="text" value="{telefono}" name="telefono">	
				</div>							
				<div class="rowElem">
					<label for="compania">Compañia:</label>	
					<select name="compania" disabled>
						<option value="{compania}" selected="selected"> {compania} </option>
					</select>
				</div>
				<div class="rowElem">
					<label for="tipo">Tipo:</label>
					<select name="tipo" disabled>
						<option value="{tipo}" selected="selected"> {tipo} </option>
					</select>
				</div>

			<br><br>
			<div class="meta">
				<span class="seccion">Datos Bancarios</span>
			</div>
				<div class="rowElem">
					<label for="cuenta">No Cuenta:</label><input type="text" value="{cuenta}" name="cuenta">	
				</div>
				<div class="rowElem">
					<label for="clabe">Clabe Interbancaria:</label><input type="text" value="{clabe}" name="clabe">	
				</div>							
				<div class="rowElem">
					<label for="banco">Banco:</label>	
					<select name="banco" disabled>
						<option value="{banco}" selected="selected"> {banco} </option>
					</select>
				</div>
			{/datosgenerales}
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
				//	$("form.jqtransform").jqTransform();

			});
		</script>

	</div>