<?php
    $locations = apply_filters('get_locations', null);
    $location = get_query_var('location', null);
    $neighborhood = get_query_var('neighborhood', null);
    $selectedLocationLabel = !is_null($location) && isset($locations[$location]) ? $locations[$location]['name'] : 'Localidad';
    $selectedNeighborhoodLabel = !is_null($neighborhood) && isset($locations[$location]['neighborhoods'][$neighborhood]) ? $locations[$location]['neighborhoods'][$neighborhood] : __('Zone/Neighborhood','realinmobiliaria');

	/*

	Args from shortcode ej: '[WPBC_get_template_theme name='part-propiedades' args='typo-0=alquiler']'

	*/
	// print_r($args['template_args']);

	$template_args = wp_parse_args(
			!empty($args['template_args']) ? $args['template_args'] : array(),
			array()
		);  

	$page_args = array( 
		'title' => get_the_title(),  
	);

	
?>

<div class="bg-shadow">

	<div class="container gpb-2 gpt-1 gpt-md-2 gpb-md-4">

		<nav aria-label="breadcrumb" class="gmb-1">
		  <ol class="breadcrumb p-0 bg-transparent">
		    <li class="breadcrumb-item"><a href="#"><?php _e('Home','realinmobiliaria');?></a></li>
		    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_args['title']; ?></li>
		  </ol>
		</nav>
				
		<form id="formSearch" class="form-buscar row row-half-gutters justify-content-start gmb-md-1 gpr-md-6"> 
 
 			<!-- operation -->
			<div class="form-group gmb-1 col-md-4"> 
				
		  	<?php
		  	$operation_value = '';
		  	$operation_label = __('Operation','realinmobiliaria'); 
		  	if( !empty($_GET['operation']) ){
		  		$template_args['operation'] = $_GET['operation'];
		  	} 
		  	if(!empty($template_args['operation'])){
		  		$operation_value = $template_args['operation'];
					if($template_args['operation'] == 'A'){ 
		  			$operation_label = __('Anual Rent','realinmobiliaria');
					}
					if($template_args['operation'] == 'V'){ 
		  			$operation_label = __('Sale','realinmobiliaria');
					}
					if($template_args['operation'] == 'T'){ 
		  			$operation_label = __('Rent','realinmobiliaria');
					}
				} 
		  	?>
		  	<input type="hidden" id="operation" name="operation" value="<?php echo $operation_value; ?>">
				<div class="dropdown dropdown-select" data-input-target="#operation">
				  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_operation" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="dropdown-select-value" data-value="<?php echo $operation_value; ?>"><?php echo $operation_label; ?></span> <i class="caret pngicon-arrow-down-alt"></i>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdown_operation">
				  	<a class="dropdown-item" href="#" data-value=""><?php _e('All','realinmobiliaria');?></a>
				  	<a class="dropdown-item" href="#" data-value="T"><?php _e('Rent','realinmobiliaria'); ?></a>
				    <a class="dropdown-item" href="#" data-value="A"><?php _e('Anual Rent','realinmobiliaria');?></a>
				    <a class="dropdown-item" href="#" data-value="V"><?php _e('Sale','realinmobiliaria');?></a>
				  </div>
				</div>
			</div>
			<!-- operation END -->

			<!-- type -->
			<div class="form-group gmb-1 col-md-4">
				<?php
		  	$type_value = '';
		  	$type_label = __('Property type','realinmobiliaria'); 
		  	if( !empty($_GET['type']) ){
		  		$type = $_GET['type'];
		  		$type_value = $type;
		  		if($type == 1){ 
		  			$type_label = __('Houses','realinmobiliaria'); 
		  		}
		  		if($type == 2){ 
		  			$type_label = __('Apartments','realinmobiliaria'); 
		  		}
		  		if($type == 4){ 
		  			$type_label = __('Chacras & Fields','realinmobiliaria'); 
		  		}
		  		if($type == 6){ 
		  			$type_label = __('Land','realinmobiliaria'); 
		  		} 
		  	}   
		  	?>
				<input type="hidden" id="type" name="type" value="<?php echo $type_value; ?>">
				<div class="dropdown dropdown-select" data-input-target="#type">
				  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="dropdown-select-value" data-value="<?php echo $type_value; ?>"><?php echo $type_label; ?></span> <i class="caret pngicon-arrow-down-alt"></i>
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
			<!-- type END -->

			<!-- location -->
			<div class="form-group gmb-1 col-md-4"> 
				<?php
		  	$location_value = '';
		  	$location_label = __('Location','realinmobiliaria'); 
		  	if( !empty($_GET['location']) ){
		  		$location = $_GET['location'];
		  		$location_value = $location;
		  		switch ($location) {
		  			case 1:
		  				$location_label = __('Punta Ballena','realinmobiliaria'); 
		  				break;
		  			case 2:
		  				$location_label = __('Punta del Este','realinmobiliaria'); 
		  				break; 
		  			case 3:
		  				$location_label = __('La Barra','realinmobiliaria'); 
		  				break; 
		  			case 4:
		  				$location_label = __('Balneario Bs.As.','realinmobiliaria'); 
		  				break; 
		  			case 5:
		  				$location_label = __('José Ignacio','realinmobiliaria'); 
		  				break; 
		  			case 11:
		  				$location_label = __('Rural','realinmobiliaria'); 
		  				break; 
		  			case 12:
		  				$location_label = __('Maldonado','realinmobiliaria'); 
		  				break; 
		  		} 
		  	}  
		  	?>
		  	<input type="hidden" id="location" name="location" value="<?php echo $location_value; ?>">
				<div class="dropdown dropdown-select" data-input-target="#location">
				  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_location" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="dropdown-select-value" data-value="<?php echo $location_value; ?>"><?php echo $location_label; ?></span> <i class="caret pngicon-arrow-down-alt"></i>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdown_location">
				  	<a class="dropdown-item" href="#" data-reload-select="#select-neighborhood" data-value=""><?php _e('All','realinmobiliaria');?></a>
					<?php foreach ($locations as $location_id => $location): ?>
				    <a class="dropdown-item" href="#" data-reload-select="#select-neighborhood" data-reload-select-group="location_<?php echo $location_id; ?>" data-value="<?php echo $location_id; ?>" data-value="<?php echo $location_id; ?>"><?php echo  $location['name']; ?></a> 
					<?php endforeach; ?>
				  </div>
				</div>
			</div>
			<!-- location END -->

            <?php if (1==0): ?> <!-- ocultamos-->
			<div class="form-group gmb-1 col-md-3" id="select-neighborhood"> 
                <input type="hidden" id="neighborhood" name="neighborhood" value="<?php echo $neighborhood_value; ?>">
				<div class="dropdown dropdown-select" data-input-target="#neighborhood">
				  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_location" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="dropdown-select-value" data-value=""><?php echo $selectedNeighborhoodLabel; ?></span> <i class="caret pngicon-arrow-down-alt"></i>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdown_neighborhood">
				  	<a class="dropdown-item" href="#" data-value=""><?php _e('All','realinmobiliaria');?></a>
					  <?php foreach ($locations as $location_id => $location_name): ?>
					  <div class="subgroup" id="location_<?php echo $location_id; ?>" <?php if ($location_id != $location):?>style="display: none;"<?php endif;?>>
						  <?php foreach ($location_name['neighborhoods'] as $neighborhood_id => $neighborhood): ?>
						  <a class="dropdown-item" data-alt-input-target="#location" data-alt-input-target-value="<?php echo $location_id; ?>" data-input-target="#neighborhood" href="#" data-value="<?php echo $neighborhood_id; ?>"><?php echo $neighborhood; ?></a>
						  <?php endforeach; ?>
					  </div>
					  <?php endforeach; ?>
				  </div>
				</div>
            </div>
            <?php endif; ?>
			<!-- location END -->
			<!-- rooms -->
			<div class="form-group gmb-1 col-md-4">
				<?php
		  	$rooms_value = '';
		  	$rooms_label = __('Rooms','realinmobiliaria'); 
		  	if( !empty($_GET['rooms']) ){
		  		$rooms = $_GET['rooms'];
		  		$rooms_value = $rooms;
		  		switch ($rooms) {
		  			case 1:
		  				$rooms_label = __('1 Room','realinmobiliaria'); 
		  				break;
		  			case 2:
		  				$rooms_label = __('2 Rooms','realinmobiliaria'); 
		  				break; 
		  			case 3:
		  				$rooms_label = __('3 Rooms','realinmobiliaria'); 
		  				break; 
		  			case 4:
		  				$rooms_label = __('More than 3','realinmobiliaria'); 
		  				break; 
		  			} 
		  	}  
		  	?>
				<input type="hidden" id="rooms" name="rooms" value="<?php echo $rooms_value; ?>">
				<div class="dropdown dropdown-select" data-input-target="#rooms">
				  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_rooms" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="dropdown-select-value" data-value="<?php echo $rooms_value; ?>"><?php echo $rooms_label; ?></span> <i class="caret pngicon-arrow-down-alt"></i>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdown_rooms">
				  	<a class="dropdown-item" href="#" data-value=""><?php _e('Indistinct','realinmobiliaria');?></a>
				    <a class="dropdown-item" href="#" data-value="1"><?php _e('1 Room','realinmobiliaria');?></a> 
				    <a class="dropdown-item" href="#" data-value="2"><?php _e('2 Rooms','realinmobiliaria');?></a> 
				    <a class="dropdown-item" href="#" data-value="3"><?php _e('3 Rooms','realinmobiliaria');?></a> 
				    <a class="dropdown-item" href="#" data-value="4"><?php _e('More than 3','realinmobiliaria');?></a> 
				  </div>
				</div>
			</div>
			<!-- rooms END -->

			<!-- priceRange -->
			<div class="form-group gmb-1 col-md-3">
				<?php
				/*
					"10000|50000" => "De US$ 10.000 a US$ 50.000",
					"50000|100000" => "De US$ 50.000 a US$ 100.000",
					"100000|300000" => "De US$ 100.000 a US$ 300.000",
					"300000|500000" => "De US$ 300.000 a US$ 500.000",
					"500000|1000000000000" => "Mayor a US$ 500.000",
				*/
				$priceRange_value = '';
				$priceRange_label = __('Price range','realinmobiliaria'); 

				$from = __('From','realinmobiliaria'); 
				$to = __('to','realinmobiliaria'); 
				$higher_than = __('Greater than','realinmobiliaria'); 

				if( !empty($_GET['priceRange']) ){
					$priceRange = $_GET['priceRange'];
					$priceRange_value = $priceRange;
					switch ($priceRange) {
						case '10000|50000':
							$priceRange_label = $from.' U$D 10.000 '.$to.' 50.000'; 
							break;
						case '50000|100000':
							$priceRange_label = $from.' U$D 50.000 '.$to.' 100.000'; 
							break; 
						case '100000|300000':
							$priceRange_label = $from.' U$D 100.000 '.$to.' 300.000'; 
							break; 
						case '300000|500000':
							$priceRange_label = $from.' U$D 300.000 '.$to.' 500.000'; 
							break; 
						case '500000|1000000000000':
							$priceRange_label =  $higher_than.' U$D 500.000'; 
							break; 
						} 
				}  
				?>
				<input type="hidden" id="priceRange" name="priceRange" value="<?php echo $priceRange_value; ?>">
				<div class="dropdown dropdown-select gmr-md-n-3" data-input-target="#priceRange">
				  <button class="btn btn-block btn-light dropdown-toggle" type="button" id="dropdown_priceRange" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    <span class="dropdown-select-value" data-value="<?php echo $priceRange_value; ?>"><?php echo $priceRange_label; ?></span> <i class="caret pngicon-arrow-down-alt"></i>
				  </button>
				  <div class="dropdown-menu" aria-labelledby="dropdown_priceRange">
				  	<a class="dropdown-item" href="#" data-value=""><?php _e('All','realinmobiliaria');?></a>
				    <a class="dropdown-item" href="#" data-value="10000|50000"><?php echo $from; ?> U$D 10.000 <?php echo $to; ?> 50.000</a>
				    <a class="dropdown-item" href="#" data-value="50000|100000"><?php echo $from; ?> U$D 50.000 <?php echo $to; ?> 100.000</a>
				    <a class="dropdown-item" href="#" data-value="100000|300000"><?php echo $from; ?> U$D 100.000 <?php echo $to; ?> 300.000</a>
				    <a class="dropdown-item" href="#" data-value="300000|500000"><?php echo $from; ?> U$D 300.000 <?php echo $to; ?> 500.000</a>
				    <a class="dropdown-item" href="#" data-value="500000|1000000000000"><?php echo $higher_than; ?> US$ 500.000</a> 
				  </div>
				</div>
			</div>
			<!-- priceRange END -->

			<div class="form-group gmb-1 col-md-3 text-left"> 
				<button type="submit" class="btn btn-submit btn-primary gml-md-3"><?php _e('SEARCH','realinmobiliaria');?></button>
			</div>

			<input type="hidden" id="sort" name="sort" value="<?php echo $_GET['sort']; ?>">
		</form>

		<div class="d-sm-flex gmt-2 pb-1">
			<h2 class="section-title xl text-secondary"><?php _e('Search results','realinmobiliaria');?></h2>
			<div class="dropdown dropdown-select dropdown-orderby ml-auto gmt-1" data-input-target="#price">
				<?php
				$sort_value = '';
				$sort_label = __('Sort by','realinmobiliaria'); 
				if( !empty($_GET['sort']) ){
					$sort = $_GET['sort'];
					$sort_value = $sort;
					switch ($sort) {
						case 'en1_asc':
						case 'ven_asc':
							$sort_label = __('Lower price','realinmobiliaria'); 
							break;
						case 'en1_desc':
						case 'ven_desc':
							$sort_label = __('Higher price','realinmobiliaria'); 
							break; 
					} 
				}
				?>
				<button class="btn btn-block btn-link dropdown-toggle " type="button" id="dropdownorder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<span class="dropdown-select-value" data-value="<?php echo $sort_value; ?>"><?php echo $sort_label; ?></span> <i class="caret pngicon-arrow-down-secondary"></i>
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownorder">
					<a onclick="$('#sort').val('<?php echo ($template_args['operation'] == 'V' ? 'ven_asc' : 'en1_asc'); ?>'); $('#formSearch').submit();" class="dropdown-item" href="#" data-value="<?php echo ($template_args['operation'] == 'V' ? 'ven_asc' : 'en1_asc'); ?>"><?php  _e('Lower price','realinmobiliaria'); ?></a>
					<a onclick="$('#sort').val('<?php echo ($template_args['operation'] == 'V' ? 'ven_desc' : 'en1_desc'); ?>'); $('#formSearch').submit();" class="dropdown-item" href="#" data-value="<?php echo ($template_args['operation'] == 'V' ? 'ven_desc' : 'en1_desc'); ?>"><?php  _e('Higher price','realinmobiliaria'); ?></a>
				</div>
			</div>
		</div>

		<div id="propiedades" class="row row-property">
			<?php

			WPBC_get_template_part('theme/property-row-loop', array(
				'show_more' => true,
				'loop_items' => 9,
				//'operation' => $operation,
			));?>
		</div>

	</div>
</div>
