	<div class="bloques">

		<h2>Pago a Realizar del Ciclo 1</h2>
		<div class="meta">
			<span class="alias">{nombrecompleto}</span>
			<span class="otro">{alias}</span>
			<!--<span class="otro"><time datetime="{tiempo}">Hoy es {tiempohumano}</time>-->
		</div>

		<div id="formulario_registro">
			<form id="formregistro" class="jqtransform zenform" name="jqtransform" action="" method="post">

				<div class="rowElem">
					<label for="alias">Alias:</label><input type="text" disabled value="zen01" name="alias">	
				</div>
				<div class="rowElem">
					<label for="email">Email:</label><input type="text" disabled value="zen01@riquezaparatodos.org" name="email">	
				</div>
				<div class="rowElem">
					<label for="telefono">Telcel:</label><input type="text" disabled value="924 116 6922" name="telefono">	
				</div>
			<br>
			<div class="meta">
				<span class="seccion">Cuenta Bancaria para Deposito</span>
			</div>
				<div class="rowElem">
					<label for="cuenta">No Cuenta:</label><input type="text" disabled value="0123456789" name="cuenta">	
				</div>
				<div class="rowElem">
					<label for="clabe">Clabe Interbancaria:</label><input type="text" disabled value="X99-0123456789" name="clabe">	
				</div>							
				<div class="rowElem">
					<label for="banco">Banco:</label><input type="text" disabled value="BANCOMER" name="banco">	
				</div>

			<br>
			<div class="meta">
				<span class="seccion">Cantidad Deposito</span>
			</div>
				<div class="rowElem">
					<label for="cantidad">Cantidad Deposito:</label><input type="text" disabled value="$ 100.00" name="cantidad">	
				</div>
				
			<br><br>

				<div class="rowElem">
					<label for="folio">Folio de Deposito:</label><input type="text" value="" name="folio" placeholder="Ingresa folio">	
				</div>
				<br>
				<div class="rowElem"><label for=""></label><input type="submit" value=" Enviar " /></div>
			</form>
			<br><br>
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