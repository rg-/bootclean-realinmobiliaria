<?php

/*

	@bootclean components slick slider

	Customize content_slide html output

*/

add_filter('wpbc/slick/content_slide', function($content_slide){

	if(!empty($content_slide)){
		$tag = 'co';
		if(is_front_page()){
			$tag = 'propiedades';
		}
		$content_slide = '<div class="container d-none d-md-block"><div class="row"><div class="col-md-6 ml-auto mt-auto "><a href="#'.$tag.'" class="scroll-to btn-slider gpx-4 gpy-2 bg-primary text-white"><h2 class="section-title">'.$content_slide.'</h2><i class="pngicon-arrow-down icon"></i></a></div></div></div>';
	}
	
	return $content_slide; 

}, 10, 1);