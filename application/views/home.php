<div class="container">
	<div class="row margin-top margin-bottom">
		<div class="col"></div>
		<div class="col-lg-10">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<h4 class="text-center text-primary titulo-buscador">Encontrá lo que buscas</h4>
					<div class="text-center box-busqueda">
					  <div class="row">
					  	<div class="col"></div>
					  	<div class="col">
					  		<a href="<?php  echo base_url('buscador/partidos') ?>"><button style="width: 100%" type="button" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Buscador Partidos</button></a><br>
					  		<a href="<?php  echo base_url('buscador/jugadores') ?>"><button style="width: 100%" type="button" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> Buscador Jugadores</button></a>
					  	</div>
					  	<div class="col"></div>
					  </div>
					</div>
					<h4 class="text-center text-primary margin-top">Canchas del torneo</h4>
					<div class="list-group contendor-cancha">
						<?php foreach ($canchas as $cancha): ?>
							<a href="<?php echo base_url('cancha/detalle/?id=') . $cancha->id ?>"  class="list-group-item list-group-item-action">
										    <span class="row">
										    	<div class="col-lg-4">
										    		<img width="100%" src="<?php echo base_url('res/img/cancha/') . $cancha->id . '.jpg' ?>" alt="">
										    	</div>
										    	<div class="col-lg-8">
										    		<h4 class="list-group-item-heading"><?php echo $cancha->nombre ?></h4>
										    		<p class="list-group-item-text">
										    			Capacidad: <strong><?php echo $cancha->capacidad ?> de Personas</strong><br>
										    			Ubicacion: <strong><?php echo $this->db_util->get('ciudad',$cancha->ubicacion)->nombre ?></strong><br>
										    			Disponibilidad: <strong class="text-success"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $cancha->disponibilidad ?></strong>
										    		</p>
										    	</div>
										    </span>
										  </a>
						<?php endforeach ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<h4 class="text-center text-primary">Partidos en juego</h4>
					<ul class="list-group container-partido">
					  	<?php foreach ($partidos_en_juego as $partido): ?>
					  		<?php 
					  			$instancia = $this->db_util->get('tipo_instancia',$partido->instancia)->nombre;
					  			$estado = $this->db_util->get('estado_partido',$partido->estado)->nombre;
					  		?>
					  		<div style="cursor: pointer;" id="<?php echo $partido->id ?>" class="partido margin-top margin-bottom">
					  						<li style="list-style-type: none;"><strong>Instancia:</strong> <?php echo $instancia ?> - <strong class="text-success"><?php echo $estado ?></strong> (2:<?php echo rand(10,59); ?> hs.)</li> 
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
					  	<?php endforeach ?>
					</ul>
				</div>
				
			</div>
		</div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {
		$('.partido').unbind().click(function(event) {
				window.location = "<?php echo base_url('partido/detalle/?id='); ?>" + $(this).attr('id');
		});


		$('.nav-item').find('.home').addClass('active');
	});
</script>