<?php

/*

	Custom Google Fonts
	
	<style> and embed automatic from params, use 'primary' => true to use for entire body{font-family:xxx}
	Classes like .font-XXXX{font-family:XXXX} will be created using "base" param for naming, ej:
	
	'base' => 'Roboto',
	'font-family' => "'Quicksand', sans-serif;",
	
	will produce:
	
	.font-Roboto{
		font-family:'Quicksand', sans-serif;
	}
	
	Take care of " and ' on notation!!

*/
  
add_filter('WPBC_enqueue_google_fonts',function($fonts){
	
	$fonts = array(
		array(
			'base' => 'PT-Serif',
			'href' => 'https://fonts.googleapis.com/css?family=PT+Serif',
			'font-family' => "'PT Serif', serif;"
		),
		array(
			'base' => 'PT-Serif-Caption',
			'href' => 'https://fonts.googleapis.com/css?family=PT+Serif+Caption', 
			'font-family' => "'PT Serif Caption', serif;"
		),
		array(
			'base' => 'Work-Sans',
			'href' => 'https://fonts.googleapis.com/css?family=Work+Sans', 
			'font-family' => "'Work Sans', sans-serif;",
			'primary' => true // will be body font
		),
	 );
	 
	 return $fonts;
});

/*
add_filter('BC_enqueue_scripts__fonts', function($fonts){

	$fonts['fontawesome-all'] = array( 
		'src'=>'css/fontawesome/all.min.css'
	);

	return $fonts;

});*/