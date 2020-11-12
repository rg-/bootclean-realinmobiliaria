<?php
 	
	$prop_args = $args;
	/*

	@passed $prop_args as $args from template

	@ Template hijo de 'theme/property-row-loop'

	Los $args son los que se pasan via WPBC_get_template_part($part, $args)
	En este caso corresponden a los de "property" $prop_args

	*/ 

	$is_destacado = WPBC_is_property_destacado($prop_args);   
	$property_class = ($is_destacado) ? 'is-featured' : 'is-default';
 	global $global_back_url; 
?>
<a href="<?php echo WPBC_get_property_url($prop_args); ?>" class="<?php echo $property_class; ?> post-property entry hover-anim">

	<div class="post-image">
		<span class="post-meta-ref">Ref. <?php echo $prop_args['Referencia']; ?></span>
		<div class="embed-responsive embed-responsive-4by3">
			
			<img data-inview="lazyload" data-inview-breakpoint="1" data-inview-src="<?php echo $prop_args['thumb']; ?>" class="embed-responsive-item" src="<?php echo $prop_args['thumb']; ?>" alt=" " />

		</div>
		<span class="hover-anim-show-btn btn btn-white text-primary"><?php _e('see more','realinmobiliaria'); ?></span>
	</div>

	<div class="post-content">

		<div class="post-meta mb-3">

			<div class="post-meta-cat font-Work-Sans">
				<span><?php echo WPBC_get_property_meta_cats($prop_args, true); ?></span>
		 	</div> 

		 	<div class="property-price font-PT-Serif">
		 		<?php echo WPBC_get_property_price($prop_args, true); ?>
		 	</div>

		</div>

		<h3 class="property-title mt-2 font-PT-Serif"><?php /* 2020 */ WPBC_get_languages($prop_args['Título']); ?></h3>
		<div class="property-meta-features">
			<?php echo WPBC_get_property_features($prop_args, array(
				'use_only' => array(
					'Mts_Edificado_Totales', 'Dormitorios', 'Banos', 'Cochera'
				)
			)); ?>
		</div>
	</div>
	<div class="hover-anim-show"></div>
</a>