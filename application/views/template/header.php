<?php
	$default_theme = 'bootstrap-theme/'. $theme . '.min.css'; 
	$estilos  = array($default_theme,'font-awesome.min.css','dataTables.bootstrap4.min.css','select2.min.css','bootstrap-datepicker.min.css',
		'bootstrap-datetimepicker.min.css','style.css');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/favicon.ico') ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Torneo de Tenis - ATP250</title>
	<?php foreach ($estilos as $estilo): ?>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/' . $estilo); ?>">
	<?php endforeach ?>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js') ?>" type="text/javascript" charset="utf-8"></script>

</head>
<body>


	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	  <a class="navbar-brand" href="<?php echo base_url() ?>">
		<img src="<?php echo base_url('assets/img/tennis-ball.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
	  TORNEO DE TENIS | ATP250</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item">
	        <a class="nav-link home" href="<?php echo base_url() ?>">Inicio <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link buscador_partidos" href="<?php echo base_url('buscador/partidos') ?>">Buscador de partidos</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link buscador_jugadores" href="<?php echo base_url('buscador/jugadores') ?>">Buscador de jugadores</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link canchas" href="<?php echo base_url('cancha/listar') ?>">Canchas</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link acercade" href="<?php echo base_url('home/acerca_de') ?>">Acerca de</a>
	      </li>
	    </ul>
	  </div>
	</nav>