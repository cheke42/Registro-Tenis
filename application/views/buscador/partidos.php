<div class="container">
	<h2 class="text-center margin-top margin-bottom">Buscador de partidos</h2>
	<div class="row">
		<div class="col"></div>
		<div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
			<div>
				<div class="form-group">
					<label for="numero_jugador">Número de jugador</label>
					<input type="number" class="form-control" name="numero_jugador" id="numero_jugador" placeholder="Número de jugador">
				</div>
				<div class="form-group">
					<label for="fecha">Fecha</label>
					<input type="date" class="form-control" name="fecha" id="fecha" placeholder="Fecha de partido">
				</div>
				<div class="form-group">
					<label for="instancia">Instancia</label>
					<select name="instancia" id="instancia">
						<option value="0" selected="selected">Seleccione una instancia</option>
						<?php foreach ($instancias as $instancia): ?>
							<option value="<?php echo $instancia->id ?>"><?php echo $instancia->nombre ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="text-center">
					<span class="badge badge-danger mensaje-error" style="visibility: hidden;">Debe ingresar un criterio de busqueda</span><br>
					<button id="buscar" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> Buscar</button>
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {

		$('.nav-item').find('.buscador_partidos').addClass('active');
		
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

		$('#instancia').on('select2:select', function(event) {
			if($(this).val() != 0){
				idInstancia = $(this).val();
				window.location = "<?php echo base_url('buscador/resultado_partidos/?instancia='); ?>" + idInstancia;
			}
		});

		function accionBuscar(){
			$('.mensaje-error').css('visibility', 'hidden');
			if($('#fecha').val() || $('#numero_jugador').val()){
				window.location = "<?php echo base_url('buscador/resultado_partidos/?numero_jugador='); ?>" + $('#numero_jugador').val() + '&fecha=' + $('#fecha').val();
			}else{
				$('.mensaje-error').css('visibility', 'visible');
				$('input').addClass('is-invalid').parent().find('label').addClass('text-danger');
			}
		}
	});
</script>
