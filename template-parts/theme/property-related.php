<?php 
	$prop_args = $args;  
?>
<div class="container">

	<div class="row">
			<div class="col-12">
				<div class="property-related gpy-1">
					<h2 class="section-title lg text-secondary"><?php _e('Similar properties','realinmobiliaria'); ?></h2>
				</div>
			</div>
		</div>

		<div class="row row-property gpb-2">	
			<?php 
 
			$Tipo_Propiedad = WPBC_get_property_tipo_propiedad($prop_args); 

			if(WPBC_is_property_venta($prop_args))$rel_operation = 'V';
			if(WPBC_is_property_alquiler($prop_args))$rel_operation = 'A';
			if(WPBC_is_property_alquiler_temporario($prop_args))$rel_operation = 'T';

			if($Tipo_Propiedad=='Casa') $rel_type = 1;
			if($Tipo_Propiedad=='Departamento') $rel_type = 2;
			if($Tipo_Propiedad=='Chacra') $rel_type = 4;
			if($Tipo_Propiedad=='Terreno') $rel_type = 6;
 			/*
			$passed_args = array(
				'show_more' => false,
				'loop_items' => 3,
				'operation' => $rel_operation,
				'type' => $rel_type
			);
			$passed_args = http_build_query($passed_args);
			echo do_shortcode('[WPBC_get_template_ajax args="'.$passed_args.'" name="theme/property-row-loop" type="inview"/]');
			*/
			WPBC_get_template_part('theme/property-row-loop', array(
				'show_more' => false,
				'loop_items' => 3,
				'operation' => $rel_operation,
				'type' => $rel_type,
				'not_Referencia' => $prop_args['Referencia'],
			));
			
			?>
		</div>

</div>