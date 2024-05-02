<div class="container" id="resultados-jugador">
 	<?php if ($jugadores): ?>
 		<h2 class="text-center margin-top margin-bottom">Listado de jugadores</h2>
 		<div class="row">
 			<div class="col"></div>
 			<div class="col-xl-8 col-md-10 col-sm-10 col-12">
 				<div class="container">
 					<div class="row margin-top">
 						<?php foreach ($jugadores as $jugador): ?>
 							<div class="col-xl-4 col-6 my-card">
 								<?php if ($pais): ?>
 									<a href="<?php echo base_url('jugador/por_nacionalidad/?id=') . $jugador->id  . '&nacionalidad=' . $jugador->pais_nacimiento?>">
 								<?php else: ?>
 									<a href="<?php echo base_url('jugador/por_nombre/?id_jugador=') . $jugador->id  . '&nombre=' . $nombre?>">
 								<?php endif ?>
 									<div class="card-jugador" style="">
 										<h5 class="text-center"><img style="max-width: 1.25rem" src="<?php echo base_url('res/img/bandera/') . $jugador->pais_nacimiento . '.png' ?>" alt=""> <?php echo $jugador->nombre . ' ' . $jugador->apellido ?></h5>
 										<div class="img-container">
 											<img style="width: 100%" src="<?php echo base_url('res/img/jugador/') . $jugador->id . '.jpg' ?>" alt="">
 										</div>
 									</div>
 								</a>
 							</div>
 						<?php endforeach ?>
 					</div>
 				</div>
 			</div>
 			<div class="col"></div>
 			
 		</div>
 	<?php else: ?>
		<div class="text-center" style="margin-top: 4rem">
 			<i class="fa fa-exclamation-triangle fa-5x" aria-hidden="true"></i><br>
		</div>
 		<h2 class="text-center">No se encontraron jugadores con el criterio especificado</h2>
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