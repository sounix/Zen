	<div class="bloques">
		<h2>Cambiar Padrino</h2>
		<div class="meta">
			<span class="alias">{nombrecompleto}</span>
			<span class="otro">{alias}</span>
			<!--<span class="otro"><time datetime="{tiempo}">Hoy es {tiempohumano}</time>-->
		</div>

		<div class="mensajes"> {msg} </div>

		<div id="formulario_cambiarpatrocinador">
			<form id="formcambiarpatrocinador" class="jqtransform zenform" name="jqtransform" action="<?=site_url('sistema/cambiarpatrocinador')?>" method="post">
			
				<input type="hidden" value="{alias}" name="alias" id="alias" />
				<input type="hidden" value="{ciclo}" name="ciclo" id="ciclo" />
			<br>
				<div class="rowElem">
					<label for="patrocinador">Padrino:</label>{patrocinador}
				</div>

			<br>
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
		<br><br><br>

	</div>