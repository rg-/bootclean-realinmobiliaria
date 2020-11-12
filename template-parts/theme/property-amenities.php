<?php
	
	$prop_args = $args;  

	$amenities_list = apply_filters('wpbc/custom-filter/amenities_list', array(), $prop_args); 
	$amenities_show_value = [
		'Camas',
		'Camas_dobles', 
		'Camas_simples',
		'Capacidad',
	  ];

	$amenities_html = '';

	foreach ($amenities_list as $k=>$v) {
		if( (!empty($v) && !is_array($v) ) && ($v!='N' || $v!=0) ){ 	
			$iconized_tag = '<i class="am-icon text-primary md bcicon-'.$k.'"></i>';
			
			$title = apply_filters('wpbc/custom-filter/amenities_title', $k, $prop_args); 
 
			$amenities_html.='<li class="col-md-4">' .$iconized_tag. ((in_array($k, $amenities_show_value) ? $v . ' ' : '') . $title) . '</li>';
		}
	}
	if(strlen($amenities_html) > 0){
	?>
	<h4 class="property-subtitle gmb-1 text-secondary"><?php _e('AMENITIES','realinmobiliaria'); ?></h4>
	<ul class="row no-gutters property-list gmb-1">
		<?php echo $amenities_html; ?>
	</ul>
	<?php } ?>