<div class="container margin-bottom">
	<h2 class="text-center margin-top margin-bottom">Detalle del partido</h2>
	<div class="row">
		<?php if (isset($fecha) || isset($instancia) || isset($id_jugador)): ?>
			<div class="col-1">
				<?php if ($partido_anterior): ?>
					<?php if (isset($fecha)){ ?>
						<a href="<?php echo base_url('partido/por_fecha/?id=') . $partido_anterior->id . '&fecha=' . $fecha ?>">	
					<?php }else if(isset($instancia)){ ?>
						<a href="<?php echo base_url('partido/por_instancia/?id=') . $partido_anterior->id . '&instancia=' . $instancia ?>">	
					<?php }else{ ?>
						<a href="<?php echo base_url('partido/por_jugador/?id=') . $partido_anterior->id . '&numero_jugador=' . $id_jugador ?>">	
					<?php } ?>
						<button class="btn btn-default"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
					</a>
				<?php else: ?>
					<button class="btn btn-default" title="No hay anterior partido" disabled><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>
		<?php endif ?>
		<div class="col">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label for="">Fecha</label>
							<input type="text" class="form-control" value="<?php echo $partido->fecha ?>">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label for="">Instancia</label>
							<input type="text" class="form-control" value="<?php echo $this->db_util->get('tipo_instancia',$partido->instancia)->nombre ?>">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<?php $jugador = $this->db_util->get('jugador',$partido->jugador_uno); ?>
							<label for="">Jugador 1</label>
							<input type="text" class="form-control" style="background: url('<?php echo base_url("res/img/bandera/") . $jugador->pais_nacimiento . ".png" ?>') no-repeat scroll -5px -5px;
										padding-left:3rem;" value="<?php echo $jugador->nombre . ' ' .$jugador->apellido ?>">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<?php $jugador = $this->db_util->get('jugador',$partido->jugador_dos); ?>
							<label for="">Jugador 2</label>
							<input type="text" class="form-control" style="background: url('<?php echo base_url("res/img/bandera/") . $jugador->pais_nacimiento . ".png" ?>') no-repeat scroll -5px -5px;
										padding-left:3rem;" value="<?php echo $jugador->nombre . ' ' .$jugador->apellido ?>">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<?php $cancha = $this->db_util->get('cancha',$partido->cancha); ?>
							<label for="">Cancha</label>
							<input type="text" class="form-control" value="<?php echo $cancha->nombre ?>">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<?php $estado = $this->db_util->get('estado_partido',$partido->estado); ?>
							<label for="">Estado del partido</label>
							<input type="text" class="form-control" value="<?php echo $estado->nombre ?>">
						</div>
					</div>
					<div class="col-md-6 col-12">
						<div class="form-group">
							<label for="">Resultado del partido</label>
							<input type="text" class="form-control" value="<?php echo $partido->resultado ?>">
						</div>
					</div>
					<div class="text-center col-12">
						<a href="<?php echo base_url('juez/por_tipo_y_partido/?id_partido=') . $partido->id ?>">
							<button class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i> Jueces del partido</button>
						</a>
						<a href="<?php echo base_url('contenido/de_partido/?id=') . $partido->id ?>">
							<button class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Imagenes del partido</button>
						</a>
						<a href="<?php echo base_url('cancha/detalle/?id=') . $partido->cancha ?>">
							<button class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i> Detalle de la cancha</button>
						</a>
						<a href="<?php echo base_url('jugador/por_partido/?id_partido=') . $partido->id ?>">
							<button class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Tenistas en partido</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php if (isset($fecha) || isset($instancia) || isset($id_jugador)): ?>
			<div class="col-1">
				<?php if ($partido_siguiente): ?>
						
						<?php if (isset($fecha)){ ?>
							<a href="<?php echo base_url('partido/por_fecha/?id=') . $partido_siguiente->id . '&fecha=' . $fecha ?>">	
						<?php }else if(isset($instancia)){ ?>
							<a href="<?php echo base_url('partido/por_instancia/?id=') . $partido_siguiente->id . '&instancia=' . $instancia ?>">	
						<?php }else{ ?>
							<a href="<?php echo base_url('partido/por_jugador/?id=') . $partido_siguiente->id . '&numero_jugador=' . $id_jugador ?>">	
						<?php } ?>

						<button class="btn btn-default"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
					</a>
				<?php else: ?>
					<button class="btn btn-default" title="No hay siguiente partido" disabled><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		$('input').prop('readonly', true);
	});
</script>