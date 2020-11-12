<?php
	
	$prop_args = $args;  

	$google_map_API_KEY = get_theme_option('google_map_API_KEY');

	//$ajax_map_button_img = '<img src="'.get_stylesheet_directory_uri().'/images/theme/pin.png" width="78"/>';
	$ajax_map_button_img = '<i class="bcicon-location xl"></i>';
	$ajax_map_button = '<a href="[data-ajax-target]" data-toggle="ajax-load" class="btn btn-transparent p-0">'.$ajax_map_button_img.'</a>';


	$Latitud = $prop_args['Latitud'];
	$Longitud = $prop_args['Longitud'];
	
	if(!empty($Latitud) && !empty($Longitud)){ 

		?>

		<h4 class="property-subtitle mb-2 text-secondary"><?php _e('LOCATION','realinmobiliaria'); ?></h4>

		<?php  
		if(!empty($google_map_API_KEY)){
			$google_map_url = urlencode('https://www.google.com/maps/embed/v1/place?key='.$google_map_API_KEY.'&center=' . $prop_args['Latitud'] . ',' . $prop_args['Longitud'] . '&q=' . $prop_args['Latitud'] . ',' . $prop_args['Longitud']);
			$mapStaticUrl = 'https://maps.google.com/maps/api/staticmap?center=' . $prop_args['Latitud'] . ',' . $prop_args['Longitud'] . '&zoom=13&channel=ZP&size=780x456&sensor=true&scale=2&key=AIzaSyBwV8rJWuENsHIW8JkwRnhZsqsfnqeV2xQ';
		}else{
			$google_map_url = 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6541.799954987025!2d'.$Longitud.'!3d'.$Latitud.'!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2suy!4v1567185339130!5m2!1ses!2suy';
			$mapStaticUrl = get_stylesheet_directory_uri().'/images/theme/mapa-ejemplo.jpg';
		}
		
		echo do_shortcode('[WPBC_get_template_ajax args="'.$google_map_url.'" name="theme/google-map" type="toggle" target_content="#map" label="" ]'.$ajax_map_button.'[/WPBC_get_template_ajax]');

		?>

		<div id="map">
			<div class="embed-responsive bg-100 embed-responsive-16by9">
				<div class="embed-responsive-item image-cover" style="background-image:url(<?php echo $mapStaticUrl;?>);"></div>
			</div>
		</div>

		<?php

	}
?>