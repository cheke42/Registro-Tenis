<?php 






?>
<div class="container">
	<?php if (isset($id_partido)): ?>
		<a href="<?php echo base_url('partido/detalle/?id=') . $partido->id; ?>" style="text-decoration: inherit;color: black">
			<h6 class="text-center margin-bottom margin-top"><img src="<?php echo base_url('res/img/bandera/') . $jugadorUno->pais_nacimiento . '.png' ?>" alt=""><?php echo $jugadorUno->nombre . ' ' . $jugadorUno->apellido . ' VS '?><img src="<?php echo base_url('res/img/bandera/') . $jugadorDos->pais_nacimiento . '.png' ?>" alt=""><?php echo $jugadorDos->nombre . ' ' . $jugadorDos->apellido ?></h6>
		</a>
	<?php endif ?>
	<h2 class="text-center" style="margin-top: 1rem;margin-bottom: 1rem">Datos del juez</h2>
	<?php if ($juez): ?>
		<div class="row">
			<?php if (isset($id_partido)): ?>
			<div class="col-1">
				<?php if ($juez_anterior): ?>
					<a href="<?php echo base_url('juez/por_tipo_y_partido/?id_partido=') . $id_partido . '&id_juez=' . $juez_anterior->id; ?>"><button class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button></a>
				<?php else: ?>
					<button class="btn btn-default" disabled title="No hay anterior juez"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>	
			<?php endif ?>
			<div class="col">
				<div class="container">
					<div class="row">
						<div class="col">
							<h4>Datos Personales</h4>
							<div>
								<div class="form-group">
									<label for="ranking_actual">Tipo de Juez</label>
									<input type="text" id="raking_actual" class="form-control" value="<?php echo $tipo_juez ?>" readonly>
								</div>
								<div class="form-group">
									<label for="nombre">Nombre</label>
									<input type="text" id="nombre" class="form-control" value="<?php echo $juez->nombre ?>" readonly>
								</div>
								<div class="form-group">
									<label for="apellido">Apellido</label>
									<input type="text" id="apellido" class="form-control" value="<?php echo $juez->apellido ?>" readonly>
								</div>
								<div class="form-group">
									<label for="nacimiento">Fecha de nacimiento</label>
									<input type="text" id="nacimiento" class="form-control" value="<?php echo date('d/m/Y', strtotime($juez->nacimiento)) ?>" readonly>
								</div>
								<div class="form-group">
									<label for="pais_nacimiento">Pais de nacimiento</label>
									<input type="text" id="pais_nacimiento" style="background: url('<?php echo base_url('res/img/bandera/') . $juez->pais_nacimiento . '.png'; ?>') no-repeat scroll -5px -5px;
										padding-left:3rem;" class="form-control" value="<?php echo $pais ?>" readonly>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<h4>&nbsp;</h4>
							<div class="card" style="padding: 5px">
							  <img style="width: 100%" src="<?php echo base_url('res/img/juez/') . $juez->id . '.jpg'; ?>" alt="">
							  <div class="card-block">
							    <p class="card-text text-center"><strong><?php echo $edad . ' Años'?></strong></p>
							  </div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<?php if (isset($id_partido)): ?>
			<div class="col-1">
				<?php if ($juez_siguiente): ?>
					<a href="<?php echo base_url('juez/por_tipo_y_partido/?id_partido=') . $id_partido . '&id_juez=' . $juez_siguiente->id; ?>"><button class="btn btn-default"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button></a>
				<?php else: ?>
					<button class="btn btn-default" disabled title="No hay siguiente juez"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>	
			<?php endif ?>
		</div>
	<?php else: ?>
		<div class="row">
			<div class="col">
				<div class="text-center" style="margin-top: 4rem">
		 			<i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br>
				</div>
		 		<h2 class="text-center">No se encontró un juez</h2>
		 		<div class="text-center">
		 			<button class="btn-default btn" id="volver"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</button>
		 		</div>
			</div>
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