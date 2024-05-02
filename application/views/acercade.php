<div class="container">
	<h2 class="text-center margin-top margin-bottom">Simulador de tenis - Metodología OOHDM</h2>
	<div class="row">
		<div class="col-12">
			<p>Proyecto desarrollado utilizando el método OOHDM para desarrollar aplicaciones web</p>
		</div>

		<div class="form-group col-md-6 col-12">
			<label for="">Desarrollador</label>
			<input type="text" class="form-control" value="Suazo Leonardo Ezequiel" readonly>
		</div>
		<div class="form-group col-md-6 col-12">
			<label for="">Año</label>
			<input type="text" class="form-control" value="2017" readonly>
		</div>
		<div class="form-group col-12">
			<label for="">Documento</label><br>
			<a href="<?php echo base_url('assets/pdf/integrador.pdf') ?>">
				<img style="width: 5rem" src="<?php echo base_url('assets/img/pdf.png') ?>" alt="">
			</a>
		</div>
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		$('.nav-item').find('.acercade').addClass('active');
	});
</script>
