<!DOCTYPE HTML>

<html lang="es">
<head>
	<meta charset="UTF-8">

	<title>{plantilla_titulo}</title>
	
	<link rel="stylesheet" href="<?=base_url() . 'css/general.css'?>" type="text/css">
	<link rel="stylesheet" href="<?=base_url() . 'css/jqtransform.css'?>" type="text/css">
	<link rel="stylesheet" href="<?=base_url() . 'css/jquery.validity.css'?>" type="text/css">

	<script type="text/javascript" src="<?=base_url() . 'js/jquery-1.6.4.min.js'?>"></script>

	<script type="text/javascript" src="<?=base_url() . 'js/jquery.jcarousel.min.js'?>"></script>
	<script type="text/javascript" src="<?=base_url() . 'js/jquery.scRollto.js'?>"></script>
	<script type="text/javascript" src="<?=base_url() . 'js/jquery.corners.js'?>"></script>
	<script type="text/javascript" src="<?=base_url() . 'js/jquery.form.js'?>"></script>
	<script type="text/javascript" src="<?=base_url() . 'js/jquery.jqtransform.js'?>"></script>
	<script type="text/javascript" src="<?=base_url() . 'js/jquery.validity.js'?>"></script>

</head>
<body>
	<div id="all">
<!-- Inicia la Cabeza -->
		<div id="header">
			<div class="border">
				<div id="press">
					<div id="logo"></div>
					<div id="logomenu">
						<ul>
							<li><a href="<?=site_url('sistema/index')?>">Sistema de Ayuda Mutua</a></li>
							<li><a href="<?=site_url('sistema/registro')?>">Registro</a></li>
							<li><a href="<?=site_url('sistema/contactos')?>">Contactos</a></li>
						</ul>
					</div>
					<br class="clear"/>
				</div>
				<div id="menu">
					<ul>
						<li><a href="<?=site_url('sistema/index')?>" class="izq">Inicio</a></li>
						<li><a href="<?=site_url('sistema/mision')?>" class="">Mision</a></li>
						<li><a href="<?=site_url('sistema/nsistema')?>" class="">Nuestro Sistema</a></li>
					</ul>
				</div>
			</div>
		</div>
<!-- Inicia la Cuerpo -->
		<div id="content">
			<div class="border">
				<div id="contenedor" class="container">

					{plantilla_cuerpo_izq} 

				</div>
				<div id="menuright" class="container">
					
					{plantilla_cuerpo_der}
					
				</div>	

				<br class="clear"/>
				<div id="banners" class="container">
				</div>
			</div>
		</div>

<!-- Inicia la Pie -->
		<div id="footer">
			<div class="border">
				<div class="left">
					<a href="http://www.facebook.com/jorge.villasecaortiz" title="Siguenos en Facebook">
						<img src="<?=base_url() . 'images/iconfacebook.png'?>" width="40" height="39" alt="iconfacebook" class="social">
					</a>
					<a href="https://twitter.com/JorgeVillaseca2" title="Siguenos en Twitter">
						<img src="<?=base_url() . 'images/icontwitter.png'?>" width="40" height="39" alt="icontwitter" class="social">
					</a>
					<a href="https://plus.google.com/u/0/?hl=es-419" title="Siguenos en Google++">
						<img src="<?=base_url() . 'images/icongoogleplus.png'?>"  width="40" height="39" alt="icongoogleplus" class="social">
					</a>
				</div>
				<div class="right">
					<a href="javascript:$.scrollTo('#all',700);" title="Ir Arriba">
						<img src="<?=base_url() . 'images/iconplus.png'?>" width = "50" height = "49" alt="iconup" class="social">
					</a>
				</div>
			</div>
		</div>
	</div>

</body>
</html>