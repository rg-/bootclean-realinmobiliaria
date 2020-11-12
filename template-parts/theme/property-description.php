<?php
	
	$prop_args = $args;

	if(!empty($prop_args['Descripcion'])){
?>
<h4 class="property-subtitle text-secondary"><?php _e('DESCRIPTION','realinmobiliaria'); ?></h4>

<div class="property-content gmb-2">
	
	<p><?php /* 2020 */ WPBC_get_languages($prop_args['Descripcion']); ?></p>

</div>

<?php } ?>