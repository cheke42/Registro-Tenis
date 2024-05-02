<div class="container">
	<div class="row">
		<form>
			<fieldset>
			<legend><?php echo isset($legend_value) ? $legend_value : '' ?></legend>
			<?php 
				foreach ($components as $component_value){?>
					<?php if (get_class($component_value) != 'Checkbox'): ?>
						<div class="form-group col-md-12">
						  <label for="<?php echo $component_value->label_attr->for; ?>"><?php echo $component_value->label_attr->html; ?></label>
						<?php 
							switch (get_class($component_value)) {
								// COMPONENT: INPUT
								case 'Input': ?>
									<input 
										<?php	
											foreach ($component_value->attr_input as $attr_key => $attr_value) {
												echo $this->util->generate_attr($attr_key,$attr_value);	
											} 
										?>
									>
									<?php if (isset($component_value->label_attr->message)): ?>
										<small id="anotation-<?php echo $component_value->label_attr->for;  ?>" class="form-text text-muted"><?php echo $component_value->label_attr->message; ?></small>
									<?php endif ?>
								<?php break;
								// COMPONENT: SELECT
								case 'Select': ?>
									<select
										<?php 
											foreach ($component_value->attr_select as $select_key => $select_value){ 
												if ($select_key != 'options'){ 
													echo $this->util->generate_attr($select_key,$select_value);
												} 
										 	} 
										 ?>
									>
									<?php foreach ($component_value->attr_select->options as $option_key => $option_value){ 
											echo $this->util->generate_option($option_key,$option_value);
										} ?>	
									</select>
									<?php if (isset($component_value->label_attr->message)): ?>
										<small id="anotation-<?php echo $component_value->label_attr->for;  ?>" class="form-text text-muted"><?php echo $component_value->label_attr->message; ?></small>
									<?php endif ?>
								<?php break;
							// COMPONENT: TEXTAREA
								case 'Textarea':?>
										<textarea
											<?php foreach ($component_value->attr_textarea as $key_textarea => $value_textarea){ 
												if($key_textarea != 'html'){
													echo $this->util->generate_attr($key_textarea,$value_textarea);
												}
											} ?> >
											<?php echo $component_value->attr_textarea->html; ?>
										</textarea>
									<?php break;
							// COMPONENT: DATEPICKER
								case 'Datepicker': ?>
									<input 
										<?php	
											foreach ($component_value->attr_input as $attr_key => $attr_value) {
												echo $this->util->generate_attr($attr_key,$attr_value);	
											} 
										?>
									>
									<?php if (isset($component_value->label_attr->message)): ?>
										<small id="anotation-<?php echo $component_value->label_attr->for;  ?>" class="form-text text-muted"><?php echo $component_value->label_attr->message; ?></small>
									<?php endif ?>
								<?php break;
							// COMPONENT: DATEPICKER
								case 'Datetimepicker':?>
									<input 
										<?php	
											foreach ($component_value->attr_input as $attr_key => $attr_value) {
												echo $this->util->generate_attr($attr_key,$attr_value);	
											} 
										?>
									>
									<?php if (isset($component_value->label_attr->message)): ?>
										<small id="anotation-<?php echo $component_value->label_attr->for;  ?>" class="form-text text-muted"><?php echo $component_value->label_attr->message; ?></small>
									<?php endif ?>
								<?php break;
							} ?>
						</div>
					<?php else: ?>
						<?php //COMPONENT: CHECKBOX ?>
						<div class="form-check">
							<label class="form-check-label">
							<input  
							<?php 
								foreach ($component_value->attr_checkbox as $key_attr => $attr) {
									if($key_attr != 'html'){
										echo $this->util->generate_attr($key_attr,$attr);
										}
									} ?>
							>
							<?php echo $component_value->attr_checkbox->html; ?>
							</label>
						</div>
					<?php endif ?>
					
					<?php } ?>
				
			</fieldset>
		</form>



	</div>
</div>