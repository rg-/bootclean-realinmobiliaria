<?php

$prop_args = $args; 

$property_images = $prop_args['Fotos'];

$property_images = array_filter(
  $prop_args,
  function ($val, $key) {
      return stripos($key, 'Foto') !== false && is_string($val);
  },
  ARRAY_FILTER_USE_BOTH
);

$slider_args['slides'] = array();
if(!empty($property_images)){
	
	foreach($property_images as $img){
		$slider_args['slides'][] = array(
			'hi' => $img,
			'low' => $img
		);;
	} 


	$slider_breakpoint = '{
		"xs":{"default":"320px","min":"320px","max":"320px"},
		"sm":{"default":"375px","min":"375px","max":"640px"},
		"md":{"default":"550px","min":"550px","max":"720px"}
	}';

?>

<div id="slider-property-single" class="theme-slick-slider" data-slick='{ "dots":false, "arrows":false, "infinite":true }' data-breakpoint-height='<?php echo $slider_breakpoint; ?>' >

	<?php

	foreach ($slider_args['slides'] as $slide) {
		$hi = $slide['hi'];
		$low = isset($slide['low']) ? $slide['low'] : $hi;
		?>
<div class="item loading">
	<span class="lazyload-loading"></span>
	<div data-lazyload-src="<?php echo $hi; ?>" class="item-container image-cover" style="background-image:url('<?php echo $low; ?>');" ></div>					
</div>
		<?php
	}

	?>

</div><!-- theme-slick-slider END -->

<div class="slick-nav">
	<nav class="d-flex"><a href="#slider-property-single" data-toggle="slick-prev"><i class="pngicon-arrow-left-secondary"></i></a><a href="#slider-property-single" data-toggle="slick-next"><i class="pngicon-arrow-right-secondary"></i></a></nav>
</div>

<?php } ?>