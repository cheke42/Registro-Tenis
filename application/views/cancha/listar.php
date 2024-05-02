<div class="container">
	<h2 class="text-center margin-bottom margin-top">Canchas del torneo</h2>
	<div class="row">
		<div class="col"></div>
		<div class="col-md-10">
			<div class="container">
				<div class="row margin-top">
					<?php foreach ($canchas as $cancha): ?>
						<div class="col-lg-4 col-sm-12 cancha-container">
							<a href="<?php echo base_url('cancha/detalle/?id=') . $cancha->id; ?>">
								<h5 class="text-center"><?php echo $cancha->nombre ?></h5>
								<div class="img-container">
									<img style="width: 100%" src="<?php echo base_url('res/img/cancha/') . $cancha->id . '.jpg' ?>" alt="">
								</div>
							</a>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>

</div>

<script>
	jQuery(document).ready(function($) {
		$('.nav-item').find('.canchas').addClass('active');
	});
</script>