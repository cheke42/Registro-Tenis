<?php if ($jugador): ?>
<div class="container margin-bottom">
<h2 class="text-center margin-top" <?php if(isset($nombre)){ ?> style="padding-bottom: 0;margin-bottom: 0" <?php } ?>>Datos del jugador</h2>
<?php if (isset($nombre)): ?>
<div class="text-center margin-bottom">
(Criterio de busqueda ingresado: '<?php echo $nombre ?>')
</div>
<?php endif ?>
<div class="row">
<?php if (isset($anterior_jugador)): ?>
<div class="col-1">
<?php if ($anterior_jugador): ?>
	
	<?php if (isset($id)){ ?>
	<a href="<?php echo base_url('jugador/por_nacionalidad/?id=') . $anterior_jugador->id  . '&nacionalidad=' . $anterior_jugador->pais_nacimiento ?>">

		<?php }else if(isset($id_partido)){ ?>
		<a href="<?php echo base_url('jugador/por_partido/?id_partido=') . $partido->id  . '&id_jugador_partido=' . $anterior_jugador->id ?>">

			<?php }else{ ?>
			<a href="<?php echo base_url('jugador/por_nombre/?id_jugador=') . $anterior_jugador->id  . '&nombre=' . $nombre ?>">							
				<?php } ?>
				<button class="btn btn-default" title="<?php echo $anterior_jugador->nombre . ' ' . $anterior_jugador->apellido;  ?>"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
			</a>
		<?php else: ?>
			<button class="btn btn-default" title="No hay anterior jugador" disabled><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
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
						<label for="ranking_actual">Ranking</label>
						<input type="text" id="raking_actual" class="form-control" value="<?php echo $jugador->raking_actual ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" id="nombre" class="form-control" value="<?php echo $jugador->nombre ?>" readonly>
					</div>
					<div class="form-group">
						<label for="apellido">Apellido</label>
						<input type="text" id="apellido" class="form-control" value="<?php echo $jugador->apellido ?>" readonly>
					</div>
					<div class="form-group">
						<label for="nacimiento">Fecha de nacimiento</label>
						<input type="text" id="nacimiento" class="form-control" value="<?php echo date('d/m/Y', strtotime($jugador->nacimiento)) ?>" readonly>
					</div>
					<div class="form-group">
						<label for="pais_nacimiento">Pais de nacimiento</label>
						<input type="text" id="pais_nacimiento" style="background: url('<?php echo base_url('res/img/bandera/') . $jugador->pais_nacimiento . '.png'; ?>') no-repeat scroll -5px -5px;
						padding-left:3rem;" class="form-control" value="<?php echo $pais ?>" readonly>
					</div>

				</div>
			</div>
			<div class="col-md-3 col-12">
				<h4>&nbsp;</h4>
				<div class="card" style="padding: 5px">
					<img style="width: 100%" src="<?php echo base_url('res/img/jugador/') . $jugador->id . '.jpg'; ?>" alt="">
					<div class="card-block">
						<p class="card-text text-center"><strong><?php echo $edad . ' Años'?></strong></p>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<?php if (isset($siguiente_jugador)): ?>
	<div class="col-1">
		<?php if ($siguiente_jugador): ?>

			<?php if (isset($id)){ ?>
			<a href="<?php echo base_url('jugador/por_nacionalidad/?id=') . $siguiente_jugador->id  . '&nacionalidad=' . $siguiente_jugador->pais_nacimiento ?>">

				<?php }else if(isset($id_partido)){ ?>
				<a href="<?php echo base_url('jugador/por_partido/?id_partido=') . $partido->id  . '&id_jugador_partido=' . $siguiente_jugador->id ?>">

					<?php }else{ ?>
					<a href="<?php echo base_url('jugador/por_nombre/?id_jugador=') . $siguiente_jugador->id  . '&nombre=' . $nombre ?>">							
						<?php } ?>
						<button class="btn btn-default" title="<?php echo $siguiente_jugador->nombre . ' ' . $siguiente_jugador->apellido;  ?>"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
					</a>


				<?php else: ?>
					<button class="btn btn-default" title="No hay siguiente jugador" disabled><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
</div>
<div class="container">
	<h2 class="text-center" style="margin-top: 1rem;margin-bottom: 1rem">Ultimos partidos disputados</h2>
	<div class="row">
		<?php foreach ($ultimos_partidos as $partido): ?>
			<div class="col-xl-4 col-md-6 col-12">
				<ul class="list-group container-partido">
					<?php 
					$instancia = $this->db_util->get('tipo_instancia',$partido->instancia)->nombre;
					$estado = $this->db_util->get('estado_partido',$partido->estado)->nombre;
					?>
					<div style="cursor: pointer;" id="<?php echo $partido->id ?>" class="partido margin-top margin-bottom">
						<li style="list-style-type: none;"><strong>Instancia:</strong> <?php echo $instancia ?> - <strong class="text-success"><?php echo $estado ?></strong></li> 
						<li class="list-group-item">
							<div class="container">
								<div class="row">
									<div class="col-8">
										<?php 
										$jugador1 = $this->db_util->get('jugador',$partido->jugador_uno);
										?>
										<img style="max-width: 1.5rem" src="<?php echo base_url('res/img/bandera/') . $jugador1->pais_nacimiento . '.png' ?>" alt=""><?php echo $jugador1->nombre . ' ' . $jugador1->apellido ?> <i class="fa fa-dot-circle-o text-success" aria-hidden="true"></i>
									</div>
									<div class="col-4">
										<ul class="pagination">
											<li class="page-item">
												<a class="page-link">6</a>
											</li>
											<li class="page-item">
												<a class="page-link">6</a>
											</li>
											<li class="page-item">
												<a class="page-link"><?php echo rand(0,6) ?></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="container">
								<div class="row">
									<div class="col-8">
										<?php 
										$jugador2 = $this->db_util->get('jugador',$partido->jugador_dos);
										?>
										<img style="max-width: 1.5rem" src="<?php echo base_url('res/img/bandera/') . $jugador2->pais_nacimiento . '.png' ?>" alt=""> <?php echo $jugador2->nombre . ' ' . $jugador2->apellido ?>
									</div>
									<div class="col-4">
										<ul class="pagination">
											<li class="page-item">
												<a class="page-link">7</a>
											</li>
											<li class="page-item">
												<a class="page-link">4</a>
											</li>
											<li class="page-item">
												<a class="page-link"><?php echo rand(0,6) ?></a>
											</li>
										</ul>
									</div>
								</div>	
							</div>
						</li>
					</div>
				</ul>
			</div>
		<?php endforeach ?>
	</div>
</div>
<?php else: ?>
<div class="container">
	<div class="row">
		<div class="col">
			<div class="text-center" style="margin-top: 4rem">
				<i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br>
			</div>
			<h2 class="text-center">No se encontró jugador</h2>
			<div class="text-center">
				<button class="btn-default btn" id="volver"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Volver</button>
			</div>
		</div>
	</div>
</div>
<?php endif ?>

<script>
	jQuery(document).ready(function($) {
		$('#volver').unbind().click(function(event) {
			window.history.back();
		});

		$('input').prop('readonly', true);

		$('.partido').unbind().click(function(event) {
			window.location = "<?php echo base_url('partido/detalle/?id='); ?>" + $(this).attr('id');
		});
	});
</script>