<div class="container">
	<h2 class="text-center margin-top margin-bottom">Buscador de jugadores</h2>
	<div class="row">
		<div class="col"></div>
		<div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
			<div>
				<div class="form-group">
					<label for="numero_jugador">Número de clasificación</label>
					<input type="number" class="form-control" name="numero_jugador" id="numero_jugador" placeholder="Número de clasificación del jugador">
				</div>
				<div class="form-group">
					<label for="nombre">Nombre del jugador</label>
					<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del jugador">
				</div>
				<div class="form-group">
					<label for="pais">País</label>
					<select name="pais" id="pais">
						<option value="0" selected="selected">Seleccione un país</option>
						<?php foreach ($paises as $pais): ?>
							<option value="<?php echo $pais->id ?>"><?php echo $pais->nombre ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="text-center">
					<span class="badge badge-danger mensaje-error" style="visibility: hidden;">Debe ingresar un criterio de busqueda</span><br>
					<button class="btn btn-primary" id="buscar"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>
<script>
	jQuery(document).ready(function($) {

		$('.nav-item').find('.buscador_jugadores').addClass('active');

		$('#buscar').unbind().click(function(event) {
			accionBuscar();
		});

		$('input').keypress(function(e) {
		    if(e.which == 13) {
		        accionBuscar();
		    }
		});

		$('input').focusin(function(event) {
			$('input').removeClass('is-invalid');
			$('.mensaje-error').css('visibility', 'hidden');
			$('.text-danger').removeClass('text-danger');
		});

		$('#pais').on('select2:select', function(event) {
			if($(this).val() != 0){
				idSeleccionado = $(this).val();
				window.location = "<?php echo base_url('buscador/resultado_jugadores/?pais='); ?>" + idSeleccionado;
			}
		});

		function accionBuscar(){
			$('.mensaje-error').css('visibility', 'hidden');
			if($('#numero_jugador').val() || $('#nombre').val()){
				window.location = "<?php echo base_url('buscador/resultado_jugadores/?numero_jugador='); ?>" + $('#numero_jugador').val() + '&nombre=' + $('#nombre').val();
			}else{
				$('.mensaje-error').css('visibility', 'visible');
				$('input').addClass('is-invalid').parent().find('label').addClass('text-danger');
			}
		}
	});
</script>