<div class="container" id="resultados-partidos">
 	<?php if ($partidos): ?>
 		<h2 class="text-center margin-top margin-bottom">Listado de partidos</h2>
 		<div class="row">
 			<div class="col-12">
 				<div class="container">
 					<div class="row margin-top">
 						<?php foreach ($partidos as $partido): ?>
 							<div class="col-md-2"></div>
 							<div class="col-md-8 col-12 my-card">
 								<?php if (!empty($fecha)){ ?>
 									<a href="<?php echo base_url('partido/por_fecha/?id=') . $partido->id . '&fecha=' . $fecha ?>">
 									
 								<?php }else if(!empty($instancia)){ ?>
 									<a href="<?php echo base_url('partido/por_instancia/?id=') . $partido->id . '&instancia=' . $instancia ?>">
 								<?php }else{ ?>
									<a href="<?php echo base_url('partido/por_jugador/?id=') . $partido->id . '&numero_jugador=' . $numero_jugador ?>">
 								<?php } ?>
 									<?php 
 										$jugadorUno = $this->db_util->get('jugador',$partido->jugador_uno);
 										$jugadorDos = $this->db_util->get('jugador',$partido->jugador_dos);
 									?>
 									<h6 class="text-center"><img src="<?php echo base_url('res/img/bandera/') . $jugadorUno->pais_nacimiento . '.png' ?>" alt=""><?php echo $jugadorUno->nombre . ' ' . $jugadorUno->apellido . ' VS '?><img src="<?php echo base_url('res/img/bandera/') . $jugadorDos->pais_nacimiento . '.png' ?>" alt=""><?php echo $jugadorDos->nombre . ' ' . $jugadorDos->apellido ?></h6>
 									<p class="text-center" style="margin-bottom: 0;padding-bottom: 0">Fecha: <strong><?php echo $partido->fecha ?></strong> - Instancia: <strong><?php echo $this->db_util->get('tipo_instancia',$partido->instancia)->nombre ?></strong></p>
 									<p class="text-center" >Resultado: <?php echo $partido->resultado ?></p>
 								</a>
 							</div>
 							<div class="col-md-2"></div>
 						<?php endforeach ?>
 					</div>
 				</div>
 			</div>
 		</div>
 	<?php else: ?>
		<div class="text-center" style="margin-top: 4rem">
 			<i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br>
		</div>
 		<h2 class="text-center">No se encontraron partidos con el criterio especificado</h2>
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