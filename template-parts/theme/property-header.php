<?php
	
	$prop_args = $args;   
?>
<span class="post-meta-ref property-referencia">Ref. <?php echo $prop_args['Referencia']; ?></span>

<h3 class="property-title font-PT-Serif">
	<?php /* 2020 */ WPBC_get_languages($prop_args['Título']); ?>
</h3>
<div class="property-location property-locationlocalidad"><?php echo $prop_args['Localidad']; ?></div>
<div class="property-location property-operation">
	<small class="text-primary"><?php echo WPBC_get_property_meta_cats($prop_args); ?></small>
</div>