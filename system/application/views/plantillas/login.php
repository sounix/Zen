	<div class="bloques">

		<div id="formulario_registro">
			<form id="formregistro" class="jqtransform zenform" name="jqtransform" action="<?=site_url('sistema/validarlogin')?>" method="post">
			
			<h2 class="titulotres">Iniciar Sesion</h2>
				<br>
				<div class="rowElem">
					<label for="Mensajes"></label><p style="color: red;">{error}</p>
				</div>
				<div class="rowElem">
					<label for="alias">Alias:</label><input type="text" name="alias" id="alias" class="required" minlength="2" placeholder="alias" />
				</div>
				<div class="rowElem">
					<label for="password">Contraseña:</label><input type="password" name="password" id="password" class="required" minlength="2" placeholder="contraseña" />
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
					//$("form.jqtransform").jqTransform();

				// Poner el focus al formulario
				$("form:not(.filter) :input:visible:enabled:first").focus();

			});
		</script>

	</div>