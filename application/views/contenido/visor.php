<div class="container">
	<a href="<?php echo base_url('partido/detalle/?id=') . $partido->id; ?>" style="text-decoration: inherit;color: black">
		<h6 class="text-center margin-bottom margin-top">
			<img 	src="<?php echo base_url('res/img/bandera/') . $jugadorUno->pais_nacimiento . '.png' ?>" >
					<?php echo $jugadorUno->nombre . ' ' . $jugadorUno->apellido . ' VS '?>
			<img 	src="<?php echo base_url('res/img/bandera/') . $jugadorDos->pais_nacimiento . '.png' ?>">
					<?php echo $jugadorDos->nombre . ' ' . $jugadorDos->apellido ?>
		</h6>
	</a>
	<div class="text-center margin-bottom">(Instancia: <?php echo $this->db_util->get('tipo_instancia',$partido->instancia)->nombre ?>)</div>
	<?php if ($contenido): ?>
		<div class="row margin-bottom">
			<div class="col-1">
				<?php if ($contenido_anterior): ?>
					<a href="<?php echo base_url('contenido/de_partido/?id_contenido=') . $contenido_anterior->contenido . '&id=' . $partido->id; ?>"><button class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button></a>
				<?php else: ?>
					<button class="btn btn-default" disabled><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>
			<div class="col">
				<div class="container-visor">
					<?php if ($contenido->tipo == 2): ?>
						<div class="embed-responsive embed-responsive-16by9">
						  <video width="320" height="240" controls>
						    <source src="<?php echo base_url('res/contenido/') . $contenido->archivo ?>" type="video/mp4">
						  Your browser does not support the video tag.
						  </video>
						</div>
					<?php else: ?>
						<div class="img-container">
							<img style="width: 100%" src="<?php echo base_url('res/contenido/') . $contenido->archivo ?>" alt="">
						</div>
					<?php endif ?>
				</div>
			</div>
			<div class="col-1">
				<?php if ($contenido_siguiente): ?>
					<a href="<?php echo base_url('contenido/de_partido/?id_contenido=') . $contenido_siguiente->contenido . '&id=' . $partido->id; ?>"><button class="btn btn-default"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button></a>
				<?php else: ?>
					<button class="btn btn-default" disabled><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>
		</div>
	<?php else: ?>
				<div class="text-center" style="margin-top: 4rem">
		 			<i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br>
				</div>
		 		<h2 class="text-center">No se encontró contenido multimedia</h2>
		 		<div class="text-center">
		 			<button class="btn-default btn" id="volver"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</button>
		 		</div>
	<?php endif ?>
</div>

<script>
	jQuery(document).ready(function($) {
		$('#volver').unbind().click(function(event) {
			window.history.back();
		});
	});
</script>