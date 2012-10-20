	<!-- Slider -->
	<div id="slider">
		<div class="top">
			<div class="bot">
				<div id="slider-holder">
					<ul>
					    <li>
					    	<div class="cl">&nbsp;</div>
					    	<div class="slide-info">
					    		<h2 class="notext txt-solutions">Ayuda Mutua</h2>
					    		<p><br>Preocupado, estresado, sin dormir bien y todo por la culpa del <b>DINERO.</br></b> <p><br>Ya basta de pedir dinero ó  de vivir endrogado.</br> </p></p> </p>
					    		<!--<p><a href="#" class="more">Read more</a></p>-->
					    	</div>
					    	<div class="slide-image">
					    		<img src="<?=base_url() . 'images/logoayudamutua.png'?>" alt="" width="180" height="130"/>
					    	</div>
					    	<div class="cl">&nbsp;</div>
					    </li>
					    <li>
					    	<div class="cl">&nbsp;</div>
					    	<div class="slide-info">
					    		<h2 class="notext txt-solutions">Ayuda Mutua</h2>
					    		<p><br>El momento ha llegado para  <b> Cambiar tu vida</b>.</br>  </p>
					    		<!--<p><a href="#" class="more">Read more</a></p>-->
					    	</div>
					    	<div class="slide-image">
					    		<img src="<?=base_url() . 'images/logoayudamutua.png'?>" alt="" width="180" height="130"/>
					    	</div>
					    	<div class="cl">&nbsp;</div>
					    </li>
					    <li>
					    	<div class="cl">&nbsp;</div>
					    	<div class="slide-info">
					    		<h2 class="notext txt-solutions">Riqueza para Todos</h2>
					    		<p><br>Riqueza para todos  es la <b>MEJOR </b> solución para resolver tus problemas financieros, creado por nosotros para ti.</br></p>
					    		<!--<p><a href="#" class="more">Read more</a></p>-->
					    	</div>
					    	<div class="slide-image">
					    		<img src="<?=base_url() . 'images/logoayudamutua.png'?>" alt="" width="180" height="130"/>
					    	</div>
					    	<div class="cl">&nbsp;</div>
					    </li>
					    <li>
					    	<div class="cl">&nbsp;</div>
					    	<div class="slide-info">
					    		<h2 class="notext txt-solutions">Conocenos!!</h2>
					    		<p><br>Con una sola misión  ayudarte a alcanzar tu propia <b>libertad</b> financiera. </br></p>
					    		<!--<p><a href="#" class="more">Read more</a></p>-->
					    	</div>
					    	<div class="slide-image">
					    		<img src="<?=base_url() . 'images/logoayudamutua.png'?>" alt="" width="180" height="130"/>
					    	</div>
					    	<div class="cl">&nbsp;</div>
					    </li>
					</ul>
				</div>
				<div class="slider-controls">
					<a href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function _init_slider(carousel) {
			$('#slider .slider-controls a').bind('click', function() {
				var index = $(this).parent().find('a').index(this) + 1;
				carousel.scroll( index );
				return false;
			});
			
			$('#slider .slider-nav .next').bind('click', function() {
				carousel.next();
				return false;
			});
			
			$('#slider .slider-nav .prev').bind('click', function() {
				carousel.prev();
				return false;
			});
		};

		function _set_slide(carousel, item, idx, state) {
			var index = idx - 1;
			
			$('#slider .slider-controls a').removeClass('active');
			$('#slider .slider-controls a').eq(index).addClass('active');
		};

		function check_fields(field) {
			if (field.title==field.value || this.value == '') {
				$(field).removeClass('field-focused');
			} else {
				$(field).addClass('field-focused');
			};
		};

		$(document).ready(function() {
			$("#slider-holder").jcarousel({
				scroll: 1,
				auto: 8,
				wrap: 'both',
				initCallback: _init_slider,
				itemFirstInCallback: _set_slide,
				buttonNextHTML: null,
				buttonPrevHTML: null
			});
			
			$('.field').each(function() {
				check_fields(this);
			});
			
			$('.field').focus(function() {
		        if(this.title==this.value) {
		            this.value = '';
		            check_fields(this);
		        }
		    }).blur(function(){
		        if(this.value=='') {
		            this.value = this.title;
		            check_fields(this);
		        }
		    });
		});
	</script>
	<!-- END Slider -->

	<div class="bloques">
		<h2 class="titulouno">¿Cuál es el fin de Riqueza para todos?</h2>
		<p class="justificado"><p>Poder ayudarte a resolver tus problemas financieros y poder conseguir esa libertad financiera que muchos desean, compartiendo nuestra creencia <b>“ayudar para poder recibir”</b>  con los demás.</p><br>
		<p>Queremos que a través de este sistema tú puedas:</p>
		<p><br>
			<ul>
				<li>Pagar tus deudas</li>
				<li>Cubrir gastos personales</li>                                                              
				<li>Generar una red de contactos empresariales</li>
				<li>Aprender a invertir tu dinero</li>
				<li>Generar fuentes de ingresos</li>
			</ul>	
		</p>
		</p>
	</div>