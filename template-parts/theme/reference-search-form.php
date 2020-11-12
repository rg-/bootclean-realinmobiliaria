<?php
	$property_single_id = get_theme_option('real_property_single_id');
	$property_single = get_permalink($property_single_id);
 ?>
<div class="search-reference form-controls-transparent">
	<form action="<?php echo $property_single; ?>">
		<div class="form-group m-lg-0">
			<i class="form-control-icon pngicon-search gmr-1"></i>
			<input class="form-control" type="text" name="ref" id="ref" value="" placeholder="<?php _e('CODE','realinmobiliaria'); ?>" />
		</div>
	</form>
</div>