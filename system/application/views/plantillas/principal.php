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
					    		<p><br>Preocupado, estresado, sin dormir bien y todo por la culpa del <b>DINERO.</br></b> <p><br>Ya basta de pedir dinero ó  de vivir endrogado.</br> </p></p>
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
		<h2 class="titulouno">Sistema de Ayuda Mutua</h2>
		<p class="justificado"><p>Somos un grupo de emprendedores preocupados por la economía de las familias de este país, quienes sufren día a día los estragos de la crisis que actualmente vivimos.</p><br>
		<p>En busca de encontrar una solución y con un objetivo muy claro el “Ayudarte a ti y a muchas otras personas a adquirir esa libertad financiera que tanto han soñado”, y con una filosofía en mente <b><i>“Dar para poder recibir”</i></b>, fue así que el 2 de julio del 2012 a las 6 p.m. se inicio la creación del sistema <b><i>RIQUEZA PARA TODOS</i></b>, un sistema de mutua ayuda que cambiará la vida de aquellas personas que lo practiquen. Que dando listo  para empezar a promover dicho sistema de forma honesta y sencilla el día 10 de Agosto 2012.</p>

		</p>
	</div>
	<div class="bloques">
		<h2 class="titulodos">¿Qué es Riqueza para Todos?</h2>
		<p class="justificado">Es un sistema basado en nuestra filosofía <b><i>“Dar para poder recibir”</i></b> que unida con las herramientas tecnológicas que el mundo cibernético nos brinda, hace que este sistema pueda estar al alcance de toda persona que como nosotros quiera compartir nuestra creencia. </p>
	</div>
	<div class="bloques">
		<h2 class="titulodos">Valores </h2>
		<p class="justificado">
			<ul>
				<li>Trabajo en equipo</li>
				<li>Respeto</li>                                                              
				<li>Honestidad</li>
				<li>Humildad</li>
				<li>Igualdad</li>
			</ul>	
		</p>
	</div>