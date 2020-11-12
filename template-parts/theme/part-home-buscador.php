<div class="home-buscador container">

	<div class="form-header-col ">
		<?php 
		$real_property_page_id = get_theme_option('real_property_page_id'); 
		$slug = get_post_field( 'post_name', $real_property_page_id );
		$permalink = get_permalink($real_property_page_id);   
		?>
		<form action="<?php echo $permalink; ?>" class="form-buscar col-md-4 gmb-1 gmb-lg-5 gp-2 gp-lg-4 bg-white">

				<input type="hidden" id="operation" name="operation" value="A">
				<input type="hidden" id="type" name="type" value="1">

				<div class="form-group gmb-1"> 
					<div class="dropdown dropdown-select" data-input-target="#operation">
					  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_operation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="dropdown-select-value" data-value="A"><?php _e('Rent','realinmobiliaria');?></span> <i class="caret pngicon-arrow-down-alt"></i>
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdown_operation">
					  	<a class="dropdown-item" href="#" data-value=""><?php _e('All','realinmobiliaria');?></a>
					  	
					    <a class="dropdown-item" href="#" data-value="A"><?php _e('Anual Rent','realinmobiliaria');?></a>
					    <a class="dropdown-item" href="#" data-value="V"><?php _e('Sale','realinmobiliaria');?></a>
					    <a class="dropdown-item" href="#" data-value="T"><?php _e('Rent','realinmobiliaria');?></a>
					  </div>
					</div>
				</div>

				<div class="form-group gmb-1"> 
					<div class="dropdown dropdown-select" data-input-target="#type">
					  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					    <span class="dropdown-select-value" data-value="1"><?php _e('Houses','realinmobiliaria');?></span> <i class="caret pngicon-arrow-down-alt"></i>
					  </button>
					  <div class="dropdown-menu" aria-labelledby="dropdown_type">
					  	<a class="dropdown-item" href="#" data-value=""><?php _e('All','realinmobiliaria');?></a>
					    <a class="dropdown-item" href="#" data-value="1"><?php _e('Houses','realinmobiliaria');?></a>
					    <a class="dropdown-item" href="#" data-value="2"><?php _e('Apartments','realinmobiliaria');?></a>
					    <a class="dropdown-item" href="#" data-value="4"><?php _e('Chacras & Fields','realinmobiliaria');?></a>
					    <a class="dropdown-item" href="#" data-value="6"><?php _e('Land','realinmobiliaria');?></a>
					  </div>
					</div>
				</div>

				<div class="form-group gmb-0 text-left"> 
					<button type="submit" class="btn btn-submit btn-primary btn-block"><?php _e('SEARCH','realinmobiliaria');?></button>
				</div>

			</form>
	</div>

</div>