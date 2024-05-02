<div class="container">
	<h2 class="text-center" style="margin-top: 1rem;margin-bottom: 1rem">Datos de la cancha</h2>
	<div class="row">
		<div class="col">
			<div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" id="nombre" class="form-control" value="<?php echo $jugador->nombre ?>" readonly>
				</div>
				<div class="form-group">
					<label for="ubicacion">Ubicación</label>
					<input type="text" id="ubicacion" class="form-control" value="<?php echo $ciudad ?>" readonly>
				</div>
				<div class="form-group">
					<label for="capacidad">Capacidad</label>
					<input type="text" id="capacidad" class="form-control" value="<?php echo $jugador->capacidad . ' Personas' ?>" readonly>
				</div>
				<div class="form-group">
					<label for="superficie">Superficie</label>
					<input type="text" id="superficie" class="form-control" value="<?php echo $jugador->superficie . ' Metros cuadrados' ?>" readonly>
				</div>

			</div>
		</div>
		<div class="col-md-5">
			<h4>&nbsp;</h4>
			<div class="card" style="padding: 5px">
			  <img style="width: 100%" src="<?php echo base_url('res/img/cancha/') . $id . '.jpg'; ?>" alt="">
			  <div class="card-block">
			    <p class="card-text text-center"><strong><?php echo $jugador->disponibilidad?></strong></p>
			  </div>
			</div>
		</div>
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
													<?php $jugador1 = $this->db_util->get('jugador',$partido->jugador_uno); ?>
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
											<?php $jugador2 = $this->db_util->get('jugador',$partido->jugador_dos); ?>
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

<script>
	jQuery(document).ready(function($) {
		$('.partido').unbind().click(function(event) {
				window.location = "<?php echo base_url('partido/detalle/?id='); ?>" + $(this).attr('id');
		});
	});
</script>